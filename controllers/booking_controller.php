<?php
//connect to the user account class
require dirname (__FILE__)."/../classes/booking_class.php";

//--INSERT--//
function addBooking($student_id, $tutor_id, $major, $course, $book_date, $book_time, $book_hours) {
    $crud = new Booking_class;
    $request = $crud->addBooking($student_id, $tutor_id, $major, $course, $book_date, $book_time, $book_hours);

    if($request) 
        return true;
    else
        return false;
}

function addBookingHistory($student_id, $tutor_id, $major, $course, $book_date, $book_time, $book_hours) {
    $crud = new Booking_class;
    $request = $crud->addBookingHistory($student_id, $tutor_id, $major, $course, $book_date, $book_time, $book_hours);

    if($request != false) 
        return $request;
    else
        return false;
}


//--SELECT--//
function getStudentBookings($student_id) {
    $crud = new Booking_class;
    $request = $crud->getStudentBookings($student_id);

    if($request){
        $posts = array();
        while($record = $crud->fetch()){
            $posts[] = $record;
        }
        return $posts;
    }else{
        return false;
    }
}

function getStudentBookingsHistory($student_id) {
    $crud = new Booking_class;
    $request = $crud->getStudentBookingsHistory($student_id);

    if($request){
        $posts = array();
        while($record = $crud->fetch()){
            $posts[] = $record;
        }
        return $posts;
    }else{
        return false;
    }
}

function getTutorBookingsAppointments($tutor_id) {
    $crud = new Booking_class;
    $request = $crud->getTutorBookingsAppointments($tutor_id);

    if($request){
        $posts = array();
        while($record = $crud->fetch()){
            $posts[] = $record;
        }
        return $posts;
    }else{
        return false;
    }
}

function getStudentBooking($book_id) {
    $crud = new Booking_class;
    $request = $crud->getStudentBooking($book_id);

    if($request){
        $record = $crud->fetch();
        if(!empty($record)){
            return $record;
        }else{
            return false;
        }
    }else{
        return false;
    }
}

function getTutorBookings($t_id) {
    $crud = new Booking_class;
    $request = $crud->getTutorBookings($t_id);

    if($request){
        $posts = array();
        while($record = $crud->fetch()){
            $posts[] = $record;
        }
        return $posts;
    }else{
        return false;
    }
}

function getBookingDays() {
    $crud = new Booking_class;
    $request = $crud->getBookingDays();

    if($request){
        $posts = array();
        while($record = $crud->fetch()){
            $posts[] = $record;
        }
        return $posts;
    }else{
        return false;
    }
}

function getBookingDaysForTutors($tutor_id) {
    $crud = new Booking_class;
    $request = $crud->getBookingDaysForTutors($tutor_id);

    if($request){
        $posts = array();
        while($record = $crud->fetch()){
            $posts[] = $record;
        }
        return $posts;
    }else{
        return false;
    }
}


//--UPDATE--//
function updateBooking($student_id, $tutor_id, $course, $book_date, $book_time, $book_hours) {
    $crud = new Booking_class;
    $request = $crud->updateBooking($student_id, $tutor_id, $course, $book_date, $book_time, $book_hours);

    if($request) 
        return true;
    else
        return false;
}


//--DELETE--//
function removeBooking($book_id) {
    $crud = new Booking_class;
    $request = $crud->removeBooking($book_id);

    if($request) 
        return true;
    else
        return false;
}



// Make payment
function makePayment($amount, $currency, $reference, $bookhist_id) {
    $crud = new Booking_class;
    $request = $crud->makePayment($amount, $currency, $reference, $bookhist_id);

    if($request) 
        return true;
    else
        return false;
}
?>