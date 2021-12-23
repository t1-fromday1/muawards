<?php
    include 'config.php'; 
    session_start();
    if(isset($_POST['register'])) {
        
        $user_id = base64_encode(random_bytes(6));
        $user_id = strtr($user_id, '+/', '-_');

        $fname = mysqli_real_escape_string($conn, $_POST['fname']);
        $lname = mysqli_real_escape_string($conn, $_POST['lname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $reg_no = mysqli_real_escape_string($conn, $_POST['reg_no']);
        $year = mysqli_real_escape_string($conn, $_POST['year']);
        $category = mysqli_real_escape_string($conn, $_POST['category']);

         // $avatar = "";
        $filename = $_FILES['pic']['name']; 
        $target = "../images/" .basename($filename);
        $file = $_FILES['pic']['tmp_name'];
        $size = $_FILES['pic']['size'];
        // echo $size; die;
        $extension = pathinfo($filename, PATHINFO_EXTENSION); 

        move_uploaded_file($file, $target) or die("Error uploading file. please try again");

        //check if already registered
        $check = mysqli_query($conn, "SELECT * FROM nominees WHERE email = '$email'") or die(mysqli_error($conn));
        if(mysqli_num_rows($check) > 0){
            header("location: ../payment-verify.php?status=exists"); die;
        } else {

            $sql = "INSERT INTO nominees (user_id, f_name, l_name, email, phone, reg_no, year, pic, category) 
                    VALUES ('$user_id', '$fname', '$lname', '$email', '$phone', '$reg_no', '$year', '$filename', '$category')";
            $results = mysqli_query($conn, $sql);
            if($results) {
                
                $_SESSION['user'] = $user_id;
                header("location: ../payment.php"); die;
            }
        }
    }


?>