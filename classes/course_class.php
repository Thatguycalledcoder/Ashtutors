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

	//--SELECT--//
	function getCourses() {
		$sql = "SELECT * FROM course";
		return $this->run_query($sql);
	}

    function getCourse($id) {
        $sql = "SELECT * FROM course WHERE course_id = '$id'";
		return $this->run_query($sql);
    }

	function checkCourse($name) {
		$sql = "SELECT * FROM course WHERE course_name =LIKE '%$name%'";
		return $this->run_query($sql);
	}

	function getCoursesByMajor($major) {
		$sql = "SELECT * FROM course WHERE course_major = '$major'";
		return $this->run_query($sql);
	}


	//--UPDATE--//
	function updateCourse($id, $name) {
		$sql = "UPDATE course SET course_name = '$name' WHERE course_id = '$id'";
		return $this->run_query($sql);
	}

	//--DELETE--//
    function removeCourse($id) {
		$sql = "DELETE FROM course WHERE course_id = '$id'";
		return $this->run_query($sql);
	}
}	

?>