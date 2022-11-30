const form = $("#form");
const fname = $("#floatingInputFirst");
const lname = $("#floatingInputLast");
const email = $("#floatingEmail");
const major = $("#floatingMajor");
const country = $("#floatingCountry");
const contact = $("#floatingNumber");
const password = $("#floatingPassword");
const conf_pass = $("#floatingConfirm");
const btn = $("#subbtn");

const checkContactInput = (input) => {
    var contact_regex = /[^0-9]+$/;
    if (contact_regex.test(input.val()) == false) {
        return true;
    }
    return false;
} 

const checkEmailInput = (input) => {
    var email_regex = /^[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*@[a-zA-Z0-9]+(?:\.[a-zA-Z0-9]+)*$/;
    if (email_regex.test(input.val()) == true) {
        return true;
    }
    return false;
} 

const matchingPassword = (input1, input2) => {
    if (input1.val() === input2.val())
        return true;   
    return false;
}

const validateRegisterStudent = (e) => {
    e.preventDefault();
    if (checkContactInput(contact) && checkEmailInput(email) && matchingPassword(password, conf_pass)) {
        $.ajax({
            url: "registerprocess.php", // server url
            type: 'POST', //POST or GET 
            async: false,
            data: {
                stud_fname: fname.val(),
                stud_lname: lname.val(),
                stud_email: email.val(),
                stud_country: country.val(),
                stud_major: major.val(),
                stud_num: contact.val(),
                stud_pass: password.val(),
                stud_confpass: conf_pass.val(),
                register_student: "register_student"
            }, // data to send in ajax format or querystring format
            datatype: 'json',
            beforeSend: function() {
              
            },
            success: function() {
                // return data in callback
            },
     
            complete: function(response) {
                if (response == "success") {
                    location.replace("login.php");
                }
                else {
                    location.replace("register.php");
                }
            },
     
            error: function(xhr, status, error) {
                alert(xhr.responseText); // error occur 
            }    
        });
        return true;
    }
    else {
        return false;
    }
}

const validateRegisterTutor = (e) => {
    e.preventDefault();
    if (checkContactInput(contact) && checkEmailInput(email) && matchingPassword(password, conf_pass)) {
        $.ajax({
            url: "registerprocess.php", // server url
            type: 'POST', //POST or GET 
            async: false,
            data: {
                tutor_fname: fname.val(),
                tutor_lname: fname.val(),
                tutor_email: email.val(),
                tutor_country: country.val(),
                tutor_major: major.val(),
                tutor_num: contact.val(),
                tutor_pass: password.val(),
                tutor_confpass: conf_pass.val(),
                register_tutor: "register_tutor"
            }, // data to send in ajax format or querystring format
            datatype: 'json',
            beforeSend: function() {
              
            },
            success: function() {
                // return data in callback
            },
     
            complete: function(response) {
                if (response == "success") {
                    location.replace("logintutor.php");
                }
                else {
                    location.replace("replacetutor.php");
                }
            },
     
            error: function(xhr, status, error) {
                alert(xhr.responseText); // error occur 
            }
     
        });
        return true;
    }
    else {
        return false;
    }
}

const validateLoginStudent = (e) => {
    e.preventDefault();
    if (checkEmailInput(email)) {
        $.ajax({
            url: "loginprocess.php", // server url
            type: 'POST', //POST or GET 
            async: false,
            data: {
                stud_email: email.val(),
                stud_pass: password.val(),
                login_student: "login_student"
            }, // data to send in ajax format or querystring format
            datatype: 'json',
            beforeSend: function() {
                // do some loading options
            },
            success: function(response) {
                // return data in callback
            },
     
            complete: function(response) {
                console.log(response)
                if (response == "success") {
                    location.replace("../index.php");
                }
                else {
                    // location.replace("login.php");
                }
            },
     
            error: function(xhr, status, error) {
                alert(xhr.responseText); // error occur 
            }
     
        });
        return true;
    }
    else {
        return false;
    }
}

const validateLoginTutor = (e) => {
    e.preventDefault();
    if (checkEmailInput(email)) {
        $.ajax({
            url: "loginprocess.php", // server url
            type: 'POST', //POST or GET 
            async: false,
            data: {
                tutor_email: email.val(),
                tutor_password: password.val(),
                login_tutor: "login_tutor"
            }, // data to send in ajax format or querystring format
            datatype: 'json',
            beforeSend: function() {
                // do some loading options
            },
            success: function() {
                // return data in callback
            },
     
            complete: function(response) {
                if (response) {
                    location.replace("../view/tutor/index.php");
                }
                else {
                    location.replace("logintutor.php");
                }
            },
     
            error: function(xhr, status, error) {
                alert(xhr.responseText); // error occur 
            }
     
        });
        return true;
    }
    else {
        return false;
    }
}