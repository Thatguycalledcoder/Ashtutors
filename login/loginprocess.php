<?php
session_start();
unset($_SESSION["reg_msg_student"]);
unset($_SESSION["reg_msg_tutor"]);
unset($_SESSION["log_msg_student"]);
unset($_SESSION["log_msg_tutor"]);
require_once dirname (__FILE__)."/../controllers/student_controller.php";
require_once dirname (__FILE__)."/../controllers/tutor_controller.php";

function checkAdmin($email, $password) {
    if ($email == "ashadmin@gmail.com" && $password == base64_encode("Administrator")) {
        return true;
    }
    else {
        return false;
    }
}

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

    $admin_chk = checkAdmin($email, $password);

    if ($admin_chk == false) {
        $record = validateLoginStudent($email, $password);
    
        if ($num_errors == 0) {
            if ($record) {
                // Getting customer details
                $_SESSION["id"] = $record["student_id"];
                $_SESSION["name"] = $record["student_fname"] . " " . $record["student_lname"];
                $_SESSION["login_sts_student"] = true;
                
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
        $_SESSION["admin_sts"] = 1;
        header("location: ../admin/admin.php");
    }

}
// Tutor login
elseif (isset($_POST["login_tutor"])) {
    $email = $_POST["tutor_email"];
    $password = $_POST["tutor_password"];

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
            $_SESSION["name"] = $record["tutor_fname"] . " " . $record["tutor_lname"];
            $_SESSION["login_sts_tutor"] = true;
            
            echo "success";
            header("location: ../view/tutor/index.php");
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
    $_SESSION["log_msg_student"] = "Please use the form!";
    header("location: login.php");
    return;
}

?>