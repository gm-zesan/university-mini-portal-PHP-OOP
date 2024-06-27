<?php
    session_start();
    include "Flash_data.php";
    include 'Main.php';
    $obj = new Main();
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $status = $obj->presentDelete($id);
        if($status == true){
            Flass_data::addTeacher('Present Deleted SuccessFully!');
            header("location:all-present.php");
        }
    }
?>