<?php
session_start();
unset($_SESSION["reg_msg_student"]);
unset($_SESSION["reg_msg_tutor"]);
unset($_SESSION["log_msg_student"]);
unset($_SESSION["log_msg_tutor"]);

require_once dirname (__FILE__)."/../controllers/student_controller.php";
require_once dirname (__FILE__)."/../controllers/tutor_controller.php";

if (isset($_POST["register_student"])) {
    $fname = $_POST["stud_fname"];
    $lname = $_POST["stud_lname"];
    $email = $_POST["stud_email"];
    $country = $_POST["stud_country"];
    $major = $_POST["stud_major"];
    $year = $_POST["stud_year"];
    $contact = $_POST["stud_num"];
    $password = $_POST["stud_pass"];
    $conf_password = $_POST["stud_confpass"];

    $num_errors = 0;
    $errors = array();

    if (empty($fname)) {
        $num_errors++;
        array_push($errors, "Name field empty!");
    }
    if (empty($lname)) {
        $num_errors++;
        array_push($errors, "Name field empty!");
    }

    if (empty($email)) {
        $num_errors++;
        array_push($errors, "Email field empty!");
    }

    if (empty($country)) {
        $num_errors++;
        array_push($errors, "Country field empty!");
    }

    if (empty($major)) {
        $num_errors++;
        array_push($errors, "Major field empty!");
    }

    if (empty($year)) {
        $num_errors++;
        array_push($errors, "Major field empty!");
    }

    if (empty($contact)) {
        $num_errors++;
        array_push($errors, "Contact field empty!");
    }

    if (empty($password)) {
        $num_errors++;
        array_push($errors, "Password field empty!");
    }

    if (empty($conf_password)) {
        $num_errors++;
        array_push($errors, "Confirm Password field empty!");
    }

    if (checkEmailStudent($email)) {
        $num_errors++;
        array_push($errors, "Email already exists!");
    }

    if(strcmp($password, $conf_password) == 0){
        $password = base64_encode($password);
    }
    else {
        $num_errors++;
        array_push($errors, "Passwords do not match!");
    }

    if ($num_errors == 0) {
        $request = registerStudent($fname, $lname, $email, $password, $country, $year, $major, $contact, 2);
        if ($request) {
            $_SESSION["log_msg_student"] = "Registration successful!";
            echo json_encode(["success"]);
            header("location: login.php");
        } else {
            $_SESSION["reg_msg_student"] = "Registration unsuccessful!";
            echo "failure";
            header("location: register.php");
        }
    }
    else {
        $_SESSION["reg_msg_student"] = $errors[0];
        header("location: register.php");
    }
    return;
}
else {
    $_SESSION["reg_msg_student"] = "Please use the form!";
    header("location: register.php");
    return;
}

// Tutor register
if (isset($_POST["register_tutor"])) {
    $fname = $_POST["tutor_fname"];
    $lname = $_POST["tutor_lname"];
    $email = $_POST["tutor_email"];
    $country = $_POST["tutor_country"];
    $major = $_POST["tutor_major"];
    $contact = $_POST["tutor_num"];
    $year = $_POST["tutor_year"];
    $password = $_POST["tutor_pass"];
    $conf_password = $_POST["tutor_confpass"];

    $num_errors = 0;
    $errors = array();

    if (empty($fname)) {
        $num_errors++;
        array_push($errors, "Name field empty!");
    }
    if (empty($lname)) {
        $num_errors++;
        array_push($errors, "Name field empty!");
    }

    if (empty($email)) {
        $num_errors++;
        array_push($errors, "Email field empty!");
    }

    if (empty($country)) {
        $num_errors++;
        array_push($errors, "Country field empty!");
    }

    if (empty($major)) {
        $num_errors++;
        array_push($errors, "Major field empty!");
    }

    if (empty($contact)) {
        $num_errors++;
        array_push($errors, "Contact field empty!");
    }

    if (empty($year)) {
        $num_errors++;
        array_push($errors, "year field empty!");
    }

    if (empty($password)) {
        $num_errors++;
        array_push($errors, "Password field empty!");
    }

    if (empty($conf_password)) {
        $num_errors++;
        array_push($errors, "Confirm Password field empty!");
    }

    if (checkEmailTutor($email)) {
        $num_errors++;
        array_push($errors, "Email already exists!");
    }

    if(strcmp($password, $conf_password) == 0){
        $password = base64_encode($password);
    }
    else {
        $num_errors++;
        array_push($errors, "Passwords do not match!");
    }

    if ($num_errors == 0) {
        $request = registerTutor($fname, $lname, $email, $password, $country, $year, $major, $contact, 2);
        if ($request) {
            $_SESSION["log_msg_tutor"] = "Registration successful!";
            echo json_encode(["success"]);
            header("location: logintutor.php");
        } else {
            $_SESSION["reg_msg_tutor"] = "Registration unsuccessful!";
            echo "failure";
            header("location: registertutor.php");
        }
    }
    else {
        $_SESSION["reg_msg_tutor"] = $errors[0];
        header("location: registertutor.php");
    }
}
else {
    $_SESSION["reg_msg_tutor"] = "Please use the form!";
    header("location: registertutor.php");
}
?>