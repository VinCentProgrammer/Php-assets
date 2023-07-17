<?php
//validation fullname
function is_fullname($fullname){
    $pattern = "/^[A-Za-z ]{6,32}$/";
    if(!preg_match($pattern, $fullname, $matchs))
        return false;
    return true;
}

//validation username
function is_username($username){
    $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if(!preg_match($pattern, $username, $matchs))
        return false;
    return true;
}
//validation password

function is_password($password){
    $pattern = "/^([A-Z]{1}([\w_\.!@#$%^&*()]+){5,31})$/";
    if(!preg_match($pattern, $password, $matchs))
        return false;
    return true;
}


//validation phone
function is_phone($phone){
    $pattern = "/^(84|0[3|5|7|8|9])+([0-9]{8})$/";
    if(!preg_match($pattern, $phone, $matchs))
        return false;
    return true;
}


//form_error
function form_error($label_field){
    global $error;
    if(!empty($error[$label_field])) 
        return "<p class = 'error'>{$error[$label_field]}</p>";
}

//set_value
function set_value($label_field){
    global $$label_field;
    if(!empty($$label_field)) 
        return $$label_field;
}


?>