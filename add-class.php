<?php
    session_start();
    include "Flash_data.php";
    include "main.php";
    $obj = new Main();

    if(isset($_POST['submit'])){
        $class_name = $_POST['class_name'];
        $description = $_POST['class_description'];
        $status = $obj->addClass($class_name,$description);
        if($status == true){
            Flass_data::addTeacher('Batch Add SuccessFully!');
            header("location:view-class.php"); 
        }else{
            Flass_data::teacherError('Class Already Exist!');
            header("location:view-class.php"); 
        }
    }
?>