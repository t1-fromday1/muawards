<?php session_start(); ?>
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
                                class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $_SESSION['name']; ?></span>
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
                    <h1 class="h3 mb-0 text-gray-800">Nominees</h1>
                    <a href="#" style="background: #84077b; border-style:none;"
                        class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
                </div>

                <!-- Content Row -->
                <div class="card shadow mb-4">
                    <?php
                            include 'config.php';
                                $sql = "SELECT * FROM nominees";
                                $results = mysqli_query($conn, $sql);
                                $row_count = mysqli_num_rows($results);
                                $row_users = mysqli_fetch_array($results);

                                echo '<div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Category</th>
                                                    <th>Phone</th>
                                                    <th>Email</th>
                                                    <th>Activation status</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>';

                            while ($row_users = mysqli_fetch_array($results)) {
                                echo '
                                    <tr>
                                        <td>'.$row_users["f_name"].' '.$row_users["l_name"].'</td>
                                        <td>'.$row_users['category'].'</td>
                                        <td>'.$row_users['phone'].'</td>
                                        <td>'.$row_users['email'].'</td>
                                        <td>'.$row_users['is_activated'].'</td>
                                        <td><a href="edit_nominee.php">Edit/Delete</a></td>

                                    </tr>';
                                }
                                echo '</tbody></table></div></div>';
                            mysqli_close($conn);
                        ?>
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