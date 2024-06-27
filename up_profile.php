<?php
    session_start();
    include "Flash_data.php";
    $id = $_SESSION['user_id'];
    include "main.php";
    $obj = new Main();
    
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];

        if($_SESSION['role'] == 'student'){
            $phone = $_POST['phone'];
            $designation = NULL;
            $status = $obj->update_profile($id,$name,$email,$designation,$phone);
        }else{
            $designation = $_POST['designation'];
            $phone = NULL;
            $status = $obj->update_profile($id,$name,$email,$designation,$phone);
        }


        if($status == true){
            $_SESSION['user_name'] = $name;
            Flass_data::update_head('Profile Update Successfully!');
            header("location:profile.php");
        }else{
            echo 'false';
        }
    }else{
        header('location:index.php');
    }

?>