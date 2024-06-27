<?php
    session_start();
    include "Flash_data.php";
    include "main.php";
    $obj = new Main();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $father = $_POST['father'];
        $mother = $_POST['mother'];
        $batch_id = $_POST['batch_id'];
        $class_id = 015;
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $find = $obj->findStudent($batch_id);
        if($find->num_rows > 0){
            while($row = $find->fetch_object()){
                $studentId = $row->s_id;
            }
            $id = $studentId+1;
            
            $status = $obj->addStudent($id,$name,$email,$father,$mother,$batch_id,$phone,md5($password));
            $status = $obj->addBatch($batchId,$description);
            if($status == true){
                Flass_data::addTeacher('Student Reg SuccessFully!');
                header("location:view-student.php"); 
            }else{
                Flass_data::teacherError('Something Went Worng!');
                header("location:view-student.php"); 
            }
        }else{
            $class = sprintf("%03d", $class_id);
            $studentId = $batch_id . $class . "01";
            // echo $studentId;
            $status = $obj->addStudent($studentId,$name,$email,$father,$mother,$batch_id,$phone,md5($password));
            if($status == true){
                Flass_data::addTeacher('Student Reg SuccessFully!');
                header("location:view-student.php"); 
            }else{
                Flass_data::teacherError('Something Went Worng!');
                header("location:view-student.php"); 
            }
        }
        
    }


?>