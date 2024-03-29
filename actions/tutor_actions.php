<?php
    session_start();
    unset($_SESSION["action_msg_book"]);
    unset($_SESSION["action_msg_course"]);
    require_once dirname(__FILE__)."/../controllers/tutor_controller.php";

    if (isset($_GET["add_date"])) {
        $id = $_GET["tutor_id"];
        $book_day = $_GET["book_day"];
        $start_time = $_GET["to_time"];
        $end_time = $_GET["fro_time"];

        $request = updateTutorBookDay($id, $book_day, $book_day, $start_time, $end_time);
        if ($request == false) {
            registerTutorAvailableBookings($id, $book_day, $start_time, $end_time);
        }
        else {
            $_SESSION["action_msg_book"] = "Book day already set. Updating previous book day.";
        }
     
        header("location: ../view/tutor/booksettings.php");
    }
    elseif (isset($_GET["add_course"])) {
        $id = $_GET["tutor_id"];
        $course = $_GET["course"];
        $rate = $_GET["rate"];

        $request = updateTutorCourse($id, $course, $course, $rate);
        if ($request == false) {
            registerTutorCourse($id, $course, $rate);
        }
        else {
            $_SESSION["action_msg_course"] = "Course and rate already set. Updating previous course and rate.";
        }

        header("location: ../view/tutor/booksettings.php");
    }
    elseif (isset($_POST["update_profile"])) {
        $id = $_POST["tutor_id"];
        $fname = $_POST["new_fname"];
        $lname = $_POST["new_lname"];
        $email = $_POST["new_email"];
        $country = $_POST["new_country"];
        $year = $_POST["new_year"];
        $major = $_POST["major_id"];
        $contact = $_POST["new_contact"];

        $request = updateTutorInfo($id, $fname, $lname, $email, $country, $year, $major, $contact);
        if ($request)
            $_SESSION["name"] = $fname . " " . $lname;
        

        header("location: ../view/tutor/tutorprofile.php");

    }
    elseif (isset($_POST["update_image"])) {
        $id = $_POST["tutor_id"];
        
        $root_dir = "..\\images\\tutor\\";
        $upload_root_dir = "../images/tutor/";
        $file = $_FILES["profile_img"];
        $file_dest = $root_dir . basename($file["name"]);
        $upload_file_dest = $upload_root_dir . basename($file["name"]);
        $file_type = strtolower(pathinfo($file_dest, PATHINFO_EXTENSION));
    
        $move = move_uploaded_file($file["tmp_name"], $file_dest);

        if ($move) {
            $request = updateTutorImage($id, $upload_file_dest);
        }

        header("location: ../view/tutor/tutorprofile.php");
    }
    elseif (isset($_GET["update_day"])) {
        $id = $_GET["tutor_id"];
        $day = $_GET["new_day"];
        $oldday = $_GET["old_day"];
        $new_to_time = $_GET["new_to_time"];
        $new_fro_time = $_GET["new_fro_time"];

        updateTutorBookDay($id, $day, $oldday, $new_to_time, $new_fro_time);

        header("location: ../view/tutor/booksettings.php");

    }
    elseif (isset($_GET["delete_day"])) {
        $id = $_GET["t_id"];
        $day = $_GET["day_id"];

        removeTutorBookDay($id, $day);

        header("location: ../view/tutor/booksettings.php");
    }
    elseif (isset($_GET["update_course"])) {
        $course = $_GET["course_id"];
        $id = $_GET["tutor_id"];
        $new_course = $_GET["new_course"];
        $new_rate = $_GET["new_rate"];

        updateTutorCourse($id, $course, $new_course, $new_rate);

        header("location: ../view/tutor/booksettings.php");

    }
    elseif (isset($_GET["delete_course"])) {
        $id = $_GET["t_id"];
        $course = $_GET["c_id"];

        removeTutorCourse($id, $course);

        header("location: ../view/tutor/booksettings.php");
    }
    elseif (isset($_GET["update_availability"])) {
        $id = $_GET["tutor_id"];
        $avail = $_GET["availability"];

        updateAvailability($id, $avail);
        header("location: ../view/tutor/booksettings.php");
    }
    else {
        header("location: ../login/logintutor.php");
    }
?>