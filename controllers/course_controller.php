<?php
//connect to the user account class
require dirname (__FILE__)."/../classes/course_class.php";

//--INSERT--//
function addCourse($name, $dept) {
    $crud = new Course_class;
    $request = $crud->addCourse($name, $dept);

    if($request) 
        return true;
    else
        return false;
}


//--SELECT--//
function getCourses() {
    $crud = new Course_class;
    $request = $crud->getCourses();

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

function getCourse($id) {
    $crud = new Course_class;
    $request = $crud->getCourse($id);

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

function checkCourse($name) {
    $crud = new Course_class;
    $request = $crud->checkCourse($name);

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
function updateCourse($id, $name, $dept) {
    $crud = new Course_class;
    $request = $crud->updateCourse($id, $name, $dept);

    if($request) 
        return true;
    else
        return false;
}


//--DELETE--//
function removeCourse($id) {
    $crud = new Course_class;
    $request = $crud->removeCourse($id);

    if($request) 
        return true;
    else
        return false;
}
?>