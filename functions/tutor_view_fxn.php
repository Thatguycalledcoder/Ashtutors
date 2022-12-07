<?php
    require_once dirname(__FILE__)."/../controllers/tutor_controller.php";
    require_once dirname(__FILE__)."/../controllers/booking_controller.php";

    function displayTutorAvailableDays($t_id) {
        $avail_times = getTutorAvailableDays($t_id);
        foreach ($avail_times as $key => $value) {
            echo ' 
                <tr>
                    <td>'.$value["book_day"].'</td>
                    <td>'.$value["start_time"] . " - " . $value["end_time"].'</td>
                    <td>
                        <form action="../../actions/tutor_actions.php">
                            <input type="hidden" name="tutor_id" value="'.$t_id.'">
                            <select name="new_day" required>';
                                
                                    displayBookDays();
                            
                    echo '</select>
                            <input type="time" name="new_to_time" class="form-control d-inline w-25" required>
                            <input type="time" name="new_fro_time" class="form-control d-inline w-25" required>
                            <input type="submit" class="btn btn-warning" name="update_day" value="Update">
                        </form>
                        <a href="../../actions/tutor_actions.php?delete_day=1&t_id='.$t_id.'&day_id='.$value["bookday_id"].'">
                            <button class="btn btn-danger">Remove</button>
                        </a>
                    </td>
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
                <td>'. "GH₵ " . $value["rate"].'</td>
                <td>
                    <form action="../../actions/tutor_actions.php">
                        <input type="hidden" name="course_id" value="'.$value["course_id"].'">
                        <input type="hidden" name="tutor_id" value="'.$tutor_id.'">
                        <select name="new_course" required>';
                            
                        displayCourses();
                            
                        echo '</select>
                        <input type="number" name="new_rate" min="0" step="0.50" placeholder="New rate" required>
                        <input type="submit" class="btn btn-warning" name="update_course" value="Update">
                    </form>
                    <a href="../../actions/tutor_actions.php?delete_course=1&t_id='.$tutor_id.'&c_id='.$value["course_id"].'">
                        <button class="btn btn-danger">Remove</button>
                    </a>
                </td>
            </tr>
            ';
        }
    }

    function displayTutorAppointments($tutor_id) {
        $bookings = getTutorBookingsAppointments($tutor_id);
        if (empty($bookings) || $bookings == false) {
            echo "<h3>
                    You have no bookings at the moment.
                  </h3>";
        }
        else {
            foreach ($bookings as $key => $value) {
                echo '
                <tr>
                    <td>'. $value["student_fname"] . " " . $value["student_lname"] .'</td>
                    <td>
                        '. $value["course_name"] .'
                    </td>
                    <td>
                        '. $value["student_email"] .' <br> '. $value["student_contact"] .'
                    </td>
                    <td>
                        '.date("d-D-M-Y",strtotime($value["book_date"])).'
                    </td>
                    <td>'. date("h:i A",strtotime($value["book_time"])) .'</td>
                    <td>'. $value["book_hours"] .'</td>
                    <td>'. "GH₵" . $value["rate"] .'</td>
                    <td>'. "GH₵" . $value["rate"] * $value["book_hours"] .'</td>
                </tr>
                ';
                    }
        }

    }

    function getAvailability($tutor_id) {
        $avail = getTutorAvailability($tutor_id)["tutor_availability"];
        if ($avail == 1) {
            return '<option value="1">Available (Selected)</option>';
        }
        else {
            return '<option value="0">Unavailable (Selected)</option>';
        }
    }
    
?>