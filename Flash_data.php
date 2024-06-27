<?php
    class Flass_data
    {
        public static function show_error(){
            if(!isset($_SESSION['msg'])){
                return null;
            }
            $msg = $_SESSION['msg'];
            unset($_SESSION['msg']);
            return implode("<br>", $msg);
        }
        public static function auth($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array();
            }
            $_SESSION['msg']['auth'] = $msg;
        }
        public static function update_head($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['change_success'] = $msg;
        }
        public static function update_pass_error($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['pass_error'] = $msg;
        }
        public static function addTeacher($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['addTeacher'] = $msg;
        }
        public static function teacherError($msg){
            if(!isset($_SESSION['msg'])){
                $_SESSION['msg'] = array(); 
            }
            $_SESSION['msg']['teacher_error'] = $msg;
        }
    }



?>