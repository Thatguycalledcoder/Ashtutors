<?php
session_start();
require dirname(__FILE__) . "/../functions/checks.php";
// checkLogin();
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
                <img class="head-img" src="" alt="Header image">
            </figure>
            <section class="main-sec divider">
                <span></span>
                <h1 class="spacer" style="margin-left: 16px">
                    Dave King
                </h1>
                <button class="update-btn">
                    <a href="history.php">History</a>    
                </button>
            </section>
        </header>
        <section class="main-sec">
            <figure>
                <div id="img-frame"> 
                    <img id="single-img" src="../images/icons/user-default.png" alt="Tutor image">
                </div>
                <figcaption class="tutor-one">
                    <ul class="account-details">
                        <li>
                            Courses:
                            <span>Data Structures and Algorithms, Venture Capital</span>
                        </li>
                        <li>
                            Available hours:
                            <span>5:00pm - 8:00pm</span>
                        </li>
                        <li>
                            Rate:
                            <span>GHS30.00 per hour</span>
                        </li>
                    </ul>
                </figcaption>
            </figure>
            <form class="book-form" action="book-tutor.php" method="GET">
                <input type="hidden" name="tutor_id" value="">
                <button type="submit" class="update-btn">Update Profile</button>
            </form>
        </section>
        <footer>

        </footer>
    </main>
</body>

</html>