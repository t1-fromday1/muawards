<?php 

    include "./config.php";
    if(isset($_POST['t-code'])){
        $t_code = mysqli_real_escape_string($conn, $_POST['t-code']);
        $nominee_id = mysqli_real_escape_string($conn, $_POST['nominee_id']);
        
        //save transaction
        $save = mysqli_query($conn, "INSERT INTO `payments`(`mpesa_code`, `nominee_id`) VALUES ('".$t_code."','".$nominee_id."')") or die(mysqli_error($conn));
        if($save){
            $_SESSION['user'] = $user_id;
            header("location: ../payment-verify.php?status=registration_success"); die;
        }
    }

?>