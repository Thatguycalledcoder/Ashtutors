<?php
//connect to the user account class
require dirname (__FILE__)."/../classes/tutor_class.php";

//--INSERT--//
function registerTutor($fname, $lname, $email, $password, $country, $year, $major, $contact, $user_role) {
    $crud = new Tutor_class;
    $request = $crud->registerTutor($fname, $lname, $email, $password, $country, $year, $major, $contact, $user_role);

    if($request) 
        return true;
    else
        return false;
}

function registerTutorCourse($tutor_id, $course_id, $rate) {
    $crud = new Tutor_class;
    $request = $crud->registerTutorCourse($tutor_id, $course_id, $rate);

    if($request) 
        return true;
    else
        return false;
}

function registerTutorAvailableBookings($tutor_id, $bookday_id, $starttime, $endtime) {
    $crud = new Tutor_class;
    $request = $crud->registerTutorAvailableBookings($tutor_id, $bookday_id, $starttime, $endtime);

    if($request) 
        return true;
    else
        return false;
}

//--SELECT--//
function checkEmailTutor($email) {
    $crud = new Tutor_class;
    $request = $crud->checkEmailTutor($email);

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

function validateLoginTutor($email, $password) {
    $crud = new Tutor_class;
    $request = $crud->validateLoginTutor($email, $password);

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

function validateForgotTutor($email, $year, $num) {
    $crud = new Tutor_class;
    $request = $crud->validateForgotTutor($email, $year, $num);

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

function getTutors() {
    $crud = new Tutor_class;
    $request = $crud->getTutors();

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

function getAvailableTutors() {
    $crud = new Tutor_class;
    $request = $crud->getAvailableTutors();

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

function getAvailableTutorsByCourse($course_id) {
    $crud = new Tutor_class;
    $request = $crud->getAvailableTutorsByCourse($course_id);

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

function getSelectedTutor($tutor_id) {
    $crud = new Tutor_class;
    $request = $crud->getSelectedTutor($tutor_id);

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

function getSearchedTutors($major, $year, $country) {
    $crud = new Tutor_class;
    $request = $crud->getSearchedTutors($major, $year, $country);

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

function getTutorDetails($tutor_id) {
    $crud = new Tutor_class;
    $request = $crud->getTutorDetails($tutor_id);

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

function getTutorAvailableDays($tutor_id) {
    $crud = new Tutor_class;
    $request = $crud->getTutorAvailableDays($tutor_id);

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


function getTutorCourses($tutor_id) {
    $crud = new Tutor_class;
    $request = $crud->getTutorCourses($tutor_id);

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

function getTutorAvailability($tutor_id) {
    $crud = new Tutor_class;
    $request = $crud->getTutorAvailability($tutor_id);

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
function updateTutorInfo($id, $fname, $lname, $email, $country, $year, $major, $contact) {
    $crud = new Tutor_class;
    $request = $crud->updateTutorInfo($id, $fname, $lname, $email, $country, $year, $major, $contact);

    if($request) 
        return true;
    else
        return false;
}

function updateTutorPassword($id, $password) {
    $crud = new Tutor_class;
    $request = $crud->updateTutorPassword($id, $password);

    if($request) 
        return true;
    else
        return false;
}

function updateTutorImage($id, $image) {
    $crud = new Tutor_class;
    $request = $crud->updateTutorImage($id, $image);

    if($request) 
        return true;
    else
        return false;
}

function updateAvailability($id, $avail) {
    $crud = new Tutor_class;
    $request = $crud->updateAvailability($id, $avail);

    if($request) 
        return true;
    else
        return false;
}

function updateTutorCourse($tutor_id, $course_id, $new_course, $rate) {
    $crud = new Tutor_class;
    $request = $crud->updateTutorCourse($tutor_id, $course_id, $new_course, $rate);

    if($request) 
        return true;
    else
        return false;
}

function updateTutorBookDay($tutor_id, $bookday_id, $starttime, $endtime) {
    $crud = new Tutor_class;
    $request = $crud->updateTutorBookDay($tutor_id, $bookday_id, $starttime, $endtime);

    if($request) 
        return true;
    else
        return false;
}

function updateTutorBookTime($tutor_id, $booktime) {
    $crud = new Tutor_class;
    $request = $crud->updateTutorBookTime($tutor_id, $booktime);

    if($request) 
        return true;
    else
        return false;
}

//--DELETE--//
function removeTutorCourse($tutor_id, $course_id) {
    $crud = new Tutor_class;
    $request = $crud->removeTutorCourse($tutor_id, $course_id);

    if($request) 
        return true;
    else
        return false;
}

function removeTutorBookDay($tutor_id, $bookday_id) {
    $crud = new Tutor_class;
    $request = $crud->removeTutorBookDay($tutor_id, $bookday_id);

    if($request) 
        return true;
    else
        return false;
}

function removeTutorBookTime($tutor_id, $booktime) {
    $crud = new Tutor_class;
    $request = $crud->removeTutorBookTime($tutor_id, $booktime);

    if($request) 
        return true;
    else
        return false;
}
?>