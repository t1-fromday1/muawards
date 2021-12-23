<?php
session_start();
include "./config.php";

// echo $_SESSION['count']++; die;
if (isset($_SESSION['user'])) {
    $nominee_id = $_SESSION['user'];
    //get details
    $get_nominee = mysqli_query($conn, "SELECT * FROM nominees WHERE user_id = '$nominee_id'") or die(mysqli_error($conn));
    $nominee = mysqli_fetch_array($get_nominee);
    $fname = $nominee['f_name'];
    $cat = $nominee['category'];
} else {
    header("location: ./register.php?error=exists");
}
include_once 'header.php';
?>
<header class="bg-dark" style="height: 100vh;">
    <div class="container">
        <div class="row gx-5 align-items-center justify-content-center">
            <div class="col-lg-8 col-xl-7 col-xxl-6" style="margin-top: 100px">
                <?php

                if (isset($_GET['status'])) {
                    if ($_GET['status'] == 'registration_success') {
                ?>
                <div class="text-center text-xl-start">
                    <h1 class="display-5 fw-bold text-white mb-3" style="font-size: 30px;">
                        <p style="margin-bottom: 3px;">Congrats
                            <?php echo $fname ?>,</p><br>
                        <p style="font-size: 20px;">You registration has been
                            received successfully. <br>You will receive an email with more details on your registration
                            status. Call/text on <span style="color: #000;">0768190316</span> or <span style="color: #000;">0795204398</span>.</p>
                    </h1>
                    <p class="lead fw-normal text-white mb-4">Track application code: <button
                            class="btn btn-outline-warning"><?php echo $nominee['user_id'] ?></button></p>
                            <p style="color: #fff; font-size: 12px;">This code helps you track your application and query your status.</p>
                </div>
                
                <?php  } elseif ($_GET['status'] == "exists") { ?>
                <div class="text-center text-xl-start" style="padding: 0;">
                    <h1 class=" display-5 fw-bolder text-white mb-2" style="font-size: 20px; margin-top: 10px;">Hi <?php echo $fname ?>,<br>We have received your application as <br> <?php echo '<span style="color: #000;">'.$cat.'</span>'?><br>We have a problem confirming your payment.<br> Please send a screenshot of payment via WhatsApp: <a style="cursor: pointer; color: #000;" href="http://wa.me/+254740715620"><br>Click Here.</a></h1>
                    <p class="lead fw-normal text-white mb-4">Or Enter the M-Pesa transaction code and click confirm.</p>
                    <div class="col-md-6" style="height: 100px;">
                        <form action="./backend/_confirm-pay.php" method="post" id="confirm-pay-form">
                            <div class="form-group mb-3">
                                <input type="hidden" name="nominee_id" value="<?php echo $nominee_id ?>" id="nominee_id"
                                    class="form-control">
                                <input type="text" required name="t-code" placeholder="Enter M-Pesa transaction code."
                                    id="t-code" style="background-color: rgba(0,0,0,.4); border: none"
                                    class="form-control">
                            </div>
                            <button type="submit" class="btn btn-warning text-light" id="submit-code-btn"
                                name="submit-code">Confirm
                                Payment</button>
                        </form>
                     <?php } die; ?>
                    <p class="lead fw-normal text-white mb-4">After receiving the mpesa transaction code,
                        enter the
                        code
                        below and click confirm payment.</p>
                    <div class="col-md-6" style="height: 100px;">
                        <form action="./backend/_confirm-pay.php" method="post" id="confirm-pay-form">
                            <div class="form-group mb-3">
                                <input type="hidden" name="nominee_id" value="<?php echo $nominee_id ?>" id="nominee_id"
                                    class="form-control">
                                <input type="text" name="t-code" placeholder="Enter M-Pesa transaction code."
                                    id="t-code" style="background-color: rgba(0,0,0,.4); border: none"
                                    class="form-control">
                            </div>
                            <button type="submit" class="btn btn-warning text-light" id="submit-code-btn"
                                name="submit-code">Confirm
                                Payment</button>
                        </form>
                        <?php } ?>
                    </div>
                </div>
            </div>
            </div>
        </div>
        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center" style="margin-top: 100px">
            <img class="img-fluid rounded-3 my-5" src="images/paysuccess.svg" id="success-image"
                alt="Payment success svg" />
        </div>
    </div>
    </div>
</header>
<?php include 'footer.php'; ?>