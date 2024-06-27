<?php
    session_start();
    include "Flash_data.php";
    include "main.php";
    $obj = new Main();

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $designation = $_POST['designation'];
        $role = $_POST['role'];
        $password = $_POST['password'];
        $status = $obj->addTeacher($name,$email,$designation,$role,md5($password));
        if($status == true){
            Flass_data::addTeacher('Teacher Add SuccessFully!');
            header("location:view-teacher.php"); 
        }else{
            Flass_data::teacherError('Email Already Exist!');
            header("location:view-teacher.php"); 
        }
    }


?>