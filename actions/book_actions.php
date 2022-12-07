<?php
    session_start();
    require_once dirname(__FILE__)."/../controllers/booking_controller.php";
    require_once dirname(__FILE__)."/../controllers/tutor_controller.php";
    unset($_SESSION["booking_msg"]);
    unset($_SESSION["book_update_msg"]);

    if (isset($_GET["book_tutor"])) {
        $student_id = $_GET["student_id"];
        $tutor_id = $_GET["tutor_id"];
        $major = $_GET["major"];
        $course = $_GET["course"];
        $book_date = $_GET["book_date"];
        $book_time = $_GET["book_time"];
        $book_hours = $_GET["book_hours"];

        $tutor_data = getTutorAvailableDays($tutor_id);
        $day_time_check = false;

        $day = date('w', strtotime($book_date));
        $datetime = new DateTime('00:00:00');
        $datetime->add(new DateInterval('PT'.$book_hours+1 .'H'));
        $book_time_end = strtotime($datetime->format('H:i:s'));
        $book_time_end = $book_time_end + strtotime($book_time);
        $book_time_end = date("H:i:s", $book_time_end);

        foreach ($tutor_data as $key => $value) {
            if ($value["bookday_id"] - 1 == $day) {
                echo $value["bookday_id"];
               if ($book_time >= $value["start_time"] && $book_time <= $value["end_time"] && $book_time_end <= $value["end_time"]) {
                $day_time_check = true;
               }
               break;
            }
        }
        echo $day_time_check;
        if (!$day_time_check) {
            $_SESSION["booking_msg"] = "Time of booking not within tutor's range ";
            // header('location: ../view/book-tutor.php?tutor_id='.$tutor_id);
        }
        else {
            $request = addBooking($student_id, $tutor_id, $major, $course, $book_date, $book_time, $book_hours);
            if ($request) {
                $_SESSION["book_msg"] = "Booking successful";
                header("location: ../view/bookings.php");
            } else {
                $_SESSION["book_msg"] = "Booking unsuccessful";
                header("location: ../view/tutors.php");
            }
        }
    }
    elseif (isset($_GET["update_book"])) {
        $student_id = $_GET["student_id"];
        $tutor_id = $_GET["tutor_id"];
        $course = $_GET["course"];
        $book_date = $_GET["book_date"];
        $book_time = $_GET["book_time"];
        $book_hours = $_GET["book_hours"];

        $tutor_data = getTutorAvailableDays($tutor_id);
        $day_time_check = false;

        $day = date('w', strtotime($book_date));
        $datetime = new DateTime('00:00:00');
        $datetime->add(new DateInterval('PT'.$book_hours+1 .'H'));
        $book_time_end = strtotime($datetime->format('H:i:s'));
        $book_time_end = $book_time_end + strtotime($book_time);
        $book_time_end = date("H:i:s", $book_time_end);

        foreach ($tutor_data as $key => $value) {
            if ($value["bookday_id"] - 1 == $day) {
               if ($book_time >= $value["start_time"] && $book_time <= $value["end_time"] && $book_time_end <= $value["end_time"]) {
                $day_time_check = true;
               }
               break;
            }
        }

        if (!$day_time_check) {
            $_SESSION["book_update_msg"] = "Time of booking not within tutor's range ";
            header('location: ../view/bookings.php');
        }
        else {
            updateBooking($student_id, $tutor_id, $course, $book_date, $book_time, $book_hours);

            header("location: ../view/bookings.php");
        }
    }
    elseif (isset($_GET["delete_book"])) {
        $book_id = $_GET["bkid"];

        removeBooking($book_id);

        header("location: ../view/bookings.php");
    }
?>