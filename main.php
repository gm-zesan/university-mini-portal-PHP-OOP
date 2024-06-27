<?php
    class Main{
        protected $host = "localhost";
        protected $user = "root";
        protected $pass = "";
        protected $db = "attendance_green";
        protected $con;
        protected $result;
        protected $sql;

        //database conection
        public function __construct(){
            if(!isset($this->con)){
                $this->con = new mysqli($this->host,$this->user,$this->pass,$this->db);
                if(!$this->con){
                    $_SESSION['error'] = "Can not Connect Database";
                }
            }
            return $this->con;
        }
        //login user data fetch method
        public function retrive($u){
            echo $u;
            $username = $u;
            $this->sql = "SELECT * FROM `teacher` WHERE `t_email` = '$username'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                echo "error";
            }
        }
        //login student data fetch method
        public function retrive_std($email){
            $email = $email;
            $this->sql = "SELECT * FROM `student` WHERE `s_email` = '$email'";
            $this->result = $this->con->query($this->sql);
            
            if($this->result == true){
                return $this->result;
            }else{
                echo "error";
            }
        }
        public function retrivebyid($id, $table=NULL){
            if($table == 'student'){
                $this->sql = "SELECT * FROM `student` WHERE `s_id` = '$id'";
            }else{
                $this->sql = "SELECT * FROM `teacher` WHERE `t_id` = '$id'";
            }
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                echo "error";
            }
        }
        //update pass
        public function update_pass($pass,$user_id, $table=NULL)
        {
            $pass = $pass;
            $user_id = $user_id;
            if($table == 'student'){
                $this->sql = "UPDATE `student` SET `s_password`= '$pass' WHERE s_id = '$user_id'";
            }else{
                $this->sql = "UPDATE `teacher` SET `password`= '$pass' WHERE t_id = '$user_id'";
            }
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //update profile
        public function update_profile($id,$name,$email,$designation=NULL,$phone=NULL){
            if($designation == NULL){
                $this->sql = "UPDATE `student` SET `s_name`='$name',`s_email`='$email',`phone`='$phone' WHERE `s_id` = '$id'";
            }else if($phone == NULL){
                $this->sql = "UPDATE `teacher` SET `t_name`='$name',`t_email`='$email',`t_designation`='$designation' WHERE `t_id` = '$id'";
            }
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //add teacher
        public function addTeacher($name,$email,$designation,$role,$password){
            $this->sql = "INSERT INTO `teacher`(`t_name`, `t_email`, `t_designation`, `password`, `role`) VALUES ('$name','$email','$designation','$password','$role')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //view all teacer 
        public function viewTeacher(){
            $this->sql = "SELECT * FROM `teacher`";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //delete teacher
        public function teacherDelete($id){
            $id =$id;
            $this->sql = "DELETE FROM `teacher` WHERE t_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        //make and undo admin
        public function makeAdmin($id,$role){
            $this->sql = "UPDATE `teacher` SET `role`='$role' WHERE t_id = $id";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        //add batch
        public function addBatch($batchId,$description){
            $this->sql = "INSERT INTO `batch`(`batch_id`, `description`) VALUES ('$batchId','$description')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //find batch
        public function findBatch($batchId){
            $this->sql = "SELECT * FROM `batch` WHERE batch_id = '$batchId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //view batch
        public function viewBatch(){
            $this->sql = "SELECT * FROM `batch`";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //batch update 
        public function updateBatch($id,$batch_id,$decription){
            $this->sql = "UPDATE `batch` SET `batch_id`='$batch_id',`description`='$decription' WHERE batch_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        //check batch id use or not
        public function checkInclude($batchId){
            $this->sql = "SELECT * FROM `student` WHERE batch_id = '$batchId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //delete batch
        public function batchDelete($id){
            $this->sql = "DELETE FROM `batch` WHERE batch_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        //check class id use or not
        public function checkClassInclude($classId){
            $this->sql = "SELECT * FROM `student_course` WHERE course_id = '$classId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //add class
        public function addClass($class_name,$description){
            $this->sql = "INSERT INTO `class`(`class_name`, `class_description`) VALUES ('$class_name','$description')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //update class
        public function updateClass($id,$class_name,$description){
            $this->sql = "UPDATE `class` SET `class_name`='$class_name',`class_description`='$description' WHERE class_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
        //find class
        public function findClass($classId){
            $this->sql = "SELECT * FROM `class` WHERE class_id = '$classId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //find class
        public function deleteClass($classId){
            $this->sql = "DELETE FROM `class` WHERE class_id = '$classId'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //view class
        public function viewClass(){
            $this->sql = "SELECT * FROM `class`";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }

        //find class by id
        public function findClassByStudentId($id){
            $this->sql = "SELECT sc.course_id, c.class_name 
            FROM student_course sc
            JOIN class c ON sc.course_id = c.class_id
            WHERE sc.student_id = '$id'";

            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }

        // getAssignCourses method
        public function getAssignCourses($student_id) {
            $assigned_courses = [];
    
            $this->sql = "SELECT c.class_name 
                      FROM student_course sc
                      JOIN class c ON sc.course_id = c.class_id
                      WHERE sc.student_id = '$student_id'";

            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                while($row = $this->result->fetch_assoc()) {
                    $assigned_courses[] = $row;
                }
            }
            return $assigned_courses;
        }

        //assignCourseWithSync method
        public function assignCourseWithSync($student_id, $course_ids) {
            $this->sql = "Select * from student_course where student_id = '$student_id'";
            $this->result = $this->con->query($this->sql);
            // if($this->result->num_rows > 0){
            //     $this->sql = "DELETE FROM student_course WHERE student_id = '$student_id'";
            //     $this->con->query($this->sql);
            // }

            if($this->result->num_rows > 0){
                $get_course_ids = [];
                while($row = $this->result->fetch_assoc()) {
                    $get_course_ids[] = $row['course_id'];
                }
                $course_ids = array_unique(array_merge($course_ids, $get_course_ids));
                
                $this->sql = "DELETE FROM student_course WHERE student_id = '$student_id'";
                $this->con->query($this->sql);

            }

            foreach($course_ids as $course_id){
                $this->sql = "INSERT INTO student_course(student_id, course_id) VALUES ('$student_id', '$course_id')";
                $this->con->query($this->sql);
            }

            return true;
        }


        //findStudent
        public function findStudent($batch_id){
            $this->sql = "SELECT * FROM `student` WHERE batch_id = '$batch_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }

        // findStudentByBatchAndCourse
        public function findStudentByCourse($course_id) {
            $this->sql = "SELECT s.* FROM student s
            JOIN student_course sc ON s.s_id = sc.student_id
            WHERE sc.course_id = '$course_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }

        }

        //viewAttendance
        public function viewAttendance($date,$class_id){
            $this->sql = "SELECT * FROM `present` WHERE p_date='$date' AND class_id = '$class_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }

        //addStudent($studentId,$name,$father,$mother,$batch_id,$class_id,$phone)
        public function addStudent($studentId,$name,$email,$father,$mother,$batch_id,$phone,$password){
            $this->sql = "INSERT INTO `student`(`s_id`, `s_name`, `s_email`, `s_father`, `s_mother`, `batch_id`, `phone`, `s_password`) VALUES ('$studentId','$name','$email','$father','$mother','$batch_id','$phone','$password')" ;

            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //view student
        public function viewStudent(){
            $this->sql = "SELECT s.s_id,s.s_name,s.s_email,s.s_father,s.s_mother,s.phone,b.batch_id FROM student as s INNER JOIN batch AS b ON s.batch_id = b.batch_id";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //findStudent by id
        public function findStudentById($id){
            $this->sql = "SELECT * FROM `student` WHERE `s_id` = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }



        //update student
        public function updateStudent($id,$name,$father,$mother,$batch_id,$phone){
            $this->sql = "UPDATE `student` SET `s_name`='$name',`s_father`='$father',`s_mother`='$mother',`batch_id`='$batch_id',`phone`='$phone' WHERE `s_id` = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //delete student
        public function deleteStudent($id){
            $this->sql = "DELETE FROM `student` WHERE `s_id` = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //check present 
        public function checkPresent($date,$class_id){
            $this->sql = "SELECT * FROM `present` WHERE p_date = '$date' AND class_id = '$class_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //take present
        public function takePresent($date,$present,$class_id){
            $this->sql = "INSERT INTO `present`(`present`, `class_id`, `p_date`) VALUES ('$present','$class_id','$date')";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //update present
        public function updatePresent($date,$present,$class_id){
            $this->sql = "UPDATE `present` SET `present`='$present' WHERE p_date = '$date' AND class_id = '$class_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return true;
            }else{
                return false;
            }
        }
        //presentView
        public function presentView($class_id){
            $this->sql = "SELECT * FROM `present` WHERE class_id = '$class_id'";
            $this->result = $this->con->query($this->sql);
            if($this->result == true){
                return $this->result;
            }else{
                return false;
            }
        }
        //presentDelete
        public function presentDelete($id){
            $id =$id;
            $this->sql = "DELETE FROM `present` WHERE p_id = '$id'";
            $this->result = $this->con->query($this->sql);
            if($this->result){
                return true;
            }else{
                return false;
            }
        }
    }

    // $obj = new Main();
    // $r = $obj->retrive("mubashera@gmail.com");
    // print_r($r);


?>