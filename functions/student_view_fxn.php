<?php
    require_once dirname(__FILE__)."/../controllers/course_controller.php";
    require_once dirname(__FILE__)."/../controllers/tutor_controller.php";

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


    function studentDisplayTutorCourses($t_id) {
        $courses = getTutorCourses($t_id);
        if (empty($courses) || $courses == false) {
            echo "No available courses at the moment";
        }
        else {
            $course_list = "";
            $count = false;
            foreach ($courses as $key => $value) {
                if ($count == true) {
                    $course_list = $course_list . "; " . $value["course_name"] . " - " . $value["rate"];
                }
                else {
                    $course_list = $value["course_name"] . " - GH₵" . $value["rate"];
                }
                $count = true;
            }
            echo $course_list;
        }
    }

    function studentDisplayTutorDays($t_id) {
        $times = getTutorAvailableDays($t_id);
        if (empty($times) || $times == false) {
            echo "No available times at the moment";
        }
        else {
            $time_list = "";
            $count = false;
            foreach ($times as $key => $value) {
                if ($count == true) {
                    $time_list = $time_list . "; " . $value["book_day"] . ": " . $value["start_time"] . " - " . $value["end_time"];
                }
                else {
                    $time_list = $value["book_day"] . "(" . $value["start_time"] . " - " . $value["end_time"] . ")";
                }
                $count = true;
            }
            echo $time_list;
        }
    }

    function displayCourseSearched($course_id) {
        $course_data = getCourseOnly($course_id);
        echo $course_data["course_name"];
    }

    function studentDisplayTutors() {
        $tutors = getAvailableTutors();
        if (empty($tutors) || $tutors == false) {
            echo "<h3>
                    No available tutors at the moment
                  </h3>";
        }
        else {
            foreach ($tutors as $key => $value) {
               if ($value["tutor_image"] == null) {
                $value["tutor_image"] = "../images/icons/user-default.png";
               }
            }
            echo '
            <li class="tutor-list">
             <a href="tutor.php?tid='.$value["tutor_id"].'">
                <figure class="tutor-nav-fig">
                    <img class="tutor-fig-img" src="'.$value["tutor_image"].'" alt="Tutor image">
                    <figcaption>
                        <ul class="tutor-details ovfw-ctrl">
                            <li>
                                <strong>Name:</strong>
                                <span>'. $value["tutor_fname"] . " " . $value["tutor_lname"] .'</span>
                            </li>
                            <li>
                                <strong>Major:</strong>
                                <span>'.$value["major_name"].'</span>
                            </li>
                            <li>
                                <strong>Courses - Rate:</strong><br>
                                <span>';
                                    studentDisplayTutorCourses($value["tutor_id"]);
                              echo '</span>
                            </li>
                            <li>
                                <strong>Available times:</strong><br>
                                <span>';
                                    studentDisplayTutorDays($value["tutor_id"]);
                            echo  '</span>
                            </li>
                        </ul>
                    </figcaption>
                </figure>
                </a>
            </li>
            ';
        }
    }

    function studentDisplayTutorsByCourse($course_id) {
        $tutors = getAvailableTutorsByCourse($course_id);
        if (empty($tutors) || $tutors == false) {
            echo "<h3>
                    No available tutors at the moment
                </h3>";
        }
        else {
            foreach ($tutors as $key => $value) {
               if ($value["tutor_image"] == null) {
                $value["tutor_image"] = "../images/icons/user-default.png";
               }
            }
            echo '
            <li class="tutor-list">
                <a href="tutor.php?tid='.$value["tutor_id"].'">
                <figure class="tutor-nav-fig">
                    <img class="tutor-fig-img" src="'.$value["tutor_image"].'" alt="Tutor image">
                    <figcaption>
                        <ul class="tutor-details ovfw-ctrl">
                            <li>
                                <strong>Name:</strong>
                                <span>'. $value["tutor_fname"] . " " . $value["tutor_lname"] .'</span>
                            </li>
                            <li>
                                <strong>Major:</strong>
                                <span>'.$value["major_name"].'</span>
                            </li>
                            <li>
                                <strong>Courses - Rate:</strong><br>
                                <span>';
                                    studentDisplayTutorCourses($value["tutor_id"]);
                              echo '</span>
                            </li>
                            <li>
                                <strong>Available times:</strong><br>
                                <span>';
                                    studentDisplayTutorDays($value["tutor_id"]);
                            echo  '</span>
                            </li>
                        </ul>
                    </figcaption>
                </figure>
                </a>
            </li>
            ';
        }
    }

    function studentGetTutorDetails($tutor_id) {
        return getSelectedTutor($tutor_id);
    }

    function studentDisplayTutorSearch($major, $year, $country) {
        if (empty($major)) {
            $major = "`";
        }
        if (empty($year)) {
            $year = "`";
        }
        if (empty($country)) {
            $country = "`";
        }
        $tutors = getSearchedTutors($major, $year, $country);
        if (empty($tutors) || $tutors == false) {
            echo "<h3>
                    No available tutors at the moment
                  </h3>";
        }
        else {
            foreach ($tutors as $key => $value) {
               if ($value["tutor_image"] == null) {
                $value["tutor_image"] = "../images/icons/user-default.png";
               }
            }
            echo '
            <li class="tutor-list">
             <a href="tutor.php?tid='.$value["tutor_id"].'">
                <figure class="tutor-nav-fig">
                    <img class="tutor-fig-img" src="'.$value["tutor_image"].'" alt="Tutor image">
                    <figcaption>
                        <ul class="tutor-details ovfw-ctrl">
                            <li>
                                <strong>Name:</strong>
                                <span>'. $value["tutor_fname"] . " " . $value["tutor_lname"] .'</span>
                            </li>
                            <li>
                                <strong>Major:</strong>
                                <span>'.$value["major_name"].'</span>
                            </li>
                            <li>
                                <strong>Courses - Rate:</strong><br>
                                <span>';
                                    studentDisplayTutorCourses($value["tutor_id"]);
                              echo '</span>
                            </li>
                            <li>
                                <strong>Available times:</strong><br>
                                <span>';
                                    studentDisplayTutorDays($value["tutor_id"]);
                            echo  '</span>
                            </li>
                        </ul>
                    </figcaption>
                </figure>
                </a>
            </li>
            ';
        }
    }
?>