<?php
include 'main.php'; // Include your database connection file
$obj = new Main();

if(isset($_GET['student_id'])) {
    $student_id = $_GET['student_id'];

    $assigned_courses = $obj->getAssignCourses($student_id);

    echo json_encode($assigned_courses);

}
?>
