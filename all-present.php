<?php
   $page = "manage_attendance";
   $sub_page = "all_present";
   include("header.php");
   include("main.php");
   $obj = new Main();
   
   $batch = $obj->viewBatch();
   $class = $obj->viewClass();
   $class_2 = $obj->viewClass();
   $shuter = false;
   if(isset($_GET['class_id'])){
       $class_id = $_GET['class_id'];
       $presntView = $obj->presentView($class_id);
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
               <h6 class="m-0 font-weight-bold text-primary">Load Recoard</h6>
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
                     <input type="submit" class="btn btn-success"  />
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
               <h6 class="m-0 font-weight-bold">View Attendance (<?php echo $presntView->num_rows; ?>) </h6>
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
               <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>Date of Present</th>
                           <th>Total Present</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>

                        <?php
                           if($presntView->num_rows > 0){
                                 while($row = $presntView->fetch_object()){
                                    ?>
                                       <tr>
                                             <td><?php echo $row->p_date; ?></td>
                                             <td><?php echo $row->present; ?></td>
                                             <td>
                                                <a href="take-attandence.php?class_id=<?php echo $row->class_id; ?>&batch_id=<?php echo $row->batch_id; ?>&date=<?php echo $row->p_date; ?>" class="btn btn-sm btn-primary">Update</a>
                                                <a onclick="javascript: return confirm('Are You Sure You Want To Delete This Data?');" href="present-delete.php?id=<?php echo $row->p_id;?>" class="btn btn-sm btn-danger">Delete</a>
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