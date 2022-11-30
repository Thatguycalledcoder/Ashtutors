<?php
    require_once dirname(__FILE__)."/../controllers/course_controller.php";

    if (isset($_GET["add"])) {
        $name = $_GET["new_course"];
        $major = $_GET["major_id"];

        if (!empty($name) && $major != "0" && (checkCourse($name) == "false" || empty(checkCourse($name)))) {
            addCourse($name, $major);
        }
    
    
        header("location: ../admin/admin_course.php");
        return;
    }
    
    if (isset($_GET["update"])) {
        $id = $_GET["course_id"];
        $name = $_GET["new_course"];
        $major = $_GET["major_id"];
    
        updateCourse($id, $name, $major);
    
        header("location: ../admin/admin_course.php");
        return;
    }

    if (isset($_GET["delete"])) {
        $id = $_GET["course_id"];
    
        removeCourse($id);
    
        header("location: ../admin/admin_course.php");
        return;
    }

    header("location: ../admin/admin_course.php");
?>