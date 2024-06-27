<?php
    $page = "manage_teacher";
    $sub_page = "view_teacher";
    include("header.php");
    include "main.php";
    $obj = new Main();

    $data = $obj->viewTeacher();
    


?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage Teacher</h1>

    <div class="row">
        <div class="col-md-7">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">View Teacher</h6>
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
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Designation</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($data->num_rows > 0){
                                        while($row = $data->fetch_object()){
                                            ?>
                                            <tr>
                                                <td><?php echo $row->t_name ?></td>
                                                <td><?php echo $row->t_email ?></td>
                                                <td>
                                                    <?php echo $row->t_designation ?>
                                                    <?php
                                                        if($row->role == 1){
                                                            ?>
                                                            <span class="text-danger">*</span>
                                                            <?php
                                                        }
                                                    ?>
                                                    
                                                </td>
                                                <td>
                                                    <?php
                                                        if($row->role == 1){
                                                            ?>
                                                                <a onclick="javascript: return confirm('Are You Sure?');" href="make-admin.php?id=<?php echo $row->t_id;?>&role=<?php echo $row->role;?>" class="btn btn-sm btn-primary my-1">Undo</a>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <a onclick="javascript: return confirm('Are You Sure?');" href="make-admin.php?id=<?php echo $row->t_id;?>&role=<?php echo $row->role;?>" class="btn btn-sm btn-primary my-1">Make Admin</a>
                                                            <?php
                                                        }
                                                    ?>
                                                    <?php 
                                                        if($user_id == $row->t_id){
                                                            ?>
                                                                <a href="#" class="btn btn-sm btn-danger my-1" style="pointer-events: none;opacity:.6;">Delete</a>
                                                            <?php
                                                        }else{
                                                            ?>
                                                                <a onclick="javascript: return confirm('Are You Sure You Want To Delete This Data?');" href="teacher-delete.php?id=<?php echo $row->t_id;?>" class="btn btn-sm btn-danger my-1">Delete</a>
                                                            <?php
                                                        }
                                                    ?>
                                                </td>
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
                    <h6 class="m-0 font-weight-bold text-primary">Add Teacher</h6>
                </div>
                <div class="card-body">
                    <form action="add-teacher.php" autocomplete="off" method="post">
                        <div class="form-group">
                            <label for="name">Teacher Name</label>
                            <input type="text" name="name" class="form-control" placeholder="Teacher Name" />
                        </div>
                        <div class="form-group">
                            <label for="name">Teacher Email</label>
                            <input type="text" autocomplete="false" name="email" class="form-control" placeholder="Teacher Email" />
                        </div>
                        <div class="form-group">
                            <label for="">Teacher Designation</label>
                            <input type="text" name="designation" class="form-control" placeholder="Teacher Designation" />
                        </div>
                        <div class="form-group">
                            <label for="name">Role</label>
                            <select name="role" class="form-control" id="">
                                <option value="0" selected>Teacher</option>
                                <option value="1">Teacher & Modarator</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name">Password</label>
                            <input type="password" autocomplete="false" name="password" class="form-control" placeholder="Enter Password" />
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-success"  />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

<?php
    include("footer.php");
?>        