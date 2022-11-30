<?php
    require_once dirname(__FILE__)."/../controllers/course_controller.php";
    function displayMajorOptions() {
        $majors = getMajors();
        echo '<option value="0">Select a major</option>';
        foreach ($majors as $key => $value) {
            echo '
            <option value="'.$value["major_id"].'">'.$value["major_name"].'</option>
            ';
        }
    }
    
    function displayMajors() {
        $majors = getMajors();
        if ($majors == false || empty($majors)) {
            echo 'No majors added yet.';
        }
        else {
            foreach ($majors as $key => $value) {
                echo '
            <tr>
            <td>
                '.$value["major_name"].'
            </td>
            <td class="d-flex">
                <form action="../actions/major_actions.php" class="me-5">
                    <input type="hidden" name="major_id" value="'.$value["major_id"].'">
                    <input type="text" name="new_major" placeholder="New Major Name..." required>
                    <input type="submit" value="Update" name="update">
                </form>
                <form action="../actions/major_actions.php">
                    <input type="hidden" name="major_id" value="'.$value["major_id"].'">
                    <input type="submit" value="Remove" name="delete">
                </form>
            </td>
            </tr>
                ';
            }
        }
    }

    function displayCourses() {
        $courses = getCourses();
        if ($courses == false || empty($courses)) {
            echo 'No courses added yet.';
        }
        else {
            foreach ($courses as $key => $value) {
                echo '
            <tr>
            <td class="pe-5">
                '.$value["course_name"].'
            </td>
            <td>
                '.$value["major_name"].'
             </td>
            <td class="d-flex">
                <form action="../actions/course_actions.php">
                    <input type="hidden" name="course_id" value="'.$value["course_id"].'">
                    <input type="text" name="new_course" placeholder="New Course Name" required>
                    <select name="major_id" required>
                       '; 

                    echo displayMajorOptions();

                    echo '
                    </select>
                    <input type="submit" value="Update" name="update">
                </form>
                <form action="../actions/course_actions.php">
                    <input type="hidden" name="course_id" value="'.$value["course_id"].'">
                    <input type="submit" value="Remove" name="delete">
                </form>
            </td>
            </tr>
                ';
            }
        }
    }
