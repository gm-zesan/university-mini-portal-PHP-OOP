<?php
    $page = 'dashboard';
    include("header.php");
    include("main.php");
    $obj = new Main();
    $teacher = $obj->viewTeacher();
    $batch = $obj->viewBatch();
    $class = $obj->viewClass();
    $student = $obj->viewStudent();
    $enroledCourse = $obj->findClassByStudentId($_SESSION['user_id']);

?>

<!-- Begin Page Content main content changable start -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <?php
        if($role != 'student'){
            
            if($role == 1){
                ?>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <a href="view-teacher.php" style="text-decoration:none">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xl font-weight-bold text-primary text-uppercase mb-1">
                                                Total Teacher</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $teacher->num_rows ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-chalkboard-teacher fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>  
                <?php
                        
                }
            ?>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <a href="view-batch.php" style="text-decoration:none">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-success text-uppercase mb-1">
                                    Total Batch</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $batch->num_rows; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-users fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <a href="view-class.php" style="text-decoration:none">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-info text-uppercase mb-1">Total Class
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $class->num_rows; ?></div>
                            </div>
                            <div class="col-auto">
                            <i class="fas fa-book fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <a href="view-student.php" style="text-decoration:none">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">
                                    Total Student</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $student->num_rows; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>

        <?php
        } else{
        ?>


            <!-- Pending Requests Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <a href="view-student.php" style="text-decoration:none">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xl font-weight-bold text-warning text-uppercase mb-1">
                                    Enroled Courses</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $enroledCourse->num_rows; ?></div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-graduation-cap fa-2x text-gray-300"></i>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

    <!-- Content Row -->

    

</div>
<!-- /.container-fluid main content changable end -->

<?php
    include("footer.php");
?>        