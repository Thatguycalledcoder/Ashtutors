<?php
//connect to the user account class
require dirname (__FILE__)."/../classes/booking_class.php";

//--INSERT--//
function addBooking($s_id, $t_id, $hours, $time, $date) {
    $crud = new Booking_class;
    $request = $crud->addBooking($s_id, $t_id, $hours, $time, $date);

    if($request) 
        return true;
    else
        return false;
}


//--SELECT--//
function getBookings($s_id) {
    $crud = new Booking_class;
    $request = $crud->getBookings($s_id);

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

function getBooking($s_id, $t_id) {
    $crud = new Booking_class;
    $request = $crud->getBooking($s_id, $t_id);

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