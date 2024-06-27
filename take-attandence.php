<?php
   $page = "manage_attendance";
   $sub_page = "view_attendance";
   include("header.php");
   include("main.php");
   $obj = new Main();
   
   $batch = $obj->viewBatch();
   $class = $obj->viewClass();
   $class_2 = $obj->viewClass();
   $shuter = false;
   if(isset($_GET['class_id']) && isset($_GET['date'])){
      $class_id = $_GET['class_id'];
      $date = $_GET["date"];
      $find = $obj->findStudentByCourse($class_id);
      
      $hasPresent = $obj->checkPresent($date,$class_id);
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
                        <div class="form-grouo mb-3">
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
                    <h6 class="m-0 font-weight-bold">Take Attendance (<?php echo $find->num_rows; ?>) </h6>
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
                    <h6>Date : <?php echo $date; ?></h6>

                </div>
                <div class="card-body">
                    <form action="present.php" method="post">
                        <div class="form-group">
                            <!-- <label for="date">Select Date</label>
                        <input id="date" name="date" type="date" class="form-control" required />   -->
                        </div>
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>Student Id</th>
                                        <th>Student Name</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                              if($hasPresent->num_rows > 0){
                                 
                                  while($pv = $hasPresent->fetch_object()){
                                      $presntString = $pv->present;
                                  }
                                  $presentArr = explode(",",$presntString);
                                  // print_r($presentArr);
                                  if($find->num_rows>0){
                                      $c = 1;
                                      while($row = $find->fetch_object()){
                                          ?>
                                    <tr>
                                        <td>
                                          
                                            <?php echo $row->s_id; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->s_name; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-check mx-4">
                                                    <input class="form-check-input" type="radio" name="<?php echo $c;?>"
                                                        value="<?php echo $row->s_id;?>" id="<?php echo $row->s_id;?>"
                                                        <?php if(in_array($row->s_id,$presentArr)){echo "checked";} ?> />
                                                    <label class="form-check-label" for="<?php echo $row->s_id;?>">
                                                        Present
                                                    </label>
                                                </div>
                                                <div class="form-check mx-4">
                                                    <input class="form-check-input" type="radio" name="<?php echo $c;?>"
                                                        id="<?php echo $row->s_id."a";?>" value="absent"
                                                        <?php if(!in_array($row->s_id,$presentArr)){echo "checked";} ?> />
                                                    <label class="form-check-label" for="<?php echo $row->s_id."a";?>">
                                                        Absent
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                              $c++;
                              }
                              }
                              }else{
                              
                              if($find->num_rows>0){
                              $c = 1;
                              while($row = $find->fetch_object()){
                              ?>
                                    <tr>
                                        <td>
                                            <?php echo $row->s_id; ?>
                                        </td>
                                        <td>
                                            <?php echo $row->s_name; ?>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-center">
                                                <div class="form-check mx-4">
                                                    <input class="form-check-input" type="radio" name="<?php echo $c;?>"
                                                        value="<?php echo $row->s_id;?>"
                                                        id="<?php echo $row->s_id;?>" onchange="handleRadioChange(this)" />
                                                    <label class="form-check-label" for="<?php echo $row->s_id;?>">
                                                        Present
                                                    </label>
                                                </div>
                                                <div class="form-check mx-4">
                                                    <input class="form-check-input" type="radio" name="<?php echo $c;?>"
                                                        id="<?php echo $row->s_id."a";?>" value="absent" onchange="handleRadioChange(this)" checked />
                                                    <label class="form-check-label" for="<?php echo $row->s_id."a";?>">
                                                        Absent
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php
                              $c++;
                              }
                              }
                              }
                              ?>
                                </tbody>
                            </table>
                            <input type="hidden" id="total_student" value="<?php echo $c; ?>" name="total" />
                            <input type="hidden" value="<?php echo $class_id; ?>" name="class_id" />
                            <input type="hidden" value="<?php echo $date; ?>" name="date" />
                            <div class="d-flex justify-content-between">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php
      }
      
      ?>

<script>
   let count = 0;
    document.getElementById("present").innerText = count;
    let total = document.getElementById("total_student").value;
    document.getElementById("absent").innerText = ((total-1) - count);
    function handleRadioChange(radio) {
        // Access the selected radio button's value
        var selectedValue = radio.value;
        if (selectedValue == 'absent') {
            // Code to execute when "Present" is selected
            count-=1;
            console.log('Absent selected');
            document.getElementById("present").innerText = count;
            document.getElementById("absent").innerText = ((total-1) - count);
        } else {
            // Code to execute when "Absent" is selected
            console.log('Present selected');
            count+=1
            document.getElementById("present").innerText = count;
            document.getElementById("absent").innerText = ((total-1) - count);
        }
    }
</script>
</div>
<!-- /.container-fluid -->
<?php
   include("footer.php");
?>