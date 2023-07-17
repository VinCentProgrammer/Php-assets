<?php
// Check login?
function is_login()
{
    // show_array($_SESSION);
    if (!empty($_SESSION['is_login'])) {
        if ($_SESSION['is_login'])
            return true;
        return false;
    }
}

function is_cookie_login()
{
    if (!empty($_COOKIE['is_login']))
        return true;
    return false;
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
function is_remember_me()
{
    if (!empty($_COOKIE['is_login']) && $_COOKIE['is_login'])
        return true;
    return false;
}

function get_num_user($where)
{
    if (empty($where)) {
        $where = "SELECT * FROM `tbl_users`";
    } else {
        $where = "SELECT * FROM `tbl_users` WHERE {$where}";
    }
    return db_num_rows($where);
}

function get_user_admin($field_name)
{
    $sql = "SELECT * FROM `tbl_users` WHERE `role` = 'Admin'";
    $info = db_fetch_row($sql);
    return $info[$field_name];
}
