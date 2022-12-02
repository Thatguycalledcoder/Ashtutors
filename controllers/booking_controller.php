<?php
//connect to the user account class
require dirname (__FILE__)."/../classes/booking_class.php";

//--INSERT--//
function addBooking($student_id, $tutor_id, $major, $course, $book_day, $book_time, $book_hours) {
    $crud = new Booking_class;
    $request = $crud->addBooking($student_id, $tutor_id, $major, $course, $book_day, $book_time, $book_hours);

    if($request) 
        return true;
    else
        return false;
}


//--SELECT--//
function getStudentBookings($s_id) {
    $crud = new Booking_class;
    $request = $crud->getStudentBookings($s_id);

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

function getStudentBooking($s_id, $t_id) {
    $crud = new Booking_class;
    $request = $crud->getStudentBooking($s_id, $t_id);

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


//--UPDATE--//
function updateBooking($s_id, $t_id, $hours, $time, $date) {
    $crud = new Booking_class;
    $request = $crud->updateBooking($s_id, $t_id, $hours, $time, $date);

    if($request) 
        return true;
    else
        return false;
}


//--DELETE--//
function removeBooking($s_id, $t_id) {
    $crud = new Booking_class;
    $request = $crud->removeBooking($s_id, $t_id);

    if($request) 
        return true;
    else
        return false;
}



// Make payment
function makePayment($s_id, $amount, $date) {
    $crud = new Booking_class;
    $request = $crud->makePayment($s_id, $amount, $date);

    if($request) 
        return true;
    else
        return false;
}
?>