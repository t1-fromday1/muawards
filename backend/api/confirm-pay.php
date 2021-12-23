<?php 

    include "./stk_pay.php";
    include "../../config.php";
    $CheckoutRequestID = mysqli_real_escape_string($conn, $_GET['chk']);
    
    //get nominee details
    $get_details = mysqli_query($conn, "SELECT * FROM payments WHERE CheckoutRequestID = '$CheckoutRequestID'") or die(mysqli_error($conn));
    $nominee = mysqli_fetch_array($get_details);
    $reg_no = $nominee['nominee_id'];

    $response = querypaymentstatus($CheckoutRequestID);

    if($response->ResultCode == 0){
        //activate nominee
        mysqli_query($conn, "UPDATE nominees SET is_activated = 'activated' WHERE reg_no = '$reg_no'") or die(mysqli_error($conn));
        // mysqli_query($conn, "UPDATE payments SET status = 'completed' WHERE CheckoutRequestID = '$CheckoutRequestID'") or die(mysqli_error($conn));
        header("location: ../../payment-verify.php?status=registration_success"); die;
    }
    if($response->ResultCode == 1032){
        header("location: ../../payment-verify.php?status=$response->ResultCode"); die;
    }

?>