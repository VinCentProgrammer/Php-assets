<?php
function check_login($username, $password){
    $sql = "SELECT * FROM `tbl_users` WHERE `username` = '{$username}' AND `password` = '{$password}'";
    return db_num_rows($sql);
}
