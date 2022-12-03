<?php
    session_start();
    require_once dirname(__FILE__)."/../controllers/booking_controller.php";

    if (isset($_GET["book_tutor"])) {
        $student_id = $_GET["student_id"];
        $tutor_id = $_GET["tutor_id"];
        $major = $_GET["major"];
        $course = $_GET["course"];
        $book_day = $_GET["book_day"];
        $book_time = $_GET["book_time"];
        $book_hours = $_GET["book_hours"];

        $request = addBooking($student_id, $tutor_id, $major, $course, $book_day, $book_time, $book_hours);
        if ($request) {
            $_SESSION["book_msg"] = "Booking successful";
            header("location: ../view/bookings.php");
        } else {
            $_SESSION["book_msg"] = "Booking unsuccessful";
            header("location: ../view/tutors.php");
        }
    }
    elseif (isset($_GET["update_book"])) {
        $student_id = $_GET["student_id"];
        $tutor_id = $_GET["tutor_id"];
        $course = $_GET["course"];
        $book_day = $_GET["book_day"];
        $book_time = $_GET["book_time"];
        $book_hours = $_GET["book_hours"];

        updateBooking($student_id, $tutor_id, $course, $book_day, $book_time, $book_hours);

        header("location: ../view/bookings.php");
    }
    elseif (isset($_GET["delete_book"])) {
        $book_id = $_GET["bkid"];

        removeBooking($book_id);

        header("location: ../view/bookings.php");
    }
?>