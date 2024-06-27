<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $status = $obj->teacherDelete($id);
        if($status == true){
            Flass_data::addTeacher('Teacher Remove SuccessFully!');
            header("location:view-teacher.php");
        }
    }
?>