<?php
    session_start();
    require dirname(__FILE__)."/../functions/checks.php";
    require dirname(__FILE__)."/../functions/student_view_fxn.php";
    checkLoginStudent();

    if (!(isset($_GET["cid"]))) {
        header("location: courses.php");
    }

    $cid = $_GET["cid"];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutors</title>
    <link rel="stylesheet" href="./../css/main.css">
</head>
<body>
    <nav>
        <ul class="navi">
            <li class="nav-links">
                <a href="./../index.php">
                    <img class="navcons" src="./../images/icons/home-icon.svg" alt="Home icon" title="Home">
                </a>
            </li>
            <li class="nav-links">
                <a href="./courses.php">
                    <img class="navcons" src="./../images/icons/course-icon.svg" alt="Course icon" title="Courses">
                </a>
            </li>
            <li class="nav-links">
                <a href="./tutors.php">
                    <img class="navcons" src="./../images/icons/tutor-icon.svg" alt="Tutor icon" title="Tutors">
                </a>
            </li>
            <li class="nav-links">
                <a href="./bookings.php">
                    <img class="navcons" src="./../images/icons/booking-icon.svg" alt="Booking icon" title="Bookings">
                </a>
            </li>
            <li class="nav-links">
                <a href="./settings.php">
                    <img class="navcons" src="./../images/icons/settings-icon.svg" alt="Settings icon" title="Account Settings">
                </a>
            </li>
            <li class="nav-links">
                <a href="./../index.php?logout=1">
                    <img class="navcons" src="./../images/icons/logout-icon.svg" alt="Logout icon" title="Logout">
                </a>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            <figure class="head-fig">
            </figure>
            <section class="main-sec">
                <h1>
                    Course Searched: <?php echo displayCourseSearched($cid) ?>
                </h1>
            </section>
        </header>
        <section class="main-sec">
            <ul class="main-list">
               <?php
                    studentDisplayTutorsByCourse($cid);
               ?>
            </ul>
        </section>
        <footer>

        </footer>
    </main>
</body>
</html>