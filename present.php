<?php
    session_start();
    include "Flash_data.php";
    include "main.php";
    $obj = new Main();
    //take present
    if(isset($_POST['date']) && ($_POST['date'] != "")){
        $date = $_POST["date"];
        $total = $_POST["total"];
        $class_id = $_POST["class_id"];
        $present = [];
        for ($i=1; $i < $total; $i++) { 
            if($_POST[$i] != "absent"){
                array_push($present,$_POST[$i]);
            }
        }

        $check = $obj->checkPresent($date,$class_id); 

        print_r($check);

        if($check->num_rows > 0){
            $update = $obj->updatePresent($date,implode(",", $present),$class_id);
            if($update == true){
                Flass_data::addTeacher('Attendance Update Successfully!');
                header("location:take-attandence.php"); 
            }else{
                Flass_data::teacherError('Something Went Worng!');
                header("location:take-attandence.php"); 
            }
        }else{
            $status = $obj->takePresent($date,implode(",", $present),$class_id);
            if($status == true){
                Flass_data::addTeacher('Attendance Take Successfully!');
                header("location:take-attandence.php"); 
            }else{
                Flass_data::teacherError('Something Went Worng!');
                header("location:take-attandence.php"); 
            }
        }

        
    }else{
        echo "hello";
    }


?>