<?php
    $page = "manage_class";
    $sub_page = "view_class";
    include("header.php");
    include "main.php";
    $obj = new Main();
    $data = $obj->viewClass();

    $shuter = false;

    if(isset($_GET["id"])){
        $shuter = true;
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
    <h1 class="h3 mb-4 text-gray-800">Manage Class</h1>

    <div class="row">
        <div class="col-md-7">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">View Class</h6>
                </div>
                <?php
                    if(isset($_SESSION['msg']['addTeacher'])){
                        ?>
                            <script type="text/javascript">
                                toastr.success("<?php echo Flass_data::show_error();?>");
                            </script>
                        <?php 
                        }
                    ?>
                    <?php
                    if(isset($_SESSION['msg']['teacher_error'])){
                        ?>
                            <script type="text/javascript">
                                toastr.error("<?php echo Flass_data::show_error();?>");
                            </script>
                        <?php 
                    }
                ?>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>SL No</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($data->num_rows > 0){
                                        $i = 1;
                                        while($row = $data->fetch_object()){
                                            $check = $obj->checkClassInclude($row->class_id);
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $row->class_name; ?></td>
                                                    <td><?php echo $row->class_description; ?></td>
                                                    
                                                                <td>
                                                                    <a href="view-class.php?id=<?php echo $row->class_id; ?>" class="btn btn-sm btn-primary">Edit</a>

                                                                    <?php
                                                                      if($check->num_rows>0){
                                                                        ?>
                                                                        <a href="" class="btn btn-sm btn-danger" style="pointer-events: none;opacity:.6;">Delete</a>
                                                                        <?php
                                                                      }else{
                                                                        ?>
                                                                        <a onclick="javascript: return confirm('Are You Sure You Want To Delete This Data?');" href="delete-class.php?id=<?php echo $row->class_id; ?>" class="btn btn-sm btn-danger">Delete</a>
                                                                        <?php
                                                                      }
                                                                    ?>
                                                                </td>
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
        <div class="col-md-5">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php if($shuter == true){echo "Update Class";}else{echo "Add Class"; }?></h6>
                </div>
                <div class="card-body">
                    <?php
                        if($shuter == true){
                            
                            ?>
                                <form action="update.php" method="post">
                                    <div class="form-group">
                                        <label for="name">Class Name</label>
                                        <input type="text" value="<?php echo $class_name; ?>" name="class_name" class="form-control" placeholder="CLass Name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Description</label>
                                        <textarea name="description" class="form-control" rows="5" placeholder="Enter Description"><?php echo $description;?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="up" value="class" />
                                        <input type="hidden" name="id" value="<?php echo $class_id ?>" />
                                        <input type="submit" name="submit" value="Update" class="btn btn-success" />
                                        <a class="btn btn-danger" href="view-class.php">Cancle</a>
                                    </div>
                                </form> 
                            <?php
                        }else{
                            ?>
                            <form action="add-class.php" method="post">
                                <div class="form-group">
                                    <label for="name">Class Name</label>
                                    <input type="text" name="class_name" class="form-control" placeholder="CLass Name" />
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea name="class_description" class="form-control" rows="5" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit" class="btn btn-success"  />
                                </div>
                            </form>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
    include("footer.php");
?>        