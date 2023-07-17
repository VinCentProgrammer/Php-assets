<?php

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

?>