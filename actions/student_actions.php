<?php
    require_once dirname(__FILE__)."/../controllers/student_controller.php";
    session_start();
    
    if (isset($_POST["update_profile"])) {
        $id = $_POST["stud_id"];
        $fname = $_POST["new_fname"];
        $lname = $_POST["new_lname"];
        $email = $_POST["new_email"];
        $country = $_POST["new_country"];
        $year = $_POST["new_year"];
        $major = $_POST["major_id"];
        $contact = $_POST["new_contact"];

        $request = updateStudentInfo($id, $fname, $lname, $email, $country, $year, $major, $contact);

        if ($request) {
            $_SESSION["name"] = $fname . " " . $lname;
        }
        header("location: ../view/settings.php");
        return;
    }

    if (isset($_POST["update_image"])) {
        $id = $_POST["stud_id"];
        
        $root_dir = "..\\images\\student\\";
        $upload_root_dir = "../images/student/";
        $file = $_FILES["profile_img"];
        $file_dest = $root_dir . basename($file["name"]);
        $upload_file_dest = $upload_root_dir . basename($file["name"]);
        $file_type = strtolower(pathinfo($file_dest, PATHINFO_EXTENSION));
    
        $move = move_uploaded_file($file["tmp_name"], $file_dest);

        if ($move) {
            $request = updateStudentImage($id, $upload_file_dest);
        }

        header("location: ../view/settings.php");
        return;
    }
?>