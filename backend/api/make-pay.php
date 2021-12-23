<?php
    include "./stk_pay.php";
    include "../../config.php";
    session_start();
    if(isset($_GET['u'])){
        $reg_no = $_GET['u'];
        //get nominee details
        $get_details = mysqli_query($conn, "SELECT * FROM nominees WHERE reg_no = '$reg_no'") or die(mysqli_error($conn));
        $nominee = mysqli_fetch_array($get_details);
        
        $phone = $nominee['phone'];
        $phone = '254743048147';
        $amount = 1;
        $response = makepay($phone, $amount);
        if($response->ResponseCode == 0){
            $_SESSION['CheckoutRequestID'] = $response->CheckoutRequestID;
            mysqli_query($conn, "INSERT INTO `payments`(`CheckoutRequestID`, `nominee_id`, `amount`) VALUES ('".$response->CheckoutRequestID."','".$reg_no."','".$amount."')") or die(mysqli_error($conn));
            header("location: ../../payment-verify.php"); die;
        }else{
            print json_encode($response);
        }
    }

?>