<?php
//connect to database class
require_once dirname (__FILE__)."/../settings/db_class.php";


class Booking_class extends db_connection
{
	//--INSERT--//
	/**
	*Register a student
	*@param takes a contact name, email, password, country, city, contact, image
	*@return boolean
	**/
	function addBooking($student_id, $tutor_id, $major, $course, $book_day, $book_time, $book_hours) {
		$sql = "INSERT INTO booking(student_id, tutor_id, major, course, book_day, book_time, book_hours)
		VALUES ('$student_id', '$tutor_id', '$major', '$course', '$book_day', '$book_time', '$book_hours')";
		return $this->run_query($sql);
	}


	//--SELECT--//	
    function getStudentBookings($s_id) {
        $sql = "SELECT * FROM booking WHERE student_id = '$s_id'";
        return $this->run_query($sql);
    }

    function getStudentBooking($s_id, $t_id) {
		$sql = "SELECT * FROM booking WHERE student_id = '$s_id' AND tutor_id = '$t_id'";
		return $this->run_query($sql);
	}

	function getTutorBookings($t_id) {
		$sql = "SELECT * FROM booking WHERE tutor_id = '$t_id'";
		return $this->run_query($sql);
	}

	function getBookingDays() {
		$sql = "SELECT * FROM book_days";
		return $this->run_query($sql);
	}


	//--UPDATE--//
    function updateBooking($s_id, $t_id, $hours, $time, $date) {
		$sql = "UPDATE booking SEt no_hours = '$hours' AND book_time = '$time' AND book_date = '$date' 
                WHERE student_id = '$s_id' AND tutor_id = '$t_id'";
		return $this->run_query($sql);
	}


	//--DELETE--//
	function removeBooking($s_id, $t_id) {
		$sql = "DELETE FROM booking WHERE student_id = '$s_id' AND tutor_id = '$t_id'";
		return $this->run_query($sql);
	}


    function makePayment($s_id, $amount, $date) {
        $sql = "INSERT INTO payment(student_id, amount, pay_date) VALUeS
                ('$s_id', '$amount', '$date')";
        return $this->run_query($sql);
    }
}
?>