<?php
session_start();
unset($_SESSION["reg_msg_student"]);
unset($_SESSION["reg_msg_tutor"]);
unset($_SESSION["log_msg_student"]);
unset($_SESSION["log_msg_tutor"]);
require_once dirname (__FILE__)."/../controllers/student_controller.php";
require_once dirname (__FILE__)."/../controllers/tutor_controller.php";

if (isset($_POST["changepassword_student"])) {
    $id = $_POST["stud_id"];
    $pass = $_POST["stud_pass"];
    $confpass = $_POST["stud_confpass"];

    $num_errors = 0;
    $errors = array();

    if (empty($pass)) {
        $num_errors++;
        array_push($errors, "Password field empty!");
    }

    if (empty($confpass)) {
        $num_errors++;
        array_push($errors, "Confirm field empty!");
    }

    if ($pass == $confpass) {
        $pass = base64_encode($pass);

        if ($num_errors == 0) {
                updateStudentPassword($id, $pass);
                $_SESSION["log_msg_student"] = "Password changed successfully";
                echo "success";
                header("location: ./login.php");
            } 
        
        else {
            $_SESSION["log_msg_student"] = $errors[0];
            header("location: changepassword.php");
        }
    }
    else {
        $_SESSION["log_msg_student"] = "Password and confirmation password mismatch!";
        header("location: changepassword.php");
    }
}

// Tutor login
elseif (isset($_POST["changepassword_tutor"])) {
    $id = $_POST["tutor_id"];
    $pass = $_POST["tutor_pass"];
    $confpass = $_POST["tutor_confpass"];

    $num_errors = 0;
    $errors = array();

    if (empty($pass)) {
        $num_errors++;
        array_push($errors, "Password field empty!");
    }

    if (empty($confpass)) {
        $num_errors++;
        array_push($errors, "Confirm field empty!");
    }

    if ($pass == $confpass) {
        $pass = base64_encode($pass);

        if ($num_errors == 0) {
                updateTutorPassword($id, $pass);
                $_SESSION["log_msg_tutor"] = "Password changed successfully";
                echo "success";
                header("location: ./logintutor.php");
            } 
        
        else {
            $_SESSION["log_msg_tutor"] = $errors[0];
            header("location: changepasswordtutor.php");
        }
    }
    else {
        $_SESSION["log_msg_tutor"] = "Password and confirmation password mismatch!";
        header("location: changepasswordtutor.php");
    }
}
else {
    header("location: login.php");   
}

?>