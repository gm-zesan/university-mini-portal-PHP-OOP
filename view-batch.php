<?php
    $page = "manage_class";
    $sub_page = "view_batch";
    include("header.php");
    include "main.php";
    $obj = new Main();

    $data = $obj->viewBatch();

    $shuter = false;

    if(isset($_GET["id"])){
        $shuter = true;
        $id = $_GET['id'];

        $find_batch = $obj->findBatch($id);
        if($find_batch->num_rows>0){
            while($row = $find_batch->fetch_object()){
                $batch_id = $row->batch_id;
                $description = $row->description;
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
                    <h6 class="m-0 font-weight-bold text-primary">View Batch</h6>
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
                                    <th>Batch Id</th>
                                    <th>Description</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                    if($data->num_rows > 0){
                                        while($row = $data->fetch_object()){
                                            $check = $obj->checkInclude($row->batch_id);
                                            ?>
                                                <tr>
                                                    <td><?php echo $row->batch_id; ?></td>
                                                    <td><?php echo $row->description; ?></td>
                                                    <?php
                                                        if($check->num_rows>0){
                                                            ?>
                                                            <td>
                                                                <a href="#" class="btn btn-sm btn-primary" style="pointer-events: none;opacity:.6;">Edit</a>

                                                                <a href="#" class="btn btn-sm btn-danger" style="pointer-events: none;opacity:.6;">Delete</a>
                                                            </td>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <td>
                                                                <a href="view-batch.php?id=<?php echo $row->batch_id; ?>" class="btn btn-sm btn-primary">Edit</a>

                                                                <a onclick="javascript: return confirm('Are You Sure You Want To Delete This Data?');" href="delete-batch.php?id=<?php echo $row->batch_id; ?>" class="btn btn-sm btn-danger">Delete</a>
                                                            </td>
                                                            <?php
                                                        }
                                                    ?>
                                                </tr>
                                            <?php
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
                    <h6 class="m-0 font-weight-bold text-primary"><?php if($shuter == true){echo "Update Batch";}else{echo "Add Batch"; }?></h6>
                </div>
                <div class="card-body">
                    <?php
                        if($shuter == true){
                            ?>
                            <form action="update.php" method="post">
                                <div class="form-group">
                                    <label for="name">Batch Id</label>
                                    <input type="text" name="batchId" value="<?php echo $batch_id ?>" class="form-control" placeholder="Batch Id" required />
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea name="description" value="<?php echo $description; ?>" class="form-control" rows="5" placeholder="Enter Description">lorem ipsum dami text!</textarea>
                                </div>
                                <div class="form-group">
                                    <input type="hidden" name="up" value="batch" />
                                    <input type="hidden" name="id" value="<?php echo $batch_id ?>" />
                                    <input type="submit" name="submit" value="Update" class="btn btn-success"  />
                                    <a class="btn btn-danger" href="view-batch.php">Cancle</a>
                                </div>  
                            </form>
                            <?php
                        }else{
                            ?>
                            <form action="add-batch.php" method="post">
                                <div class="form-group">
                                    <label for="name">Batch Id</label>
                                    <input type="text" name="batchId" class="form-control" placeholder="Batch Id" required />
                                </div>
                                <div class="form-group">
                                    <label for="name">Description</label>
                                    <textarea name="description" class="form-control" rows="5" placeholder="Enter Description"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="submit"  class="btn btn-success"  />
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