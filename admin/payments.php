<?php 
    session_start(); 
    include "../backend/config.php"; 
    if(isset($_SESSION['admin'])){
        $admin = $_SESSION['admin'];
        //get admin
         $getadmin = mysqli_query($conn, "SELECT * FROM admin WHERE user_id = '$admin'") or die(mysqli_error($conn));
        $admin = mysqli_fetch_array($getadmin);
        $name = $admin['name'];
    }else{
        header("location: ./login.php");die;
    }

    $get_users = "SELECT nominees.f_name, nominees.l_name,  payments.status, nominees.pic, nominees.phone, nominees.email, payments.mpesa_code, payments.payment_date FROM `payments` INNER JOIN nominees ON (payments.nominee_id = nominees.user_id)";
    $users = mysqli_query($conn, $get_users) or die(mysqli_error($conn));
    $user = mysqli_fetch_all($users, MYSQLI_ASSOC);
?>
<?php include 'includes/header.php' ?>

<body id="page-top">

    <?php include 'includes/navbar.php'?>

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- Topbar -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- Sidebar Toggle (Topbar) -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>


                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span
                                class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name ?></span>
                            <img class="img-profile rounded-circle" src="img/undraw_profile.svg">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->

            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Payments</h1>
                    <a href="#" style="background: #84077b; border-style:none;"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <div class="card-body">
                        <?php 
                            if(isset($_SESSION['rejected'])){ echo $_SESSION['rejected']; } unset($_SESSION['rejected']); 
                            if(isset($_SESSION['accepted'])){ echo $_SESSION['accepted']; } unset($_SESSION['accepted']); 
                        ?>
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th colspan="2">Name</th>
                                        <th>Phone</th>
                                        <th>M-Pesa Code</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $output = "";
                                        foreach ($user as $u) {
                                            $output .= '
                                                <tr>
                                                    <td>
                                                        <div id="avatar-sm">
                                                            <img src="../images/'.$u['pic'].'" alt="'.$u['pic'].'" class="image">
                                                        </div>
                                                    </td>
                                                    <td>'.$u["f_name"].' '.$u["l_name"].'</td>
                                                    <td>'.$u["phone"].'</td>
                                                    <td>'.$u['mpesa_code'].'</td>
                                                    <td>'.date("jS M, Y", strtotime($u['payment_date'])).'</td>
                                                    <td><button class="btn btn-sm btn-outline-primary">'.$u['status'].'</button></td>';
                                                        if($u['status'] != 'pending'){
                                                            $output .= '
                                                            <td>
                                                                <a href="#" class="btn btn-sm btn-success disabled">Accept</a>
                                                                <a href="#" class="btn btn-sm btn-danger disabled">Reject</a>
                                                            </td>
                                                            </tr>
                                                            ';
                                                        }else{
                                                    $output .= '
                                                    <td>
                                                        <a href="../backend/_accept.php?t-code='.$u['mpesa_code'].'" class="btn btn-sm btn-success accept">Accept</a>
                                                         <a href="../backend/_reject.php?t-code='.$u['mpesa_code'].'" class="btn btn-sm btn-danger reject">Reject</a>
                                                    </td>
                                                </tr>
                                            ';
                                            }
                                        }
                                        echo $output;
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    <!-- /.container-fluid -->
    </div>
    <!-- End of Main Content -->
    <?php include 'includes/footer.php';?>
    </div>
    <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <?php include 'includes/logout_model.php';?>
    <?php include 'includes/scripts.php'; ?>