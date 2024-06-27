<?php
include 'main.php'; // Include your main class file
$obj = new Main();

if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $course_ids = $_POST['course_id']; 

    $obj->assignCourseWithSync($student_id, $course_ids);
    
    header("Location: view-student.php");
    exit();
}

?>
