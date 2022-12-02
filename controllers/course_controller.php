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

function addMajor($name) {
    $crud = new Course_class;
    $request = $crud->addMajor($name);

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
        $posts = array();
        while($record = $crud->fetch()){
            $posts[] = $record;
        }
        return $posts;
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

function getCourseOnly($id) {
    $crud = new Course_class;
    $request = $crud->getCourseOnly($id);

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

function getCoursesAndTutors() {
    $crud = new Course_class;
    $request = $crud->getCoursesAndTutors();

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

function checkCourse($name) {
    $crud = new Course_class;
    $request = $crud->checkCourse($name);

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

function getCoursesByMajor($name) {
    $crud = new Course_class;
    $request = $crud->getCoursesByMajor($name);

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

function getMajors() {
    $crud = new Course_class;
    $request = $crud->getMajors();

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

function getMajor($id) {
    $crud = new Course_class;
    $request = $crud->getMajor($id);

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

function updateMajor($id, $name) {
    $crud = new Course_class;
    $request = $crud->updateMajor($id, $name);

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

function removeMajor($id) {
    $crud = new Course_class;
    $request = $crud->removeMajor($id);

    if($request) 
        return true;
    else
        return false;
}
?>