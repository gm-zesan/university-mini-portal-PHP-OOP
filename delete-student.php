<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $status = $obj->deleteStudent($id);
        if($status == true){
            Flass_data::addTeacher('Student Deleted SuccessFully!');
            header("location:view-student.php");
        }
    }
?>