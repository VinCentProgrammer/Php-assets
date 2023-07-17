<?php
// Check login?
function is_login()
{
    // show_array($_SESSION);
    if (!empty($_SESSION)) {
        if ($_SESSION['is_login'])
            return true;
        return false;
    }
}


function check_login($username, $password)
{
    global $list_user;
    foreach ($list_user as $user) {
        if ($username == $user['username'] && $password == $user['password']) {
            return true;
        }
    }
    return false;
    // show_array($list_user);
}

//Get info user => return value field name enter
function get_info($info, $user_login)
{
    global $list_user;
    foreach ($list_user as $user) {
        if ($user['username'] == $user_login) {
            if (array_key_exists($info, $user)) {
                return $user[$info];
            } else
                echo "Field info user invalid!";
        }
    }
    return false;
    // show_array($list_user);
}


//check user tick remember me
function is_remember_me(){
    if(!empty($_COOKIE['is_login']) && $_COOKIE['is_login'])
        return true;
    return false;
}