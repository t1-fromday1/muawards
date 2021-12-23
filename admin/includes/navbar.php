 <!-- Page Wrapper -->
 <div id="wrapper">

     <!-- Sidebar -->
     <ul class="navbar-nav primary sidebar sidebar-dark accordion" style="background: #84077b" id="accordionSidebar">

         <!-- Sidebar - Brand -->
         <a class="sidebar-brand d-flex align-items-center justify-content-center" href="dashboard.php">
             <div class="sidebar-brand-text mx-3">MUAWARDS</div>
         </a>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">

         <!-- Nav Item - Dashboard -->
         <li class="nav-item active">
             <a class="nav-link" href="dashboard.php">
                 <span class="d-flex align-items-center justify-content-center">Dashboard</span></a>
         </li>

         <!-- Divider -->
         <hr class="sidebar-divider">

         <!-- Heading -->
         <div class="sidebar-heading d-flex align-items-center justify-content-center">
             Controls
         </div>

         <!-- Nav Item - Pages Collapse Menu -->
         <li class="nav-item">
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                 aria-expanded="true" aria-controls="collapseTwo">
                 <i class="fas fa fa-user-o"></i>
                 <span>Nominees</span>
             </a>
             <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">

                     <a class="collapse-item" href="./nominees.php">Manage nominees</a>
                 </div>
             </div>
             <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                 aria-expanded="true" aria-controls="collapseThree">
                 <i class="fas fa fa-user-o"></i>
                 <span>Payments</span>
             </a>
             <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionSidebar">
                 <div class="bg-white py-2 collapse-inner rounded">

                     <a class="collapse-item" href="payments.php">Manage payments</a>
                 </div>
             </div>
         </li>
         <!-- Divider -->
         <hr class="sidebar-divider d-none d-md-block">

         <!-- Sidebar Toggler (Sidebar) -->
         <div class="text-center d-none d-md-inline">
             <button class="rounded-circle border-0" id="sidebarToggle"></button>
         </div>

     </ul>
     <!-- End of Sidebar -->