<?php
   $page = "manage_attendance";
   $sub_page = "view_present";
   include("header.php");
   include("main.php");
   $obj = new Main();
   
   $batch = $obj->viewBatch();
   $class = $obj->viewClass();
   $class_2 = $obj->viewClass();
   $shuter = false;
   if( isset($_GET['date']) && isset($_GET['class_id']) ){
       $date = $_GET['date'];
       $class_id = $_GET['class_id'];
       $find2 = $obj->viewAttendance($date, $class_id);
       $find = $obj->findStudentByCourse($class_id);
       $shuter = true;
   }
   ?>
<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage Attendance</h1>
    <div class="row">
        <div class="col-md-7">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Load Student</h6>
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
                    <form action="#" method="GET">
                        <div class="form-group">
                            <label for="batch">Select Class</label>
                            <select name="class_id" class="form-control" id="batch" required>
                                <?php
                           if($class->num_rows>0){
                               while($cal = $class->fetch_object()){
                                   ?>
                                <option value="<?php echo $cal->class_id; ?>"><?php echo $cal->class_name; ?></option>
                                <?php
                           }
                           }
                           ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Select Date</label>
                            <input name="date" type="date" class="form-control" required />
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-success" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
      if($shuter == true){
          ?>
    <div class="row">
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 text-primary">
                    <h6 class="m-0 font-weight-bold">View Attendance (<?php echo $find->num_rows; ?>) </h6>
                    <h6 class="mt-1">
                        Class :
                        <?php
                     if($class_2->num_rows > 0){
                         while($call = $class_2->fetch_object()){
                             if($call->class_id == $class_id){
                                 echo $call->class_name;
                             }
                         }
                     }
                     ?>
                    </h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table text-center">
                            <thead>
                                <tr>
                                    <th>Student Id</th>
                                    <th>Student Name</th>
                                    <th>Total Present</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                           if($find->num_rows>0){
                           while($row = $find->fetch_object()){
                              //$std_ids = explode(",", $row->present);
                              //$findbyid = $obj->findStudentById();
                              // print_r($row);
                              $presntView = $obj->presentView($class_id);
                           ?>
                                <tr>
                                    <td>
                                        <?php echo $row->s_id; ?>
                                    </td>
                                    <td>
                                        <?php echo $row->s_name; ?>
                                    </td>
                                    <td>
                                        <?php if($presntView->num_rows>0){
                                 $i = 0;
                                 while($p = $presntView->fetch_object()){
                                     
                                     $presentArr = explode(",",$p->present);
                                     if(in_array($row->s_id,$presentArr)){
                                         $i++;
                                     }
                                 }
                                 echo $i."/".$presntView->num_rows;
                                 echo " - ";
                                 echo sprintf('%.0f', ($i/$presntView->num_rows)*100)."%";
                                 } ?>
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
    </div>
    <?php
      }
      
      ?>
</div>
<!-- /.container-fluid -->
<?php
   include("footer.php");
   ?>