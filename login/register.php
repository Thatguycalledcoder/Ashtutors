<?php
session_start();
require_once dirname(__FILE__)."/../functions/major_course_fnx.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cred.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async defer></script>
    <script src="../js/validate.js" async defer></script>
</head>

<body>
    <header class="mt-5 text-center">
        <h1 class="mb-5">
            Ash Tutors
        </h1>
        <h2 class="mb-4">
            Register
        </h2>
        <h5>
           <span class="active">Student</span> / <span><a href="registertutor.php">Tutor</a></span> 
        </h5>
        <strong>
        <?php
        if (isset($_SESSION["reg_msg_student"])) {
            echo $_SESSION["reg_msg_student"];
        }
        ?>
        </strong>
    </header>
    <main>
        <form class="mx-5 my-4" method="POST" id="form" action="./registerprocess.php">
            <div class="form-floating mb-5">
                <input type="name" class="form-control" id="floatingInputname" name="stud_fname" placeholder="John" required>
                <label for="floatingInputname">First name</label>
            </div>
            <div class="form-floating mb-5">
                <input type="name" class="form-control" id="floatingInputLname" name="stud_lname" placeholder="Doe" required>
                <label for="floatingInputLname">Last name</label>
            </div>
            <div class="form-floating mb-5">
                <input type="email" class="form-control" id="floatingEmail" name="stud_email" placeholder="name@example.com" required>
                <label for="floatingEmail">Email address</label>
            </div>
            <div class="form-floating mb-5">
                <select class="form-control" id="floatingMajor" name="stud_major" required>
                    <label for="floatingMajor">Major</label>
                    <?php
                        displayMajorOptions();
                    ?>
                </select>
            </div>
            <div class="form-floating mb-5">
                <select class="form-control" id="floatingYear" name="stud_year" required>
                    <label for="floatingYear">Year</label>
                    <option value="null">Select your year group...</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>
            </div>
            <div class="form-floating mb-5">
                <input type="text" class="form-control" id="floatingCountry" name="stud_country" placeholder="name@example.com" required>
                <label for="floatingCountry">Country</label>
            </div>
            <div class="form-floating mb-5">
                <input type="tel" class="form-control" id="floatingNumber" name="stud_num" placeholder="0507921531" required>
                <label for="floatingNumber">Contact number</label>
            </div>
            <div class="form-floating mb-5">
                <input type="password" class="form-control" id="floatingPassword" name="stud_pass" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-5">
                <input type="password" class="form-control" id="floatingConfirm" name="stud_confpass" placeholder="Confirm password" required>
                <label for="floatingConfirm">Confirm password</label>
            </div>

            <button type="submit" id="subbtn" name="register_student" onclick="validateRegisterStudent(e)">Register</button>
        </form>
        <strong><p>Already registered? <a href="./login.php">Login here</a></p></strong>
    </main>
</body>

</html>