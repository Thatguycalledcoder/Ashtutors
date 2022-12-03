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

	function addBookingHistory($student_id, $tutor_id, $major, $course, $book_day, $book_time, $book_hours) {
		$sql = "INSERT INTO book_history(student_id, tutor_id, major, course, book_day, book_time, book_hours)
		VALUES ('$student_id', '$tutor_id', '$major', '$course', '$book_day', '$book_time', '$book_hours')";
		$this->run_query($sql);
		$last_id = mysqli_insert_id($this->database);
        return $last_id;
	}

	//--SELECT--//	
    function getStudentBookings($student_id) {
        $sql = "SELECT b.*, t.tutor_fname, t.tutor_lname, c.course_name, bd.book_day as bookday, tac.rate 
				FROM booking b,tutor t, book_days bd, course c, tutor_available_courses tac 
				WHERE b.course = tac.course_id AND b.tutor_id = t.tutor_id AND b.course = c.course_id AND b.book_day = bd.bookday_id AND student_id = '$student_id'";
        return $this->run_query($sql);
    }

    function getStudentBooking($book_id) {
		$sql = "SELECT b.*, t.tutor_fname, t.tutor_lname, c.course_name, bd.book_day as bookday, tac.rate 
				FROM booking b,tutor t, book_days bd, course c, tutor_available_courses tac 
				WHERE book_id = '$book_id'";
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
    function updateBooking($student_id, $tutor_id, $course, $book_day, $book_time, $book_hours) {
		$sql = "UPDATE booking SET course = '$course', book_day = '$book_day', book_time = '$book_time', book_hours = '$book_hours' 
                WHERE student_id = '$student_id' AND tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}


	//--DELETE--//
	function removeBooking($book_id) {
		$sql = "DELETE FROM booking WHERE book_id = '$book_id'";
		return $this->run_query($sql);
	}


    function makePayment($amount, $currency, $reference, $bookhist_id, $student_id, $tutor_id) {
        $sql = "INSERT INTO payment(amount, currency, reference, bookhist_id, student_id, tutor_id) 
				VALUES ('$amount', '$currency', '$reference', '$bookhist_id', '$student_id', '$tutor_id')";
        return $this->run_query($sql);
    }
}
?>