<?php
    session_start();
    require_once dirname(__FILE__)."/functions/checks.php";
    require_once dirname(__FILE__) . "/functions/student_view_fxn.php";
    require_once dirname(__FILE__)."/controllers/booking_controller.php";

    $stud_up_apt = studentGetUpcomingAppointment($_SESSION["id"]);
    $stud_up_apt_count = studentAppointmentCount($_SESSION["id"]);

    if ($stud_up_apt == false) {
        $time = "None yet";
    }
    else {
        $time = date("d-D-M-Y",strtotime($stud_up_apt["book_date"]));
    }

    checkLoginStudent();
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                <!-- <img class="head-img" src="" alt="Header image"> -->
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
                                Upcoming appointment: <?php echo $time ?>
                            </p>
                        </li>
                        <li class="notif-item">
                            <p>
                                Pending appointments: <?php echo $stud_up_apt_count["appointments"] ?>
                            </p>
                        </li>
                    </ul>
                    
                </section>
            </section>
        </header>
        <section class="main-sec">
        <table class="table">
            <h4>Upcoming Appointments</h4>
                <thead>
                    <tr>
                        <td>Tutor Name</td>
                        <td>Course</td>
                        <td>Tutor Contact</td>
                        <td>Book Date</td>
                        <td>Book Time</td>
                        <td>Number of hours</td>
                        <td>Rate</td>
                        <td>Total Cost</td>
                    </tr>
                </thead>
                <tbody>
                   <?php
                        studentDisplayAppointments($_SESSION["id"]);
                   ?>
                </tbody>
            </table>
        </section>
        </section>
        <footer>

        </footer>
    </main>
</body>
</html>