<?php
    session_start();
    require dirname(__FILE__)."/functions/checks.php";
    checkLogin();
    checkLogout();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <nav>
        <ul class="navi">
            <li class="nav-links">
                <a href="#">
                    <img class="navcons" src="./images/icons/home-icon.svg" alt="Home icon" title="Home">
                </a>
            </li>
            <li class="nav-links">
                <a href="./view/courses.php">
                    <img class="navcons" src="./images/icons/course-icon.svg" alt="Course icon" title="Courses">
                </a>
            </li>
            <li class="nav-links">
                <a href="./view/tutors.php">
                    <img class="navcons" src="./images/icons/tutor-icon.svg" alt="Tutor icon" title="Tutors">
                </a>
            </li>
            <li class="nav-links">
                <a href="./view/bookings.php">
                    <img class="navcons" src="./images/icons/booking-icon.svg" alt="Booking icon" title="Bookings">
                </a>
            </li>
            <li class="nav-links">
                <a href="./view/settings.php">
                    <img class="navcons" src="./images/icons/settings-icon.svg" alt="Settings icon" title="Account Settings">
                </a>
            </li>
            <li class="nav-links">
                <a href="./index.php?logout=1">
                    <img class="navcons" src="./images/icons/logout-icon.svg" alt="Logout icon" title="Logout">
                </a>
            </li>
        </ul>
    </nav>
    <main>
        <header>
            <figure class="head-fig">
                <img class="head-img" src="" alt="Header image">
            </figure>
            <section class="main-sec">
                <h1>
                    Home
                </h1>
                <br>
                <section class="sub-sec">
                    <h3>Welcome, <?php echo $_SESSION["name"] ?>.</h3>
                    <ul class="notifs">
                        <li class="notif-item">
                            <p>
                                Upcoming appointment: YYYY-MM-DD (in x days)
                            </p>
                        </li>
                        <li class="notif-item">
                            <p>
                                Pending appointments: 5
                            </p>
                        </li>
                    </ul>
                    
                </section>
            </section>
        </header>
        <section class="main-sec">
            <ul>
                <li>
                    <figure class="nav-fig">
                        <img src="" alt="">
                        <figcaption></figcaption>
                    </figure>
                </li>
                <li>
                    <figure class="nav-fig">
                        <img src="" alt="">
                        <figcaption></figcaption>
                    </figure>
                </li>
                <li>
                    <figure class="nav-fig">
                        <img src="" alt="">
                        <figcaption></figcaption>
                    </figure>
                </li>
            </ul>
        </section>
        <footer>

        </footer>
    </main>
</body>
</html>