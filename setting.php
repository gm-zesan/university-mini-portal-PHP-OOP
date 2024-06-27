<?php
    $page = "settings";
    include("header.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage Profile</h1>

    <div class="row">
        
        <div class="col-md-5">
        <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
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
                    <?php
                    if(isset($_SESSION['msg']['pass_error'])){
                        ?>
                            <script type="text/javascript">
                                    toastr.error("<?php echo Flass_data::show_error();?>");
                            </script>
                        <?php 
                        }
                    ?>
                   
                    <form action="change_pass.php" method="post">
                        <div class="form-group">
                            <label for="name">Current Password</label>
                            <input type="password" name="old_password" class="form-control" placeholder="current password" required />
                        </div>
                        <div class="form-group">
                            <label for="name">New Password</label>
                            <input type="password" name="password1" class="form-control" placeholder="new password" required />
                        </div>
                        <div class="form-group">
                            <label for="name">Confirm Password</label>
                            <input type="password" name="password2" class="form-control" placeholder="confirm password" required />
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