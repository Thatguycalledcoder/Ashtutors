<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/cred.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async defer></script>
    <!-- <script src="../js/validate.js" async defer></script> -->
</head>

<body>
    <header class="mt-5 text-center">
        <h1 class="mb-5">
            Ash Tutors
        </h1>
        <h2 class="mb-4">
            Change Password
        </h2>
        <?php
        if (isset($_SESSION["log_msg_tutor"])) {
            echo $_SESSION["log_msg_tutor"];
        }
        ?>
    </header>
    <form class="mx-5 my-4" method="POST" id="form" action="./changeprocess.php">
        <div class="form-floating mb-5">
            <input type="password" class="form-control" id="floatingPassword" name="tutor_pass" placeholder="John Doe" required>
            <label for="floatingPassword">Password</label>
        </div>
        <div class="form-floating mb-5">
        <input type="password" class="form-control" id="floatingConfPassword" name="tutor_confpass" placeholder="John Doe" required>
            <label for="floatingConfPassword">Confirm Password</label>
        </div>
        <input type="hidden" name="tutor_id" value="<?php echo $_SESSION["id"] ?>">
        <button type="submit" id="subbtn" name="changepassword_tutor">Change Password</button><br><br>
    </form>
</body>
</html>