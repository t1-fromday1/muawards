<?php 

    session_start();
    include "./config.php";
    if(isset($_GET['t-code'])){
        $t_code = mysqli_real_escape_string($conn, $_GET['t-code']);
        //get details
        $getpayment = mysqli_query($conn, "SELECT * FROM payments WHERE mpesa_code = '$t_code'") or die(mysqli_error($conn));
        $payment = mysqli_fetch_array($getpayment);
        $user_id = $payment['nominee_id'];
        //accept application
        $query = mysqli_query($conn, "UPDATE payments SET status = 'rejected' WHERE mpesa_code = '$t_code'") or die(mysqli_error($conn));
        if($query){
            mysqli_query($conn, "UPDATE nominees SET is_activated = 'rejected' WHERE user_id = '$user_id'") or die(mysqli_error($conn));   
            $_SESSION['rejected'] = '
                <div class="alert alert-success" role="alert">
                    Nomination application payment rejected successfully.
                </div>
            ';
            header("location: ../admin/payments.php"); die;
        }
    }


?>