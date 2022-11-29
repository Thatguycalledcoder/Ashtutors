<?php
//connect to database class
require_once dirname (__FILE__)."/../settings/db_class.php";


class Student_class extends db_connection
{
	//--INSERT--//
	/**
	*Register a student
	*@param takes a contact name, email, password, country, city, contact, image
	*@return boolean
	**/
	function registerStudent($fname, $lname, $email, $password, $country, $year, $major, $contact, $user_role) {
		$sql = "INSERT INTO student(student_fname, student_lname, student_email, student_pass, student_country, student_year, student_major, student_contact, user_role)
		VALUES ('$fname', '$lname', '$email', '$password', '$country', '$year', '$major', '$contact', '$user_role')";
		return $this->run_query($sql);
	}


	//--SELECT--//
	function checkEmailStudent($email) {
		$sql = "SELECT * FROM student WHERE student_email = '$email'";
		return $this->run_query($sql);
	}

	function validateLoginStudent($email, $password) {
		$sql = "SELECT * FROM student WHERE student_email = '$email' AND student_pass = '$password'";
		return $this->run_query($sql);
	}

	function getStudentDetails($student_id) {
		$sql = "SELECT * FROM student WHERE student_id = '$student_id'";
		return $this->run_query($sql);
	}

	//--UPDATE--//
	function updateStudentInfo($id, $name, $email, $password, $country, $year, $major, $contact, $image) {
		$sql = "UPDATE student SET student_name = '$name' AND student_email = '$email' AND student_pass = '$password' 
		AND student_country = '$country' AND student_year = '$year' AND student_major = '$major' AND student_contact = '$contact'
		AND student_image = '$image' WHERE student_id = '$id'";
		return $this->run_query($sql);
	}

	function updateStudentPassword($id, $password) {
		$sql = "UPDATE student SET student_pass = '$password' WHERE student_id = '$id'";
		return $this->run_query($sql);
	}

	function updateStudentImage($id, $image) {
		$sql = "UPDATE student SET student_image = '$image' WHERE student_id = '$id'";
		return $this->run_query($sql);
	}

	//--DELETE--//
	
}	

?>