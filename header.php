<?php
session_start();
include "Flash_data.php";
if(!isset($_SESSION['user_id'])){
    header('location:login.php');
}
$user_id = $_SESSION['user_id'];
$role = $_SESSION['role'];
if( empty($sub_page) ){
    $sub_page = '';
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>GUB - Dashboard</title>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <link href="css/main.css" rel="stylesheet">
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/toastr.css">
    
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/toastr.min.js"></script>

    <style>
        .form-control:focus{
            box-shadow: none;
        }
    </style>

</head>

<body id="page-top">

<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center bg-white" href="index.php">
            <div class="sidebar-brand-text mx-3">
                <img src="img/gub.png" alt="" width="140">
            </div>
        </a>
    
        <!-- Nav Item - Dashboard -->
        <li class="pt-4 nav-item <?php if($page == 'dashboard'){echo 'active';}?>">
            <a class="nav-link" href="index.php">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
    <?php
        if($role != 'student'){
    ?>
        <!-- Nav Item - Pages Collapse Menu -->
        <?php
        if($role == 1){
            ?>
            <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-chalkboard-teacher"></i>
                <span>Manage Teacher</span>
            </a>
            <div id="collapseTwo" class="collapse <?php if($page == 'manage_teacher'){echo 'show';}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="collapse-inner">
                    <a class="collapse-item <?php if($sub_page == 'view_teacher'){echo 'active';}?>" href="view-teacher.php">Teacher</a>
                    
                </div>
            </div>
        

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-book"></i>
                <span>Manage Class</span>
            </a>
            <div id="collapseThree" class="collapse <?php if($page == 'manage_class'){echo 'show';}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="collapse-inner">
                    <a class="collapse-item <?php if($sub_page == 'view_batch'){echo 'active';}?>" href="view-batch.php">Batch</a>

                    <a class="collapse-item <?php if($sub_page == 'view_class'){echo 'active';}?>" href="view-class.php">Class</a>

                </div>
            </div>
        </li>
        </li>
            <?php
        }
        ?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-users"></i>
                <span>Manage Student</span>
            </a>
            <div id="collapseFour" class="collapse <?php if($page == 'manage_student'){echo 'show';}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="collapse-inner">
                    <a class="collapse-item <?php if($sub_page == 'view_student'){echo 'active';}?>" href="view-student.php">View Student</a>
                </div>
            </div>
        </li>
        <?php
        if($role == 0){
            ?>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive"
                aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-edit"></i>
                <span>Manage Attendance</span>
            </a>
            <div id="collapseFive" class="collapse <?php if($page == 'manage_attendance'){echo 'show';}?>" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="collapse-inner">
                    <a class="collapse-item <?php if($sub_page == 'view_attendance'){echo 'active';}?>" href="take-attandence.php">Take Attendance</a>

                    <a class="collapse-item <?php if($sub_page == 'view_present'){echo 'active';}?>" href="view-present.php">View Present</a>

                    <a class="collapse-item <?php if($sub_page == 'all_present'){echo 'active';}?>" href="all-present.php">All Present</a>
                </div>
            </div>
        </li>
        <?php
        }
        }else{
            ?>
            <li class="nav-item <?php if($page == 'profile'){echo 'active';}?>">
                <a class="nav-link" href="profile.php">
                    <i class="fas fa-user fa-sm fa-fw"></i>
                    <span>My Profile</span></a>
            </li>
            <li class="nav-item <?php if($page == 'settings'){echo 'active';}?>">
                <a class="nav-link" href="setting.php">
                    <i class="fas fa-cogs fa-sm fa-fw"></i>
                    <span>Settings</span></a>
            </li>
            <li class="nav-item <?php if($page == 'enroled_class'){echo 'active';}?>">
                <a class="nav-link" href="enroled-course.php">
                <i class="fas fa-book"></i>
                    <span>Enroled Course</span></a>
            </li>
            <?php
        }
    ?>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">
    </ul>
    <!-- End of Sidebar -->

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

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                            aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                        placeholder="Search for..." aria-label="Search"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Nav Item - Alerts -->
                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                <?php
                                    echo $_SESSION['user_name'];
                                ?>
                            </span>
                            <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.964 0a9 9 0 1 0-11.963 0m11.962 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0a3 3 0 0 1 6 0"/></svg>
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                            aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="profile.php">
                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                Profile
                            </a>
                            <a class="dropdown-item" href="setting.php">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <!-- End of Topbar -->