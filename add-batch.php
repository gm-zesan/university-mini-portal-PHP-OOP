<?php
    session_start();
    include "Flash_data.php";
    include "main.php";
    $obj = new Main();

    if(isset($_POST['submit'])){
        $batchId = $_POST['batchId'];
        $description = $_POST['description'];
        $find = $obj->findBatch($batchId);
        if($find->num_rows > 0){
            Flass_data::teacherError('Batch Already Exist!');
            header("location:view-batch.php"); 
        }else{
            $status = $obj->addBatch($batchId,$description);
            if($status == true){
                Flass_data::addTeacher('Batch Add SuccessFully!');
                header("location:view-batch.php"); 
            }else{
                Flass_data::teacherError('Something Went Worng!');
                header("location:view-batch.php"); 
            }
        }
        
    }


?>