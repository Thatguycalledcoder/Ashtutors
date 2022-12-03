<?php
    session_start();
    require_once dirname(__FILE__) . "/../functions/checks.php";
    require_once dirname(__FILE__) . "/../functions/student_view_fxn.php";
    require_once dirname(__FILE__)."/../controllers/student_controller.php";

    checkLoginStudent();

    if (!(isset($_GET["bkid"]))) {
        header("location: bookings.php");
    }
    $book_details = studentBookCheckout($_GET["bkid"]);
    $info = getStudentDetails($_SESSION["id"]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/main.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous" async defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous" async defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" async defer></script>
    <script src="https://js.paystack.co/v2/inline.js" async defer></script>
    <script src="../js/paystack.js" async defer></script>
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
            <section class="main-sec">
                <h1>
                    Payment
                </h1>
            </section>
        </header>
        <section class="main-sec">
            <p>
                Tutor: <?php echo $book_details["tutor_fname"] . " " . $book_details["tutor_lname"] ?>
            </p>
            <p>
                Course: <?php echo $book_details["course_name"] ?>
            </p>
            <p>
                Appointment Time: <?php echo $book_details["bookday"] . " at " . $book_details["book_time"] ?>
            </p>
            <p>
                Amount: GH₵ <?php echo $book_details["rate"] * $book_details["book_hours"] ?>
            </p>
            <form action="" id="form">
                <input type="hidden" id="book_id" name="book_id" value="<?php echo $book_details["book_id"] ?>">
                <!-- <input type="hidden" id="student_id" name="student_id" value="<?php echo $book_details["student_id"] ?>">
                <input type="hidden" id="tutor_id" name="tutor_id" value="<?php echo $book_details["tutor_id"] ?>">
                <input type="hidden" id="major" name="major" value="<?php echo $book_details["major"] ?>">
                <input type="hidden" id="course" name="course" value="<?php echo $book_details["course"] ?>">
                <input type="hidden" id="student_id" name="student_id" value="<?php echo $book_details["student_id"] ?>">
                <input type="hidden" id="tutor_id" name="tutor_id" value="<?php echo $book_details["tutor_id"] ?>">
                <input type="hidden" id="major" name="major" value="<?php echo $book_details["major"] ?>"> -->
                <input type="hidden" id="email" name="email" value="<?php echo $info["student_email"] ?>">
                <input type="hidden" id="amount" name="amount" value="<?php echo $book_details["rate"] * $book_details["book_hours"] ?>">
                <button type="submit" class="btn btn-success" onclick="payWithPaystack(event)">Make Payment</button>
            </form>
        </section>
        <footer>

        </footer>
    </main>
</body>

</html>