<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $status = $obj->deleteClass($id);
        if($status == true){
            Flass_data::addTeacher('Class Deleted SuccessFully!');
            header("location:view-class.php");
        }
    }
?>