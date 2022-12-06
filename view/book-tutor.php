<?php
    session_start();
    require_once dirname(__FILE__) . "/../functions/checks.php";
    require_once dirname(__FILE__)."/../functions/student_view_fxn.php";
    require_once dirname(__FILE__)."/../functions/general_display.php";

    checkLoginStudent();
    if (!(isset($_GET["tutor_id"]))) {
        header("location: tutors.php");
    }
    $tid = $_GET["tutor_id"];
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
            </figure>
            <section class="main-sec">
                <h1>
                    Book a Tutor
                </h1>
            </section>
        </header>
        <section class="main-sec">
            <strong>
            <?php
                if (isset($_SESSION["booking_msg"])) {
                    echo $_SESSION["booking_msg"];
                }
            ?>
            </strong>
            <figure>
                <div id="img-frame">
                    <img id="single-img" src="<?php echo $tutor["tutor_image"] ?>" alt="Tutor image">
                </div>
                <figcaption class="tutor-one">
                <form class="book-form" action="../actions/book_actions.php" method="GET">
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
                        <li>
                            <strong> Course:</strong>
                            <select name="course">
                                <?php
                                    displayCoursesForTutor($tid);
                                ?>
                            </select>
                        </li>
                        <li>
                            <label for="book_date">Appointment Date:</label>
                            <input type="date" name="book_date" id="book_date" min="<?php echo date('Y-m-d'); ?>" required>
                        </li>
                        <li>
                            <label for="book_time">Appointment Time:</label>
                            <input type="time" name="book_time" id="book_time" required>
                        </li>
                        <li>
                            <label for="book_hour">Number of hours:</label>
                            <input type="number" name="book_hours" id="book_hour" min="0" required>
                        </li>
                        <input type="hidden" name="major" value="<?php echo $tutor["tutor_major"] ?>">
                        <input type="hidden" name="student_id" value="<?php echo $_SESSION["id"] ?>">
                        <input type="hidden" name="tutor_id" value="<?php echo $tutor["tutor_id"] ?>">
                        <button type="submit" name="book_tutor" class="book-btn">Book</button>
                        
                    </ul>
                    </form>
                </figcaption>
            </figure>          
         
        </section>
        <footer>

        </footer>
    </main>
</body>

</html>