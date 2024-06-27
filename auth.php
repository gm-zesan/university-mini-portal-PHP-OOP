<?php
    session_start();
    include 'main.php';
    include "Flash_data.php";

    $obj = new Main();
    if(isset($_POST['submit'])){
        if(isset($_POST['email']) && isset($_POST['password'])){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $data = $obj->retrive($email);
            if($data->num_rows > 0){
                while($row = $data->fetch_object()){
                    $uid = $row->t_id;
                    $name = $row->t_name;
                    $dbemail = $row->t_email;
                    $pass = $row->password;
                    $role = $row->role;
                }
                $e_pw = md5($password);
                if($e_pw === $pass){
                    $_SESSION['user_id'] = $uid;
                    $_SESSION['user_name'] = $name;
                    $_SESSION['user_email'] = $dbemail;
                    $_SESSION['role'] = $role;
                    header('location:index.php');
                }else{
                    Flass_data::auth('Your Email And Password is not Correct!');
                    header("location:login.php"); 
                }
            }else{
                $data = $obj->retrive_std($email);
                if($data->num_rows > 0){
                    while($row = $data->fetch_object()){
                        $uid = $row->s_id;
                        $name = $row->s_name;
                        $dbemail = $row->s_email;
                        $pass = $row->s_password;
                    }
                    $e_pw = md5($password);
                    if($e_pw === $pass){
                        $_SESSION['user_id'] = $uid;
                        $_SESSION['user_name'] = $name;
                        $_SESSION['user_email'] = $dbemail;
                        $_SESSION['role'] = 'student';
                        header('location:index.php');
                    }else{
                        Flass_data::auth('Your Password is not Correct!');
                        header("location:login.php"); 
                    }
                }else{
                    Flass_data::auth('Your Email is not Correct!');
                    header("location:login.php"); 
                }
            }
        }else{
            header('Location: login.php');
            exit();
        }
    }else{
        header('Location: login.php');
        exit();
    }




?>