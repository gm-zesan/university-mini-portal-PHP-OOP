<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $status = $obj->batchDelete($id);
        if($status == true){
            Flass_data::addTeacher('Batch Deleted SuccessFully!');
            header("location:view-batch.php");
        }
    }
?>