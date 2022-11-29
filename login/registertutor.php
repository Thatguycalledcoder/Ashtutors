<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Tutor</title>
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
           <span> <a href="register.php">Student</a></span> / <span class="active">Tutor</span> 
        </h5>
        <?php
        if (isset($_SESSION["reg_msg_tutor"])) {
            echo $_SESSION["reg_msg_tutor"];
        }
        ?>
    </header>
    <main>
        <form class="mx-5 my-4" method="POST" id="form" name="fname" action="./registerprocess.php">
        <div class="form-floating mb-5">
                <input type="name" class="form-control" id="floatingInputFirst" name="tutor_fname" placeholder="John" required>
                <label for="floatingInputFirst">First name</label>
            </div>
            <div class="form-floating mb-5">
                <input type="name" class="form-control" id="floatingInputLast" name="tutor_lname" placeholder="Doe" required>
                <label for="floatingInputLast">Last name</label>
            </div>
            <div class="form-floating mb-5">
                <input type="email" class="form-control" id="floatingEmail" name="tutor_email" placeholder="name@example.com" required>
                <label for="floatingEmail">Email address</label>
            </div>
            <div class="form-floating mb-5">
                <select class="form-control" id="floatingMajor" name="tutor_major" required>
                    <label for="floatingMajor">Major</label>
                    <option value="null">Select your major...</option>
                    <option value="Business Administration">Business Administration</option>
                    <option value="1">Computer Science</option>
                    <option value="Computer Engineering">Computer Engineering</option>
                    <option value="Electrical and Electronics Engineering">Electrical and Electronics Engineering</option>
                    <option value="Management Information Systems">Management Information Systems</option>
                    <option value="Mechanical Engineering">Mechanical Engineering</option>
                </select>
            </div>
            <div class="form-floating mb-5">
                <select class="form-control" id="floatingYear" name="tutor_year" required>
                    <label for="floatingYear">Year</label>
                    <option value="null">Select your year group...</option>
                    <option value="2023">2023</option>
                    <option value="2024">2024</option>
                    <option value="2025">2025</option>
                    <option value="2026">2026</option>
                </select>
            </div>
            <div class="form-floating mb-5">
                <input type="text" class="form-control" id="floatingCountry" name="tutor_country" placeholder="name@example.com" required>
                <label for="floatingCountry">Country</label>
            </div>
            <div class="form-floating mb-5">
                <input type="tel" class="form-control" id="floatingNumber" name="tutor_num" placeholder="0507921531" required>
                <label for="floatingNumber">Contact number</label>
            </div>
            <!-- <div class="form-floating mb-5">
                <input type="file" class="form-control" id="floatingImage" name="tutor_image" accept="image/png, image/jpeg, image/jpg,
                image/hevc, image/heif, image/webp" required>
                <label for="floatingNumber">Upload your profile image</label>
            </div> -->
            <div class="form-floating mb-5">
                <input type="password" class="form-control" id="floatingPassword" name="tutor_pass" placeholder="Password" required>
                <label for="floatingPassword">Password</label>
            </div>
            <div class="form-floating mb-5">
                <input type="password" class="form-control" id="floatingConfirm" name="tutor_confpass" placeholder="Confirm password" required>
                <label for="floatingConfirm">Confirm password</label>
            </div>

            <button type="submit" id="subbtn" name="register_tutor" onclick="validateRegisterTutor(e)">Register</button>
        </form>
        <strong><p>Already registered? <a href="./login.php">Login here</a></p></strong>
    </main>
</body>

</html>