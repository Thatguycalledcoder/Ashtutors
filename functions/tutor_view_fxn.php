<?php
    require_once dirname(__FILE__)."/../controllers/tutor_controller.php";

    function displayTutorAvailableDays($t_id) {
        $avail_times = getTutorAvailableDays($t_id);
        foreach ($avail_times as $key => $value) {
            echo ' 
                <tr>
                    <td>'.$value["book_day"].'</td>
                    <td>'.$value["start_time"] . " - " . $value["end_time"].'</td>
                </tr>
            ';
        }
    }

    function displayTutorCourses($tutor_id) {
        $courses = getTutorCourses($tutor_id);
        foreach ($courses as $key => $value) {
            echo '
            <tr>
                <td>'.$value["course_name"].'</td>
                <td>'.$value["rate"].'</td>
            </tr>
            ';
        }
    }
?>