<?php
function check_login($username, $password)
{
    // echo $username . '--' . $password;
    $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}'";
    $check = db_num_rows($sql);
    if ($check > 0)
        return true;
    return false;
}

function check_email($email)
{
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}'");
    if ($check > 0)
        return true;
    return false;
}

function add_reset_token($data, $email)
{
    db_update("tbl_users", $data, "`email` = '{$email}'");
}

function check_reset_token($reset_token)
{
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_token` = '{$reset_token}'");
    if ($check > 0)
        return true;
    return false;
}

function update_pass_new($data, $reset_token)
{
    db_update("tbl_users", $data, "`reset_token` = '{$reset_token}'");
}

function user_exist($username, $email)
{
    $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$username}' OR `email` = '{$email}'";
    return db_fetch_array($sql);
}

function add_user($data)
{
    db_insert("tbl_users", $data);
}

function get_info_admin()
{
    $sql = "SELECT * FROM `tbl_users` WHERE `role` LIKE '%Admin%'";
    return db_fetch_row($sql);
}

function update_info($data, $where = "")
{
    if (empty($where))
        $where = "`role` LIKE '%admin%'";
    else
        $where = $where;
    db_update('tbl_users', $data, $where);
}

function pass_old_exists($pass_old)
{
    $sql = "SELECT * FROM `tbl_users` WHERE `password` = '{$pass_old}'";
    if (!empty(db_fetch_row($sql)))
        return true;
    return false;
}

function get_info_user_by_id($id)
{
    $sql = "SELECT * FROM `tbl_users` WHERE `id` = '{$id}'";
    return db_fetch_row($sql);
}

function get_num_rows_users()
{
    return db_num_rows("SELECT * FROM `tbl_users`");
}

function get_users($start = 0, $num_per_page = 5, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    return db_fetch_array("SELECT * FROM `tbl_users` {$where} LIMIT {$start}, {$num_per_page}");
}
