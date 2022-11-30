<?php
    require_once dirname(__FILE__)."/../controllers/booking_controller.php";
    require_once dirname(__FILE__)."/../controllers/course_controller.php";

    function displayBookDays() {
        $days = getBookingDays();
        foreach ($days as $key => $value) {
            echo '
                <option value="'.$value["bookday_id"].'">'.$value["book_day"].'</option>
            ';
        }
    }

    function displayCourses() {
        $courses = getCourses();
        foreach ($courses as $key => $value) {
            echo '
                <option value="'.$value["course_id"].'">'.$value["course_name"].'</option>
            ';
        }
    }
?>