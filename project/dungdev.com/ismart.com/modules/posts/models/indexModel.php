<?php

function get_posts()
{
    $sql = "SELECT * FROM `tbl_posts`";
    return db_fetch_array($sql);
}

function get_post_by_id($id)
{
    $sql = "SELECT * FROM `tbl_posts` WHERE `id` = {$id}";
    return db_fetch_row($sql);
}
