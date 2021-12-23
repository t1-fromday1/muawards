<?php 

    session_start();
    include "./config.php";
    include "./_sendmail.php";
    
    if(isset($_GET['t-code'])){
        $t_code = mysqli_real_escape_string($conn, $_GET['t-code']);

        $getpayment = mysqli_query($conn, "SELECT * FROM payments WHERE mpesa_code = '$t_code'") or die(mysqli_error($conn));
        
        $payment = mysqli_fetch_array($getpayment);
        
        $user_id = $payment['nominee_id'];

        //get user
        $getuser = mysqli_query($conn, "SELECT * FROM nominees WHERE user_id = '$user_id'") or die(mysqli_error($conn));
        $user = mysqli_fetch_array($getuser);

        $query = mysqli_query($conn, "UPDATE payments SET status = 'paid' WHERE mpesa_code = '$t_code'") or die(mysqli_error($conn));

        if($query){
            mysqli_query($conn, "UPDATE nominees SET is_activated = 'activated' WHERE user_id = '$user_id'") or die(mysqli_error($conn));   

            $body = '
                <div style="padding: 10px 30px; margin: 0 auto; background-color: #4986fc; border-radius: 0 25px; color: #d9d7d7">
                <p style="font-size: 24px; margin-top:20px;">
                </p>
                <div style="height: 2px; width: 100%; color: fff;"></div>
                <p style="font-size: 16px; margin-top: 30px">
                    Hello <b>'.$user['f_name'].', your application for '.$user['category'].' has been received and accepted
                        successfully. <br>
                        The voting date will be communicated after the nomination period is over. <br>
                        Regards, <br>
                        MUAWARDS Maseno.
                </p>
                <p style="font-size: 18px; margin-top: 17px">
                    You received this email because you registered for MUAWARDS nomination. <br>
                    © '.date("Y"). ' MUAWARDS Maseno.
                </p>
                <img style="height: 30px" src="./images/logo.png" alt="" srcset="">
            </div>
                    ';
            
            $name = $user['f_name']." ".$user['l_name'];
            $email = $user['email'];
            $subject = 'Nomination Acceptance - '.$name;
            $sendmail = sendmail($body, $email, $name, $subject);

            $_SESSION['accepted'] = '
                <div class="alert alert-success" role="alert">
                    Nomination application payment accepted successfully.
                </div>
            ';
            header("location: ../admin/payments.php"); die;
        }
    }


?>