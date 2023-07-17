<?php 

function update_pass_new($data, $reset_token){
    db_update("tbl_users", $data, "`reset_token` = '{$reset_token}'");
}
function check_reset_token($reset_token){
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `reset_token` = '{$reset_token}'");
    if($check > 0)
        return true;
    return false;
}

function add_reset_token($data, $email){
    db_update("tbl_users", $data, "`email` = '{$email}'");
}
function check_email($email){
    $check = db_num_rows("SELECT * FROM `tbl_users` WHERE `email` = '{$email}'");
    if($check > 0)
        return true;
    return false;
}

function user_exist($username, $email){
    $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$username}' OR `email` = '{$email}'";
    return db_fetch_array($sql);
}

function add_user($data){
    db_insert("tbl_users", $data);
}

function is_active($active_token){
    $sql = "SELECT * FROM `tbl_users` WHERE `active_token` = '{$active_token}' AND `is_active` = '0'";
    if(db_fetch_row($sql)){
        db_update("tbl_users", array('is_active' => 1), "`active_token` = '{$active_token}'");
        return true;
    }
    return false;
}

function check_login($username, $password){
    $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}'";
    return db_num_rows($sql);
}