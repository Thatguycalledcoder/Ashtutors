<?php
    require_once dirname(__FILE__)."/../controllers/course_controller.php";

    if (isset($_GET["add"])) {
        $name = $_GET["new_major"];
        
        if (!empty($name)) {
            addMajor($name);
        }
    
        header("location: ../admin/admin_major.php");
        return;
    }

    if (isset($_GET["update"])) {
        $id = $_GET["major_id"];
        $name = $_GET["new_major"];
    
        updateMajor($id, $name);
    
        header("location: ../admin/admin_major.php");
        return;
    }

    if (isset($_GET["delete"])) {
        $id = $_GET["major_id"];

        removeMajor($id);

        header("location: ../admin/admin_major.php");
        return;
    }

    header("location: ../admin/admin_major.php");
?>