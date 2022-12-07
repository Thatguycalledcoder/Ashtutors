<?php
//connect to the user account class
require dirname (__FILE__)."/../classes/student_class.php";

//--INSERT--//
function registerStudent($fname, $lname, $email, $password, $country, $year, $major, $contact, $user_role) {
    $crud = new Student_class;
    $request = $crud->registerStudent($fname, $lname, $email, $password, $country, $year, $major, $contact, $user_role);

    if($request) 
        return true;
    else
        return false;
}


//--SELECT--//
function checkEmailStudent($email) {
    $crud = new Student_class;
    $request = $crud->checkEmailStudent($email);

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

function validateLoginStudent($email, $password) {
    $crud = new Student_class;
    $request = $crud->validateLoginStudent($email, $password);

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

function validateForgotStudent($email, $year, $num) {
    $crud = new Student_class;
    $request = $crud->validateForgotStudent($email, $year, $num);

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

function getStudentDetails($student_id) {
    $crud = new Student_class;
    $request = $crud->getStudentDetails($student_id);

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
function updateStudentInfo($id, $fname, $lname, $email, $country, $year, $major, $contact) {
    $crud = new Student_class;
    $request = $crud->updateStudentInfo($id, $fname, $lname, $email, $country, $year, $major, $contact);

    if($request) 
        return true;
    else
        return false;
}

function updateStudentPassword($id, $password) {
    $crud = new Student_class;
    $request = $crud->updateStudentPassword($id, $password);

    if($request) 
        return true;
    else
        return false;
}

function updateStudentImage($id, $image) {
    $crud = new Student_class;
    $request = $crud->updateStudentImage($id, $image);

    if($request) 
        return true;
    else
        return false;
}
?>