<?php
    session_start(); 
    if(isset($_SESSION['user'])){
        $nominee_id = $_SESSION['user'];
    }else{
        header("location: ./register.php"); die;
    }
    include 'header.php'; 
?>

<section class="py-5" style="background: linear-gradient(#fcd202, #84077b); overflow: hidden; height: 100vh;">
    <div class="container px-5 my-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-5 mb-3"
                style="padding: 20px 30px; border-radius: 5px; color: rgba(255, 255, 255, 0.75);">
                <h2 class="fw-bolder mb-3">Payment Process</h2>
                <style>
                    .label {
                        margin-bottom: 15px;
                        position: relative;
                        border-bottom: 1px solid #ddd;
                    }

                    .input {
                        width: 100%;
                        padding: 10px 0px;
                        margin-top: 10px;
                        border: none;
                        outline: none;
                        background-color: transparent;
                    }

                    .input::placeholder {
                        opacity: 0;
                    }

                    .spann {
                        position: absolute;
                        top: 0;
                        left: 0;
                        transform: translateY(30px);
                        font-size: 0.825em;
                        transition-duration: 300ms;
                    }

                    .label:focus-within>.spann,
                    .input:not(:placeholder-shown)+.spann {
                        color: purple;
                        transform: translateY(0px);
                    }
                </style>
                <p class="lead fw-normal text-light mb-1" style="font-size: 15px;">
                    To complete your registration process,
                </p>
                <ul>
                    <li>Go to Mpesa Menu, Lipa Na Mpesa</li>
                    <li>Select Buy Goods and Services</li>
                    <li>Enter Till Number: <span style="font-weight: 700; color: #000">9161055</span></li>
                    <li>Enter amount, <span style="font-weight: 700; color: #000">Ksh. 300</span></li>
                    <li>Enter your Mpesa pin and click ok.</li>
                </ul>
                 <p class="lead fw-normal text-light mb-1" style="font-size: 15px;">
                    After receiving the mpesa transaction message, enter the transaction code below and click submit. <span class="text-dark">DONE!</span>
                </p>
                <form action="./backend/_confirm-pay.php" method="post" enctype="multipart/form-data">
                    <div class="form-group mb-3">
                        <label for="fname" class="label">
                            <input type="text" name="t-code" required class="input" id="exampleInput1" placeholder="Mpesa Code">
                            <span class="spann">Mpesa Code</span>
                        </label>
                    </div>
                    <div class="col-12">
                        <input type="hidden" name="nominee_id" id="nominee_id" value="<?php echo $nominee_id ?>">
                        <input type="submit" name="c-pay" value="Submit" class="btn btn-primary px-4  me-sm-3">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </main>
    <?php include_once 'footer.php'; ?>