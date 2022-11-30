<?php
//connect to database class
require_once dirname (__FILE__)."/../settings/db_class.php";


class Course_class extends db_connection
{
	//--INSERT--//
	function addCourse($name, $dept) {
		$sql = "INSERT INTO course(course_name, course_major) VALUES ('$name', '$dept')";
		return $this->run_query($sql);
	}

	function addMajor($name) {
		$sql = "INSERT INTO major(major_name) VALUES ('$name')";
		return $this->run_query($sql);
	}

	//--SELECT--//
	function getCourses() {
		$sql = "SELECT course.course_id, course.course_name, course.course_major, major.major_name 
		FROM course JOIN major
		WHERE course.course_major = major.major_id
		ORDER BY course.course_name ASC";
		return $this->run_query($sql);
	}

    function getCourse($id) {
        $sql = "SELECT course.course_id, course.course_name, course.course_major, major.major_name 
		FROM course JOIN major 
		WHERE course.course_id = '$id'";
		return $this->run_query($sql);
    }

	function getCoursesAndTutors() {
		$sql = "SELECT course_id, course_name, major.major_name, COUNT(course_id) AS 'num_tutors' 
				FROM course, major WHERE course.course_id IN 
					(SELECT course_id FROM tutor_available_courses WHERE tutor_id IN 
						(SELECT tutor_id FROM tutor WHERE tutor_availability = 1) ) 
					AND course_major = major.major_id 
					GROUP BY course.course_id;";
		return $this->run_query($sql);
	}

	function checkCourse($name) {
		$sql = "SELECT * FROM course WHERE course_name LIKE '%$name%'";
		return $this->run_query($sql);
	}

	function getCoursesByMajor($major) {
		$sql = "SELECT * FROM course WHERE course_major = '$major'";
		return $this->run_query($sql);
	}

	function getMajors() {
		$sql = "SELECT * FROM major
		ORDER BY major_name ASC";
		return $this->run_query($sql);
	}

    function getMajor($id) {
        $sql = "SELECT * FROM major WHERE major_id = '$id'";
		return $this->run_query($sql);
    }


	//--UPDATE--//
	function updateCourse($id, $name, $dept) {
		$sql = "UPDATE course SET course_name = '$name', course_major = '$dept' WHERE course_id = '$id'";
		return $this->run_query($sql);
	}

	function updateMajor($id, $name) {
		$sql = "UPDATE major SET major_name = '$name' WHERE major_id = '$id'";
		return $this->run_query($sql);
	}

	//--DELETE--//
    function removeCourse($id) {
		$sql = "DELETE FROM course WHERE course_id = '$id'";
		return $this->run_query($sql);
	}

	function removeMajor($id) {
		$sql = "DELETE FROM major WHERE major_id = '$id'";
		return $this->run_query($sql);
	}
}	

?>