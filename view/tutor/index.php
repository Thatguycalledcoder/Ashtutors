<!-- Setting available days, seting hour rate, available time -->
<?php
    session_start();
    require_once dirname(__FILE__)."/../../functions/checks.php";
    checkLogoutTutor();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutor: Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async defer></script>
</head>
<body class="container">
    <nav>
        <ul>
            <li>
                <a href="index.php">Home</a>
            </li>
            <li>
                <a href="booksettings.php">Booking Settings</a>
            </li>
            <li>
                <a href="tutorprofile.php">Profile</a>
            </li>
            <li>
                <a href="index.php?logout=1">
                    Logout
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
            <table class="table">
                <thead>
                    <tr>
                        <td>Student Name</td>
                        <td>Course Name</td>
                        <td>Number of hours</td>
                        <td>Appointment Date</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Stanley Lumumba</td>
                        <td>Heat Transfer</td>
                        <td>3</td>
                        <td>Monday 3pm</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </main>
</body>
</html>