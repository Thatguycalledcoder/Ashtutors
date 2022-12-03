<?php
    require_once dirname(__FILE__)."/../controllers/booking_controller.php";
    require_once dirname(__FILE__)."/../controllers/course_controller.php";
    require_once dirname(__FILE__)."/../controllers/tutor_controller.php";

    function studentDisplayBookDays() {
        $days = getBookingDays();
        foreach ($days as $key => $value) {
            echo '
                <option value="'.$value["bookday_id"].'">'.$value["book_day"].'</option>
            ';
        }
    }

    function displayTutorCourses() {
        $courses = getCourses();
        foreach ($courses as $key => $value) {
            echo '
                <option value="'.$value["course_id"].'">'.$value["course_name"].'</option>
            ';
        }
    }

    function displayCoursesForTutor($tutor_id) {
        $courses = getTutorCourses($tutor_id);
        foreach ($courses as $key => $value) {
            echo '
                <option value="'.$value["course_id"].'">'.$value["course_name"].'</option>
            ';
        }
    }

    function displayBookDaysForTutor($tutor_id) {
        $courses = getBookingDaysForTutors($tutor_id);
        foreach ($courses as $key => $value) {
            echo '
                <option value="'.$value["bookday_id"].'">'.$value["book_day"].'</option>
            ';
        }
    }

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

    function studentDisplayBookings($student_id) {
        $bookings = getStudentBookings($student_id);
        if (empty($bookings) || $bookings == false) {
            echo "<h3>
                    You have no bookings at the moment.
                  </h3>";
        }
        else {
            foreach ($bookings as $key => $value) {
                echo '
                <tr>
                    <form action="../actions/book_actions.php">
                    <td>'. $value["tutor_fname"] . " " . $value["tutor_lname"] .'</td>
                    <td>
                        <select name="course">
                            <option value="'.$value["course"].'">'. $value["course_name"] .'(Selected)</option>';
                            displayCoursesForTutor($value["tutor_id"]);
                    echo  '</select>
                    </td>
                    <td>
                        <select name="book_day">
                            <option value="'.$value["book_day"].'">'.$value["bookday"].'(Selected)</option>';
                            displayBookDaysForTutor($value["tutor_id"]);
                    echo  '</select>
                    </td>
                    <td><input type="time" name="book_time" value="'. $value["book_time"] .'"></td>
                    <td><input type="number" name="book_hours" value="'. $value["book_hours"] .'"></td>
                    <td>'. "GH₵" . $value["rate"] .'</td>
                    <td>'. "GH₵" . $value["rate"] * $value["book_hours"] .'</td>
                    <td>
                        <input type="hidden" name="student_id" value="'.$student_id.'">
                        <input type="hidden" name="tutor_id" value="'.$value["tutor_id"].'">
                        <button type="submit" name="update_book" class="btn btn-warning">Update</button>
                    </td>
                    </form>
                    <td>
                        <a href="../actions/book_actions.php?delete_book=1&bkid='.$value["book_id"].'">
                            <button class="btn btn-danger">Cancel</button>
                        </a>
                    </td>
                    <td>
                        <a href="checkout.php?bkid='.$value["book_id"].'">
                            <button class="btn btn-success">Pay</button>
                        </a>
                    </td>
                </tr>
                ';
                    }
        }

    }

    function studentDisplayBookingsHistory($student_id) {
        $bookings = getStudentBookingsHistory($student_id);
        if (empty($bookings) || $bookings == false) {
            echo "<h3>
                    You have no bookings at the moment.
                  </h3>";
        }
        else {
            foreach ($bookings as $key => $value) {
                echo '
                <tr>
                    <td>'. $value["tutor_fname"] . " " . $value["tutor_lname"] .'</td>
                    <td>
                        '. $value["course_name"] .'
                    </td>
                    <td>
                        '.$value["bookday"].'
                    </td>
                    <td>'. $value["book_time"] .'</td>
                    <td>'. $value["book_hours"] .'</td>
                    <td>'. "GH₵" . $value["rate"] .'</td>
                    <td>'. "GH₵" . $value["rate"] * $value["book_hours"] .'</td>
                </tr>
                ';
                    }
        }

    }
    
    function studentBookCheckout($book_id) {
        return getStudentBooking($book_id);
    }
    ?>