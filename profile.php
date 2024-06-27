<?php
    $page = "profile";
    include("header.php");
    include "main.php";
    $id = $_SESSION['user_id'];
    $obj = new Main();
    if($_SESSION['role'] != 'student'){
        $table = 'teacher';
        $data = $obj->retrivebyid($id, $table);
        if($data->num_rows > 0){
            while($row = $data->fetch_object()){
                $id = $row->t_id;
                $name = $row->t_name;
                $email = $row->t_email;
                $designation = $row->t_designation;
            }
        }
    }else{
        $table = 'student';
        $data = $obj->retrivebyid($id, $table);
        if($data->num_rows > 0){
            while($row = $data->fetch_object()){
                $id = $row->s_id;
                $name = $row->s_name;
                $email = $row->s_email;
                $phone = $row->phone;
            }
        } 
    }
    
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage Profile</h1>

    <div class="row">
        
        <div class="col-md-5">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Edit Profile</h6>
                </div>
                <div class="card-body">
                    <?php
                        if(isset($_SESSION['msg']['change_success'])){
                            ?>
                                <script type="text/javascript">
                                    toastr.success("<?php echo Flass_data::show_error();?>");
                                </script>
                            <?php 
                            }
                        ?>
                   
                    <form action="up_profile.php" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo  $name ?>" placeholder="Name" required />
                        </div>
                        <div class="form-group">
                            <label for="name">Email</label>
                            <input type="email" name="email" class="form-control" value="<?php echo  $email ?>" placeholder="Email" required />
                        </div>
                        <div class="form-group">
                            <?php
                                if($_SESSION['role'] != 'student'){
                                    ?>
                                        <label for="name">Designation</label>
                                        <input type="text" name="designation" class="form-control" value="<?php echo  $designation ?>" placeholder="Designation" />
                                    <?php
                                }else{
                                    ?>
                                        <label for="name">Phone</label>
                                        <input type="text" name="phone" class="form-control" value="<?php echo  $phone ?>" placeholder="Phone" />
                                    <?php
                                }
                            ?>
                            
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