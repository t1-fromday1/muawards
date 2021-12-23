<?php 

    include './config.php';
    session_start();
    if (isset($_POST['login-btn'])){
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $password = md5($password);

        //check if user exists
        $check_user = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username' AND password = '$password'") or die(mysqli_error($conn));
        $admin = mysqli_fetch_array($check_user);

        if($admin){
            $_SESSION['admin'] = $admin['user_id'];
            header("location: ../admin/");
        }else{
            $_SESSION['login_error'] = '
                <div class="alert alert-success" role="alert">
                    Incorrect username or password.
                </div>
            ';
             header("location: ../admin/login");
        }

    }
?>