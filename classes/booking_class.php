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
	function addBooking($student_id, $tutor_id, $major, $course, $book_date, $book_time, $book_hours) {
		$sql = "INSERT INTO booking(student_id, tutor_id, major, course, book_date, book_time, book_hours)
		VALUES ('$student_id', '$tutor_id', '$major', '$course', '$book_date', '$book_time', '$book_hours')";
		return $this->run_query($sql);
	}

	function addBookingHistory($student_id, $tutor_id, $major, $course, $book_date, $book_time, $book_hours) {
		$sql = "INSERT INTO book_history(student_id, tutor_id, major, course, book_date, book_time, book_hours)
		VALUES ('$student_id', '$tutor_id', '$major', '$course', '$book_date', '$book_time', '$book_hours')";
		$this->run_query($sql);
		$last_id = mysqli_insert_id($this->database);
        return $last_id;
	}

	//--SELECT--//	
    function getStudentBookings($student_id) {
        $sql = "SELECT b.*, t.tutor_fname, t.tutor_lname, c.course_name, tac.rate 
				FROM booking b,tutor t, course c, tutor_available_courses tac 
				WHERE b.course = tac.course_id AND b.tutor_id = t.tutor_id AND b.course = c.course_id AND student_id = '$student_id'";
        return $this->run_query($sql);
    }

	function getStudentBookingsHistory($student_id) {
        $sql = "SELECT bh.*, t.tutor_fname, t.tutor_lname, t.tutor_contact, t.tutor_email, c.course_name, tac.rate 
				FROM book_history bh,tutor t, course c, tutor_available_courses tac 
				WHERE bh.course = tac.course_id AND bh.tutor_id = t.tutor_id AND bh.course = c.course_id AND student_id = '$student_id'";
        return $this->run_query($sql);
    }

	function getStudentAppointments($student_id) {
        $sql = "SELECT bh.*, t.tutor_fname, t.tutor_lname, t.tutor_contact, t.tutor_email, c.course_name, tac.rate 
				FROM book_history bh,tutor t, course c, tutor_available_courses tac 
				WHERE bh.book_date > CURRENT_DATE AND bh.course = tac.course_id AND bh.tutor_id = t.tutor_id AND bh.course = c.course_id AND student_id = '$student_id'";
        return $this->run_query($sql);
    }

	function getTutorBookingsAppointments($tutor_id) {
        $sql = "SELECT bh.*, s.student_fname, s.student_lname, s.student_email, s.student_contact, c.course_name, tac.rate 
				FROM book_history bh, student s, course c, tutor_available_courses tac 
				WHERE bh.book_date > CURRENT_DATE AND bh.course = tac.course_id AND bh.student_id = s.student_id AND bh.course = c.course_id AND bh.tutor_id = '$tutor_id'";
        return $this->run_query($sql);
    }

	function tutorAppointmentCount($tutor_id) {
		$sql = "SELECT COUNT(bookhist_id) as appointments FROM `book_history` WHERE book_date > CURRENT_DATE AND tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}

	function studentAppointmentCount($student_id) {
		$sql = "SELECT COUNT(bookhist_id) as appointments FROM `book_history` WHERE book_date > CURRENT_DATE AND student_id = '$student_id'";
		return $this->run_query($sql);
	}

	function studentGetUpcomingAppointment($student_id) {
		$sql = "SELECT * FROM `book_history` WHERE book_date > CURRENT_DATE AND student_id = '$student_id' ORDER BY book_date ASC LIMIT 1";
		return $this->run_query($sql);
	}

	function tutorGetUpcomingAppointment($tutor_id) {
		$sql = "SELECT * FROM `book_history` WHERE book_date > CURRENT_DATE AND tutor_id = '$tutor_id' ORDER BY book_date ASC LIMIT 1";
		return $this->run_query($sql);
	}


    function getStudentBooking($book_id) {
		$sql = "SELECT b.*, t.tutor_fname, t.tutor_lname, c.course_name, tac.rate 
				FROM booking b,tutor t, course c, tutor_available_courses tac 
				WHERE b.course = tac.course_id AND b.tutor_id = t.tutor_id AND b.course = c.course_id AND book_id = '$book_id'";
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

	function getBookingDaysForTutors($tutor_id) {
		$sql = "SELECT * FROM `book_days` WHERE bookday_id IN (SELECT bookday_id FROM tutor_available_booking WHERE tutor_id = '$tutor_id')";
		return $this->run_query($sql);
	}


	//--UPDATE--//
    function updateBooking($student_id, $tutor_id, $course, $book_date, $book_time, $book_hours) {
		$sql = "UPDATE booking SET course = '$course', book_date = '$book_date', book_time = '$book_time', book_hours = '$book_hours' 
                WHERE student_id = '$student_id' AND tutor_id = '$tutor_id'";
		return $this->run_query($sql);
	}


	//--DELETE--//
	function removeBooking($book_id) {
		$sql = "DELETE FROM booking WHERE book_id = '$book_id'";
		return $this->run_query($sql);
	}


    function makePayment($amount, $currency, $reference, $bookhist_id) {
        $sql = "INSERT INTO payment(amount, currency, reference, bookhist_id) 
				VALUES ('$amount', '$currency', '$reference', '$bookhist_id')";
        return $this->run_query($sql);
    }
}
?>