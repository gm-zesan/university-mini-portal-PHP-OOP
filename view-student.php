<?php
    $page = "manage_student";
    $sub_page = "view_student";
    include("header.php");
    include("main.php");
    $obj = new Main();

    $batch = $obj->viewBatch();
    $class = $obj->viewClass();
    $data = $obj->viewStudent();
    
    $course = $obj->viewClass();

    $shuter = false;

    if(isset($_GET["id"])){
        $shuter = true;
        $id = $_GET['id'];

        $find_student = $obj->findStudentById($id);
        if($find_student->num_rows>0){
            while($row = $find_student->fetch_object()){
                $s_id = $row->s_id;
                $s_name = $row->s_name;
                $s_email = $row->s_email;
                $s_father = $row->s_father;
                $s_mother = $row->s_mother;
                $batch_id = $row->batch_id;
                $phone = $row->phone;
            }
        }
    }
?>

<!-- Begin Page Content -->
<div class="container-fluid">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link href="css/main.css" rel="stylesheet">
    <style>
        .select2-container{
            width: 100% !important;
        }
    </style>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Manage Student</h1>

    <div class="row">
    <div class="col-md-12">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"><?php if($shuter == true){echo "Update Student";}else{echo "Add Student"; }?></h6>
                </div>
                <div class="card-body">
                    <?php
                        if($shuter == true){
                            ?>
                                <form action="update.php" method="post">
                                    <div class="form-group">
                                        <label for="name">Student Name</label>
                                        <input type="text" name="name" value="<?php echo $s_name;?>" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Student Email</label>
                                        <input type="email" name="email" value="<?php echo $s_email;?>" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Father's Name</label>
                                        <input type="text" name="father" value="<?php echo $s_father;?>" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Mother's Name</label>
                                        <input type="text" name="mother" value="<?php echo $s_mother;?>" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <label for="class">Select Batch</label>
                                        <select name="batch_id" class="form-control" id="class" required>
                                            <?php
                                                if($batch->num_rows>0){
                                                    while($bat = $batch->fetch_object()){
                                                        ?>
                                                            <option <?php if($bat->batch_id == $batch_id){echo "selected";} ?> value="<?php echo $bat->batch_id; ?>"><?php echo $bat->batch_id; ?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Phone Number</label>
                                        <input type="text" name="phone" value="<?php echo $phone;?>" class="form-control"/>
                                    </div>
                                    <div class="form-group">
                                        <input type="hidden" name="up" value="student" />
                                        <input type="hidden" name="id" value="<?php echo $s_id ?>" />
                                        <input type="submit" name="submit" value="Update" class="btn btn-success"  />
                                        <a class="btn btn-danger" href="view-student.php">Cancle</a>
                                    </div>
                                </form>
                            <?php
                        }else{
                            ?>
                                <form action="add-student.php" method="post" autocomplete="off">
                                    <div class="form-group">
                                        <label for="name">Student Name</label>
                                        <input type="text" name="name" class="form-control" placeholder="Student Name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Student Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="Student Email" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Father's Name</label>
                                        <input type="text" name="father" class="form-control" placeholder="Father's Name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Mother's Name</label>
                                        <input type="text" name="mother" class="form-control" placeholder="Mother's Name" />
                                    </div>
                                    <div class="form-group">
                                        <label for="class">Select Batch</label>
                                        <select name="batch_id" class="form-control" id="class" required>
                                            <option value=""Selected disabled>Select Class</option>
                                            <?php
                                                if($batch->num_rows>0){
                                                    while($bat = $batch->fetch_object()){
                                                        ?>
                                                            <option value="<?php echo $bat->batch_id; ?>"><?php echo $bat->batch_id; ?></option>
                                                        <?php
                                                    }
                                                }
                                            ?>
                                            
                                        </select>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="phone">Phone Number</label>
                                        <input type="text" name="phone" class="form-control" placeholder="Enter Phone Number" />
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" autocomplete="false" name="password" class="form-control" placeholder="Enter Password" />
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
        <div class="col-md-12">
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">View Student</h6>
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
                                    <th>Student id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Father</th>
                                    <th>Mother</th>
                                    <th>Batch</th>
                                    <th>Phone</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    if($data->num_rows>0){
                                        while($row = $data->fetch_object()){
                                            ?>
                                                <tr>
                                                    <td><?php echo $row->s_id; ?></td>
                                                    <td><?php echo $row->s_name; ?></td>
                                                    <td><?php echo $row->s_email; ?></td>
                                                    <td><?php echo $row->s_father; ?></td>
                                                    <td><?php echo $row->s_mother; ?></td>
                                                    <td><?php echo $row->batch_id; ?></td>
                                                    <td><?php echo $row->phone; ?></td>
                                                    <td>
                                                        <a href="view-student.php?id=<?php echo $row->s_id;?>" class="btn btn-sm btn-primary my-1">Edit</a>

                                                        <a type="button" onclick="assignCourse(<?php echo $row->s_id ?>, '<?php echo $row->s_name ?>')" class="btn btn-sm btn-info my-1"  data-bs-toggle="modal">Assign Course</a>

                                                        <a onclick="javascript: return confirm('Are You Sure You Want To Delete This Data?');" href="delete-student.php?id=<?php echo $row->s_id; ?>" class="btn btn-sm btn-danger my-1">Delete</a>

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
</div>
<!-- Modal -->
<div class="modal fade" id="assignCourse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="assignCourseLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="assignCourseLabel"></h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="assign-course.php" method="post">
            <div class="form-group mb-3">
                <div class="mb-3">
                    <h6>Already assigned</h6> 
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tbody>
                                <tr>
                                    <th>Course</th>
                                    <td id="setAssignCourse"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- <div class="row" id="setAssignCourse">
                        
                    </div> -->
                </div>
                <label for="course">Select Course for Assign</label>
                <!-- multiple select -->
                <select name="course_id[]" class="form-select" id="multiple-course"  multiple="multiple">
                    <?php
                        if($course->num_rows>0){
                            while($cal = $course->fetch_object()){
                                ?>
                                    <option value="<?php echo $cal->class_id; ?>"><?php echo $cal->class_name; ?></option>
                                <?php
                            }
                        }
                    ?>
                </select>
                

            </div>
            <div class="form-group">
                <input type="hidden" name="student_id" id="student_id" />
                <input type="submit" name="submit" class="btn btn-success"  />
            </div>

        </form>
      </div>
    </div>
  </div>
</div>
<!-- /.container-fluid -->


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
    $(document).ready(function() {
        $('#multiple-course').select2({
            placeholder: "Select Course",
            allowClear: true,
        });
    });
    function assignCourse(id, name){
        $('#assignCourseLabel').html('Assign Course For - '+name + ' ('+id+')');
        $('#assignCourse').modal('show');
        $('#assignCourse').modal({backdrop: 'static', keyboard: false});
        $('#student_id').val(id);


        // Fetch assigned courses using AJAX
        $.ajax({
            url: 'get_assigned_courses.php',
            type: 'GET',
            data: {student_id: id},
            success: function(response) {

                $('#setAssignCourse').html('');



                let assignedCourses = JSON.parse(response);
                if (assignedCourses.length > 0) {
                    assignedCourses.forEach(course => {
                        $('#setAssignCourse').append('<div class="col-md-3"><span class="badge bg-primary">'+course.class_name+'</span></div>');});
                } else {
                    $('#setAssignCourse').html('No course assigned');
                }

            },
            error: function(error) {
                console.log("Error fetching assigned courses: ", error);
            }
        });
    }

</script>

<?php
    include("footer.php");
?>        