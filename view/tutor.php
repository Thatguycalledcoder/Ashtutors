<?php
    session_start();
    require dirname(__FILE__) . "/../functions/checks.php";
    require_once dirname(__FILE__)."/../functions/student_view_fxn.php";

    checkLoginStudent();
    if (!(isset($_GET["tid"]))) {
        header("location: tutors.php");
    }
    $tid = $_GET["tid"];
    $tutor = studentGetTutorDetails($tid);
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
        </header>
        <section class="main-sec">
            <figure class="align-text">
                <img id="single-img" src="<?php echo $tutor["tutor_image"] ?>" alt="Tutor image">
                <figcaption class="tutor-one">
                    <ul class="account-details">
                        <li>
                            <strong>Name:</strong>
                            <span><strong><?php echo $tutor["tutor_fname"] . " " . $tutor["tutor_lname"] ?></strong></span>
                        </li>
                        <li>
                            <strong>Major:</strong>
                            <span><?php echo $tutor["major_name"] ?></span>
                        </li>
                        <li>
                        <strong>Courses - Rate:</strong>
                            <span><?php studentDisplayTutorCourses($tid) ?></span>
                        </li>
                        <li>
                        <strong> Available times:</strong>
                            <span><?php studentDisplayTutorDays($tid) ?></span>
                        </li>
                    </ul>
                </figcaption>
            </figure>
            <form class="book-form" action="book-tutor.php" method="GET">
                <input type="hidden" name="tutor_id" value="<?php echo $tutor["tutor_id"] ?>">
                <button type="submit" class="book-btn">Book Now</button>
            </form>
        </section>
        <footer>

        </footer>
    </main>
</body>

</html>