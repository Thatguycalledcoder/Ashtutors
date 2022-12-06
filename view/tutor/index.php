<!-- Setting available days, seting hour rate, available time -->
<?php
    session_start();
    require_once dirname(__FILE__)."/../../functions/checks.php";
    require_once dirname(__FILE__)."/../../functions/tutor_view_fxn.php";
    require_once dirname(__FILE__)."/../../controllers/booking_controller.php";

    $tutor_up_apt = TutorGetUpcomingAppointment($_SESSION["id"]);
    $tutor_up_apt_count = TutorAppointmentCount($_SESSION["id"]);

    checkLogoutTutor();
    checkLoginTutor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor: Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../../css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async defer></script>
</head>
<body>
    <nav>
        <ul class="navi">
            <li class="nav-links">
                <a href="index.php">
                    <img class="navcons" src="./../../images/icons/home-icon.svg" alt="Home" title="Home">
                </a>
            </li>
            <li class="nav-links">
                <a href="booksettings.php">
                    <img class="navcons" src="./../../images/icons/settings-icon.svg" alt="Booking Settings" title="Booking Settings">
                </a>
            </li>
            <li class="nav-links">
                <a href="tutorprofile.php">
                    <img class="navcons" src="./../../images/icons/tutor-icon.svg" alt="Tutor profile" title="Tutor Profile">
                </a>
            </li>
            <li class="nav-links">
                <a href="index.php?logout=1">
                    <img class="navcons" src="./../../images/icons/logout-icon.svg" alt="Logout" title="Logout">
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
                    Home
                </h1>
                <br>
                <section class="sub-sec">
                    <h3>Welcome, <?php echo $_SESSION["name"] ?>.</h3>
                    <ul class="notifs">
                    <li class="notif-item">
                            <p>
                                Upcoming appointment: <?php echo date("d-D-M-Y",strtotime($tutor_up_apt["book_date"])) ?>
                            </p>
                        </li>
                        <li class="notif-item">
                            <p>
                                Pending appointments: <?php echo $tutor_up_apt_count["appointments"] ?>
                            </p>
                        </li>
                    </ul>        
                </section>
            </section>
        </header>
        <section class="main-sec">
            <table class="table">
                <thead>
                    <tr>
                        <td>Student Name</td>
                        <td>Course</td>
                        <td>Contact</td>
                        <td>Book Date</td>
                        <td>Book Time</td>
                        <td>Number of hours</td>
                        <td>Rate</td>
                        <td>Total Cost</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        displayTutorAppointments($_SESSION["id"]);
                    ?>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>