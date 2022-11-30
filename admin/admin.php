<!-- Number of tutors, number of students, total bookings till date, Total amount made

     Add a major, view and edit a major; Add a course, view and edit a course
-->
<?php
    session_start();
   
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