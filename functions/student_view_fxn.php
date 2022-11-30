<?php
    require_once dirname(__FILE__)."/../controllers/course_controller.php";

    function studentDisplayCourses() {
        $courses = getCoursesAndTutors();
        if ($courses == false || empty($courses)) {
            echo 'No courses added yet.';
        }
        else {
            foreach ($courses as $key => $value) {
                echo '
                <li>
                    <a href="coursesearch.php?cid='.$value["course_id"].'">
                        <section class="nav-fig">
                        <ul>
                            <li>Course name: '.$value["course_name"].'</li>
                            <li>Course major: '.$value["major_name"].'</li>
                            <li>Number of available tutors: '.$value["num_tutors"].'</li>
                        </ul>  
                        </section>
                    </a>
                </li>
                ';
            }
        }
    }
?>