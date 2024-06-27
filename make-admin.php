<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();

    if(isset($_GET['id']) && $_GET['role'] == 0){
        $id = $_GET['id'];
        $status = $obj->makeAdmin($id,1);
        if($status == true){
            Flass_data::addTeacher('Make Admin SuccessFully!');
            header("location:view-teacher.php");
        }
    }else{
        $id = $_GET['id'];
        $status = $obj->makeAdmin($id,0);
        if($status == true){
            Flass_data::addTeacher('Admin Removed SuccessFully!');
            header("location:view-teacher.php");
        }
    }
?>