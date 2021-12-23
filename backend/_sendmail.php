<?php   
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require '../vendor/autoload.php';

    function sendmail($body, $email,$name, $subject){
        $response = [];
        $primarymail = 'eriquetoon@gmail.com';
        $pass = 'thispassword255@';

        $mail = new PHPMailer(true);

        try {
            // $mail->SMTPDebug = 3; 
            // $mail->isSMTP();   
            $mail->Host       = 'smtp.gmail.com'; 
            $mail->SMTPAuth   = true; 
            $mail->Username   = $primarymail;
            $mail->Password   = $pass;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;

            $mail->setFrom($primarymail, 'MUAWARDS');
            $mail->addAddress($email, $name); 

            $mail->isHTML(true); 
            $mail->Subject = $subject;
            $mail->Body = $body;

            $mail->send();

            echo "mail_sent";

        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}"; 
        }

    }

