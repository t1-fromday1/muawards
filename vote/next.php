<?php 
    include "./php/_config.php";
    // get voting categories
    $getcategories = mysqli_query($conn, "SELECT * FROM categories") or die(mysqli_error($conn));
    $categories = mysqli_fetch_all($getcategories, MYSQLI_ASSOC);

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $voter = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $voter = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $voter = $_SERVER['REMOTE_ADDR'];
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MUAWARDS | VOTING</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">    
    <link rel="stylesheet" href="./css/all.min.css">
    <style>
        .category{
            height: 60px; width: 100%;
            background: #dc9b23;
            -webkit-transition: background-color 2s ease-out;
            -moz-transition: background-color 2s ease-out;
            -o-transition: background-color 2s ease-out;
            transition: background-color 2s ease-out;
        }
        .category p{
            line-height: 60px;
            color: #fff;
            font-weight: 700;
            cursor: pointer;
            text-transform: uppercase;
        }
        .category:hover{
            background: linear-gradient( 0deg, rgba(255, 215, 0, 1) 0%, rgba(128, 0, 128, 1) 100%);
        }

        #banner{
            position: relative;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            /* padding: 10px; */
        }

        #logo-div{
            height: 220px;
            width: 100%;
            background: #008bc2;
            overflow: hidden;
            border-radius: 5px;
        }
        #logo-image-div{
            height: 100px;
            width: 80%;
            margin: 0 auto;
            margin-top: 50px;
            background: #84077b;
            padding:10px;
            border-radius: 5px;
        }
        .muawards-logo{
            height: 100%;
            width: 100%;
        }
        .banner-text h4{
            font-weight: 700;
        }
        .btn-vote{
            background-color: #008bc2;
            font-weight: 800
        }
        .nominee-card{
            background-color: #008bc2;
            height: 60px;
            border-radius: 5px;
            display: flex;
            overflow: hidden
        }
        .image{
            width: 35%;
            height: 100%;
            display:flex;
            justify-content:center;
            align-items:center;
            overflow:hidden
        }
        .image #nominee-img{
            flex-shrink:0;
            -webkit-flex-shrink: 0;
            height: 100%; width: 100%;
        }
        .vote{
            width: 35%;
            cursor: pointer;
            line-height: 60px;
            color: #fff;
            font-weight: 1000;
            text-align: center;
        }
        .vote:hover{
            background-color: #dc9b23
        }
        #banner{
            width: 100%;
        }
        #nomineeName{
            width: 30%;
            color: #fff;
            line-height: 60px;
            font-size: 16px;
            padding: 0 10px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <div class="row mt-3">
            <div class="col-md-4 mx-auto" style="display:flex">
                <div style="padding: 10px; border-right: 4px solid #dfa53a">
                    <h5>MASENO <br> UNIVERSTITY <br> AWARDS</h5>
                </div>
                <div style="padding: 10px">
                    <h5>FAN <br> VOTE <br> NOW!</h5>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 mx-auto">
                <p>Pick your favourite artist to vote for now and follow the elections stories to see who WINS!</p>
                <h5>SELECT A CATEGORY</h5>
                <div hidden id="loader_image" >
                <img src="../images/jeremiah.jpg" alt="Loader_img" width="300px"></div>
                <div class="row">
                    <?php
                        foreach ($categories as $category) {
                            echo '
                                <div class="col-md-6 mb-3">
                                    <div class="col-md-12 text-center category" id="'.$category['id'].'">
                                        <p>'.$category['category'].'</p>
                                    </div>
                                </div>
                            ';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php include "./includes/modals.php"; ?>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="./js/all.min.js"></script>
    <script src="./js/sweetalert.min.js"></script>
    
    <script>
        $(document).on('click', '.category', function(e){
            e.preventDefault();
            var category_id = e.currentTarget.id;
            nominees(category_id);
        })

        $(document).on('click', '.next', function(e){
            e.preventDefault();
            var category_id = e.target.id;
            nominees(category_id);
        })

        $(document).on('click', '.vote', function(e){
            e.preventDefault();
            var nominee_id = e.currentTarget.id;
            let selected_div = $(this);
            
            $(selected_div).css('background', '#dc9b23');
            $(selected_div).css('pointer-events', 'none');
            $('.vote').not(selected_div).css('background', '#008bc2');
            $('.vote').not(selected_div).css('pointer-events', 'none');
        
            $.ajax({
                url: "./php/_vote.php",
                type: "POST",
                data: {nominee_id:nominee_id, voter : '<?php echo $voter ?>' },
                success: (response) => {
                    if(response == 'voted'){

                        swal("Congratulations!", "Vote casted!", "success");

                    }else if(response == 'charge_voter'){

                        swal("Enter M-Pesa payment code e.g. PJN7N9BARR:", {
                            content: "input",
                        }).then((value) => {
                            $.ajax({
                                url: './php/_confirm-charge.php',
                                type: 'POST',
                                data: {mpesaCode:value, voter: '<?php echo $voter ?>'},
                                success: (data)=>{

                                },
                                error: ()=>{

                                }
                            })
                        });

                    }
                },
                error: ()=>{
                    swal("Error!", "An error occured while voting. Please try again.", "error");
                }
            })
        })


        function nominees(category_id){
            $.ajax({
                url: "./php/_loadnbcat.php",
                type: "POST",
                data: {category_id:category_id},
                success: (response) => {
                    var response = JSON.parse(response);
                    var body = response['body'];
                    var category = response['category'];
                    var message = response['message'];

                    $('#category-name').text(category);
                    $('#content').html(body);

                    $('#vote-category-modal').modal({
                        show: true,
                        backdrop: 'static',
                        keyboard: false
                    })

                },
                error: ()=>{
                    swal("Error!", "An error occured while voting. Please try again.", "error");
                }
            })
        }

    </script>

</body>
</html>