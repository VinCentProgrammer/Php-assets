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
function is_remember_me()
{
    if (!empty($_COOKIE['is_login']) && $_COOKIE['is_login'])
        return true;
    return false;
}


function show_gender($gender)
{
    $show_gender = array(
        'male' => 'Nam',
        'female' => 'Nữ'
    );
    if (array_key_exists($gender, $show_gender))
        return $show_gender[$gender];
    return false;
}

function get_users($start = 0, $num_per_page = 5, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    return db_fetch_array("SELECT * FROM `tbl_users` {$where} LIMIT {$start}, {$num_per_page}");
}

function get_pagging($num_page, $page, $base_url)
{
    $str_pagging = "<ul id='pagging'>";
    if ($page > 1) {
        $page_prev = $page - 1;
        $str_pagging .= "<li><a href='{$base_url}&page={$page_prev}'>Prev</a></li>";
    }
    for ($i = 1; $i <= $num_page; $i++) {
        $active = "";
        if($page == $i)
            $active = "class = 'active'";
        $str_pagging .= "<li><a {$active} href='{$base_url}&page={$i}'>{$i}</a></li>";
    }
    if ($page < $num_page) {
        $page_next = $page + 1;
        $str_pagging .= "<li><a href='{$base_url}&page={$page_next}'>Next</a></li>";
    }
    $str_pagging .= "</ul>";
    return $str_pagging;
}
