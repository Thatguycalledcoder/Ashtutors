<?php
//connect to database class
require_once dirname (__FILE__)."/../settings/db_class.php";


class Tutor_class extends db_connection
{
	//--INSERT--//
	/**
	*Register a student
	*@param takes a contact name, email, password, country, city, contact, image
	*@return boolean
	**/
	function registerTutor($fname, $lname, $email, $password, $country, $year, $major, $contact, $user_role) {
		$sql = "INSERT INTO tutor(tutor_fname, tutor_lname, tutor_email, tutor_pass, tutor_country, tutor_year, tutor_major, tutor_contact, user_role)
		VALUES ('$fname', '$lname', '$email', '$password', '$country', '$year', '$major', '$contact', '$user_role')";
		return $this->run_query($sql);
	}

	function registerTutorCourse($tutor_id, $course_id, $rate) {
		$sql = "INSERT INTO tutor_available_courses VALUES('$tutor_id', '$course_id', '$rate')";
		return $this->run_query($sql);
	}

	function registerTutorAvailableBookings($tutor_id, $bookday_id, $starttime, $endtime) {
		$sql = "INSERT INTO tutor_available_booking VALUES('$tutor_id', '$bookday_id', '$starttime', '$endtime')";
		return $this->run_query($sql);
	}

	//--SELECT--//
	function checkEmailTutor($email) {
		$sql = "SELECT * FROM tutor WHERE tutor_email = '$email'";
		return $this->run_query($sql);
	}

	function validateLoginTutor($email, $password) {
		$sql = "SELECT * FROM tutor WHERE tutor_email = '$email' AND tutor_pass = '$password'";
		return $this->run_query($sql);
	}

	function validateForgotTutor($email, $year, $num) {
		$sql = "SELECT * FROM tutor WHERE tutor_email = '$email' AND tutor_year = '$year' AND tutor_contact = '$num'";
		return $this->run_query($sql);
	}

	function getTutors() {
		$sql = "SELECT * FROM tutor";
		return $this->run_query($sql);
	}

	function getAvailableTutors() {
		$sql = "SELECT tutor.*, major.major_name FROM tutor, major 
				WHERE tutor_availability = 1 AND tutor.tutor_major = major.major_id";
		return $this->run_query($sql);
	}

	function getAvailableTutorsByCourse($course_id) {
		$sql = "SELECT tutor.*, major.major_name FROM tutor, major 
				WHERE tutor_availability = 1 AND tutor.tutor_major = major.major_id
				AND '$course_id' IN 
					(SELECT course_id FROM tutor_available_courses)
				AND tutor.tutor_id IN
					(SELECT tutor_id FROM tutor_available_courses)";
		return $this->run_query($sql);
	}

	function getSelectedTutor($tutor_id) {
		$sql = "SELECT tutor.*, major.major_name FROM tutor, major 
				WHERE tutor_availability = 1 AND tutor.tutor_major = major.major_id
				AND tutor.tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	function getSearchedTutors($major, $year, $country) {
		$sql = "SELECT tutor.*, major.major_name FROM tutor, major 
				WHERE tutor.tutor_major = major.major_id AND 
				(major.major_name LIKE '%$major%' OR tutor.tutor_year LIKE '%$year%' OR tutor.tutor_country LIKE '%$country%')";
		return $this->run_query($sql);
	}

	function getTutorDetails($tutor_id) {
		$sql = "SELECT tutor.*, major.major_name FROM tutor, major 
		WHERE tutor_availability = 1 AND tutor.tutor_major = major.major_id 
		AND tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	function getTutorAvailableDays($tutor_id) {
		$sql = "SELECT tab.*, bd.book_day 
				FROM tutor_available_booking tab, book_days bd 
				WHERE tab.bookday_id = bd.bookday_id AND tab.tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	function getTutorCourses($tutor_id) {
		$sql = "SELECT tab.*, c.course_name FROM tutor_available_courses tab, course c 
				WHERE tab.course_id = c.course_id AND tab.tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	function getTutorAvailability($tutor_id) {
		$sql = "SELECT tutor_availability FROM tutor WHERE tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	//--UPDATE--//
	function updateTutorInfo($id, $fname, $lname, $email, $country, $year, $major, $contact) {
		$sql = "UPDATE tutor SET tutor_fname = '$fname', tutor_lname = '$lname', tutor_email = '$email',
				tutor_country = '$country', tutor_year = '$year', tutor_major = '$major', tutor_contact = '$contact'
				WHERE tutor_id = '$id'";
		return $this->run_query($sql);
	}

	function updateTutorPassword($id, $password) {
		$sql = "UPDATE tutor SET tutor_pass = '$password' WHERE tutor_id = '$id'";
		return $this->run_query($sql);
	}

	function updateTutorImage($id, $image) {
		$sql = "UPDATE tutor SET tutor_image = '$image' WHERE tutor_id = '$id'";
		return $this->run_query($sql);
	}

    function updateAvailability($id, $avail) {
        $sql = "UPDATE tutor SET tutor_availability = '$avail' WHERE tutor_id = '$id'";
		return $this->run_query($sql);
    }

	function updateTutorCourse($tutor_id, $course_id, $new_course, $rate) {
		$sql = "UPDATE tutor_available_courses SET course_id = '$new_course', rate = '$rate' 
				WHERE tutor_id = '$tutor_id' AND course_id = '$course_id'";
		return $this->run_query($sql);
	}

	function updateTutorBookDay($tutor_id, $bookday_id, $oldbookday_id, $starttime, $endtime) {
		$sql = "UPDATE tutor_available_booking SET bookday_id = '$bookday_id', start_time = '$starttime', end_time = '$endtime' WHERE tutor_id = '$tutor_id' AND bookday_id = '$oldbookday_id'";
		return $this->run_query($sql);
	}

	function updateTutorBookTime($tutor_id, $booktime) {
		$sql = "UPDATE tutor_book_time SET booktime = '$booktime' WHERE tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	//--DELETE--//
	function removeTutorCourse($tutor_id, $course_id) {
		$sql = "DELETE FROM tutor_available_courses WHERE tutor_id = '$tutor_id' AND course_id = '$course_id'";
		return $this->run_query($sql);
	}

	function removeTutorBookDay($tutor_id, $bookday_id) {
		$sql = "DELETE FROM tutor_available_booking WHERE tutor_id = '$tutor_id' AND bookday_id = '$bookday_id'";
		return $this->run_query($sql);
	}

	function removeTutorBookTime($tutor_id, $booktime) {
		$sql = "DELETE FROM tutor_book_time WHERE tutor_id = '$tutor_id' AND booktime = '$booktime'";
		return $this->run_query($sql);
	}
}	
?>