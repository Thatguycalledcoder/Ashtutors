<?php
session_start();
unset($_SESSION["reg_msg_student"]);
unset($_SESSION["reg_msg_tutor"]);
unset($_SESSION["log_msg_student"]);
unset($_SESSION["log_msg_tutor"]);
require_once dirname (__FILE__)."/../controllers/student_controller.php";
require_once dirname (__FILE__)."/../controllers/tutor_controller.php";

if (isset($_POST["login_student"])) {
    $email = $_POST["stud_email"];
    $password = $_POST["stud_pass"];

    $num_errors = 0;
    $errors = array();

    if (empty($email)) {
        $num_errors++;
        array_push($errors, "Email field empty!");
    }

    if (empty($password)) {
        $num_errors++;
        array_push($errors, "Password field empty!");
    }
    else
        $password = base64_encode($password);

    $record = validateLoginStudent($email, $password);

    if ($num_errors == 0) {
        if ($record) {
            // Getting customer details
            $_SESSION["id"] = $record["student_id"];
            $_SESSION["name"] = $record["student_name"];
            $_SESSION["email"] = $record["student_email"];
            $_SESSION["contact"] = $record["student_contact"];
            $_SESSION["login_sts"] = true;

            if ($record["user_role"] == 1)
                $_SESSION["admin_auth"] = true;
            
            echo "success";
            header("location: ../index.php");
        } else {
            $_SESSION["log_msg_student"] = "Incorrect login credentials. Try again!";
            header("location: login.php");
        }
    }
    else {
        $_SESSION["log_msg_student"] = $errors[0];
        header("location: login.php");
    }
    return;
}
else {
    $_SESSION["log_msg_student"] = "Please use the form!";
    header("location: login.php");
    return;
}

// Tutor login
if (isset($_POST["login_tutor"])) {
    $email = $_POST["tutor_email"];
    $password = $_POST["tutor_pass"];

    $num_errors = 0;
    $errors = array();

    if (empty($email)) {
        $num_errors++;
        array_push($errors, "Email field empty!");
    }

    if (empty($password)) {
        $num_errors++;
        array_push($errors, "Password field empty!");
    }
    else
        $password = base64_encode($password);

    $record = validateLoginTutor($email, $password);

    if ($num_errors == 0) {
        if ($record) {
            // Getting customer details
            $_SESSION["id"] = $record["tutor_id"];
            $_SESSION["name"] = $record["tutor_name"];
            $_SESSION["email"] = $record["tutor_email"];
            $_SESSION["contact"] = $record["tutor_contact"];
            $_SESSION["login_sts"] = true;

            if ($record["user_role"] == 1)
                $_SESSION["admin_auth"] = true;
            
            echo json_encode(["success"]);
            header("location: ../index.php");
        } else {
            $_SESSION["log_msg_tutor"] = "Incorrect login credentials. Try again!";
            header("location: logintutor.php");
        }
    }
    else {
        $_SESSION["log_msg_tutor"] = $errors[0];
        header("location: logintutor.php");
    }
    return;
}
else {
    $_SESSION["log_msg_tutor"] = "Please use the form!";
    header("location: logintutor.php");
    return;
}

?>