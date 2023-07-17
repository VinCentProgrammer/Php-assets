<?php
function get_list_user(){
    $res = db_fetch_array("SELECT * FROM `tbl_users`");
    return $res;
}


function get_user($id){
    $item = db_fetch_row("SELECT * FROM `tbl_users` WHERE `user_id` = {$id}");
    return $item;
}
?>