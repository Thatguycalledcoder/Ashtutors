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

	function registerTutorCourse($tutor_id, $course_id) {
		$sql = "INSERT INTO tutor_courses VALUES('$tutor_id', '$course_id')";
		return $this->run_query($sql);
	}

	function registerTutorBookDays($tutor_id, $bookday_id) {
		$sql = "INSERT INTO tutor_book_day VALUES('$tutor_id', '$bookday_id')";
		return $this->run_query($sql);
	}

	function registerTutorBookTimes($tutor_id, $booktime) {
		$sql = "INSERT INTO tutor_book_time VALUES('$tutor_id', '$booktime')";
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

	function getTutors() {
		$sql = "SELECT * FROM tutors";
		return $this->run_query($sql);
	}

	function getTutor($tutor_id) {
		$sql = "SELECT * FROM tutors WHERE tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	function getTutorBookTimes($tutor_id) {
		$sql = "SELECT * FROM tutor_book_time
				WHERE tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	function getTutorBookDays($tutor_id) {
		$sql = "SELECT bd.bookday_id, bd.book_day FROM tutor_book_day tbd
				JOIN book_days bd
				WHERE tbd.tutor_id = '$tutor_id' AND tbd.bookday_id = bd.bookday_id";
		return $this->run_query($sql);
	}

	function getTutorCourses($tutor_id) {
		$sql = "SELECT c.course_id, c.course_name FROM tutor_courses tc
				JOIN course c
				WHERE tc.tutor_id = '$tutor_id' AND tc.course_id = c.course_id";
		return $this->run_query($sql);
	}

	//--UPDATE--//
	function updateTutorInfo($id, $name, $email, $password, $country, $year, $major, $contact, $image) {
		$sql = "UPDATE tutor SET tutor_name = '$name' AND tutor_email = '$email' AND tutor_pass = '$password' 
		AND tutor_country = '$country' AND tutor_year = '$year' AND tutor_major = '$major' AND tutor_contact = '$contact'
		AND tutor_image = '$image' WHERE tutor_id = '$id'";
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

	function updateTutorCourse($tutor_id, $course_id) {
		$sql = "UPDATE tutor_courses SET course_id = '$course_id' WHERE tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	function updateTutorBookDay($tutor_id, $bookday_id) {
		$sql = "UPDATE tutor_book_day SET bookday_id = '$bookday_id' WHERE tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	function updateTutorBookTime($tutor_id, $booktime) {
		$sql = "UPDATE tutor_book_time SET booktime = '$booktime' WHERE tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	//--DELETE--//
	function removeTutorCourse($tutor_id, $course_id) {
		$sql = "DELETE FROM tutor_courses WHERE tutor_id = '$tutor_id' AND course_id = '$course_id'";
		return $this->run_query($sql);
	}

	function removeTutorBookDay($tutor_id, $bookday_id) {
		$sql = "DELETE FROM tutor_book_day WHERE tutor_id = '$tutor_id' AND bookday_id = '$bookday_id'";
		return $this->run_query($sql);
	}

	function removeTutorBookTime($tutor_id, $booktime) {
		$sql = "DELETE FROM tutor_book_time WHERE tutor_id = '$tutor_id' AND booktime = '$booktime'";
		return $this->run_query($sql);
	}
}	
?>