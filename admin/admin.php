<?php
    session_start();

    if (!isset($_SESSION["admin_sts"])) {
        header("location: ../login/login.php");
    }

    if (isset($_GET["logout_admin"])) {
        session_unset();
        session_destroy();
        header("Location: dirname(__FILE__)./../../login/login.php");
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin: Dashboard</title>
</head>
<body>
    <header>
        <a href="admin.php?logout_admin=1">Logout of admin</a>
        <h1>
            Admin Dashboard
        </h1>
    </header>
    <nav>
        <ul>
            <li>
                <a href="admin_major.php">Majors</a>
            </li>
            <li>
                <a href="admin_course.php">Courses</a>
            </li>
        </ul>
    </nav>
</body>
</html>