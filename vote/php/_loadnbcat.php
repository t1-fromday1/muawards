<?php

    include "./_config.php";

    $category_id = mysqli_real_escape_string($conn, $_POST['category_id']);

    // get nominees by category
    $getnominees = mysqli_query($conn, "SELECT nominees.user_id, nominees.f_name, nominees.l_name, nominees.category, nominees.pic, categories.category FROM nominees INNER JOIN categories ON (nominees.category = categories.id) WHERE nominees.category = '$category_id' ") or die(mysqli_error($conn));
    $nominees = mysqli_fetch_all($getnominees, MYSQLI_ASSOC);
    $nomineesCount = mysqli_num_rows($getnominees);

    if($nomineesCount > 0){

        $category = $nominees[0]['category'];
        $response = array();

        $output = '';

        if($category_id < 126){
            $nextcat = $category_id + 1;
            //check if empty or not
            $checkCategory = mysqli_query($conn, "SELECT * FROM nominees WHERE category = '$nextcat'") or die(mysqli_error($conn));
            $res = mysqli_num_rows($checkCategory);
            if($res > 0){
                $nextcat = $nextcat;
            }else{
                $nextcat+=1;
            }
        }else{
            $nextcat = "Done";
        }
        
        $output .= '
            <div class="row" style="padding: 0 10px">
                <div class="col-md-5">
                    <div id="">
                        <div id="logo-div" class="text-center text-light">
                            <div id="logo-image-div" class="mb-2">
                                <img src="./images/logo.png" class="muawards-logo" alt="">
                            </div>
                            <h5>'.date("Y").' MASENO UNIVERSITY AWARDS.</h5>
                        </div>
                        <div class="banner-text text-light text-center mt-4">
                            <h6 style="font-size: 16px; text-transform: uppercase">'.$category.'? <button class="btn btn-sm text-light btn-vote">VOTE NOW!</button></h6>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                ';
                foreach ($nominees as $nominee) {
                    $name = $nominee['f_name']." ".$nominee['l_name'];
                    $output .= '
                        <div class="nominee-card mb-2">
                            <div class="inline" id="nomineeName">
                                '.$name.'
                            </div>

                            <div class="inline image">
                                <img src="./images/'.$nominee['pic'].'" id="nominee-img" alt="'.$name.'">
                            </div>
                            
                            <div class="inline vote" id="'.$nominee['user_id'].'">
                                VOTE
                            </div>
                        </div>
                    ';
                }
        $output .= '
                    <a href="" data-dismiss="modal" class="btn btn-sm btn-primary text-light">CLOSE <i class="fa fa-times"></i> </a>
                    <a href="" id="'.$nextcat.'" class="btn btn-sm btn-warning text-light next">NEXT <i class="fa fa-arrow-right"></i> </a>
                </div>
            </div>
        ';
        
        $response['body'] = $output;
        $response['category'] = $category;

        echo json_encode($response); die;
    }


?>