<?php
session_start();
unset($_SESSION["reg_msg_student"]);
unset($_SESSION["reg_msg_tutor"]);
unset($_SESSION["log_msg_student"]);
unset($_SESSION["log_msg_tutor"]);
require_once dirname (__FILE__)."/../controllers/student_controller.php";
require_once dirname (__FILE__)."/../controllers/tutor_controller.php";

if (isset($_POST["forgot_student"])) {
    $email = $_POST["stud_email"];
    $year = $_POST["stud_year"];
    $num = $_POST["stud_num"];

    $num_errors = 0;
    $errors = array();

    if (empty($email)) {
        $num_errors++;
        array_push($errors, "Email field empty!");
    }

    if (empty($year)) {
        $num_errors++;
        array_push($errors, "Year field empty!");
    }

    if (empty($num)) {
        $num_errors++;
        array_push($errors, "Contact field empty!");
    }

    $record = validateForgotStudent($email, $year, $num);

    if ($num_errors == 0) {
        if ($record) {
            // Getting customer details
            $_SESSION["id"] = $record["student_id"];
            
            echo "success";
            header("location: ./changepassword.php");
        } else {
            $_SESSION["log_msg_student"] = "Incorrect validation credentials. Try again!";
            header("location: forgot.php");
        }
    }
    else {
        $_SESSION["log_msg_student"] = $errors[0];
        header("location: forgot.php");
    }
    return;
}
// Tutor login
elseif (isset($_POST["forgot_tutor"])) {
    $email = $_POST["tutor_email"];
    $year = $_POST["tutor_year"];
    $num = $_POST["tutor_num"];

    $num_errors = 0;
    $errors = array();

    if (empty($email)) {
        $num_errors++;
        array_push($errors, "Email field empty!");
    }

    if (empty($year)) {
        $num_errors++;
        array_push($errors, "Year field empty!");
    }

    if (empty($num)) {
        $num_errors++;
        array_push($errors, "Contact field empty!");
    }

    $record = validateForgotTutor($email, $year, $num);

    if ($num_errors == 0) {
        if ($record) {
            // Getting customer details
            $_SESSION["id"] = $record["tutor_id"];
            
            echo "success";
            header("location: ./changepasswordtutor.php");
        } else {
            $_SESSION["log_msg_tutor"] = "Incorrect validation credentials. Try again!";
            header("location: forgottutor.php");
        }
    }
    else {
        $_SESSION["log_msg_tutor"] = $errors[0];
        header("location: forgottutor.php");
    }
    return;
}
else {
    $_SESSION["log_msg_tutor"] = "Please use the form!";
    $_SESSION["log_msg_student"] = "Please use the form!";
    header("location: forgot.php");
    return;
}

?>