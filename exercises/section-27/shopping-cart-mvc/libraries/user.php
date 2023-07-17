<?php
session_start();
function form_error($label_field)
{
    global $error;
    if (!empty($error[$label_field]))
        return "<p class = 'error'>{$error[$label_field]}</p>";
}


function set_value($label_field)
{
    global $$label_field;
    if (!empty($$label_field))
        return $$label_field;
    return false;
}

function is_cookie_login()
{
    if (!empty($_COOKIE['is_login']))
        return true;
    return false;
}

function is_login()
{
    if (!empty($_SESSION)) {
        if ($_SESSION['is_login'])
            return true;
    }
    return false;
}

function get_info_user_login($info_user = 'username')
{
    $user = db_fetch_row("SELECT * FROM `tbl_users` WHERE `username` = '{$_SESSION['user_login']}'");
    // show_array($user);
    return $user[$info_user];
}
?>