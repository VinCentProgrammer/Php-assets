<?php 

function is_username($username){
    $pattern = "/^[A-Za-z0-9_\.]{6,32}$/";
    if(!preg_match($pattern, $username, $matchs))
        return false;
    return true;
}


function is_password($password){
    $pattern = "/^([A-Z]{1}([\w_\.!@#$%^&*()]+){5,31})$/";
    if(!preg_match($pattern, $password, $matchs))
        return false;
    return true;
}

function is_email($email){
    $pattern = "/^[A-Za-z0-9_.]{6,32}@([a-zA-Z0-9]{2,12})(.[a-zA-Z]{2,12})+$/";
    if(!preg_match($pattern, $email, $matchs))
        return false;
    return true;
}
function is_phone_number($tel){
    $pattern = "/^(84|0[3|5|7|8|9])+([0-9]{8})$/";
    if(!preg_match($pattern, $tel, $matchs))
        return false;
    return true;
}

function is_price($price){
    $pattern = "/[0-9]/";
    if(!preg_match($pattern, $price, $matchs))
        return false;
    return true;
}
function is_order($order){
    $pattern = "/[1-9]/";
    if(!preg_match($pattern, $order, $matchs))
        return false;
    return true;
}



function form_error($label_field, $id = ''){
    global $error;
    if(!empty($error[$label_field])) 
        return "<p id = '{$id}' class = 'error'>{$error[$label_field]}</p>";
}


function set_value($label_field){
    global $$label_field;
    if(!empty($$label_field)) 
        return $$label_field;
    return false;
}

?>