<?php
    $page = "enroled_class";
    $sub_page = "view_class";
    include("header.php");
    include "main.php";
    $obj = new Main();

    $allcoursedata = $obj->viewClass();

    $data = $obj->findClassByStudentId($_SESSION['user_id']);

    if(isset($_GET["id"])){
        $id = $_GET['id'];

        $find_class = $obj->findClass($id);
        if($find_class->num_rows>0){
            while($row = $find_class->fetch_object()){
                $class_id = $row->class_id;
                $class_name = $row->class_name;
                $description = $row->class_description;
                
            }
        }
        
    }

?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Courses</h1>

    <div class="row">
        <div class="col-md-6">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Enroled Course</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($data->num_rows > 0){
                                        $i = 1;
                                        while($row = $data->fetch_object()){
                                            
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row->class_name; ?></td>
                                                    
                                                            <?php
                                                    ?>
                                                </tr>
                                            <?php
                                            $i++;
                                        }
                                    }else{
                                        ?>
                                        <tr>
                                            <td colspan="2">There is no course enrolled for you</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        



        <div class="col-md-6">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">All Course</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($allcoursedata->num_rows > 0){
                                        $i = 1;
                                        while($row = $allcoursedata->fetch_object()){
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row->class_name; ?></td>
                                                    
                                                            <?php
                                                    ?>
                                                </tr>
                                            <?php
                                            $i++;
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
    include("footer.php");
?>        