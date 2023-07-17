<?php

function add_cat($data)
{
    if (!empty($data))
        db_insert("tbl_post_cat", $data);
}
function add_post($data)
{
    if (!empty($data))
        db_insert("tbl_posts", $data);
}

function get_list_cat()
{
    $sql = "SELECT * FROM `tbl_post_cat`";
    return db_fetch_array($sql);
}

function get_num_rows_post()
{
    return db_num_rows("SELECT * FROM `tbl_posts`");
}
function get_num_rows_cat()
{
    return db_num_rows("SELECT * FROM `tbl_post_cat`");
}


function get_posts($start = 0, $num_per_page = 5, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    return db_fetch_array("SELECT * FROM `tbl_posts` {$where} LIMIT {$start}, {$num_per_page}");
}

function get_cats($start = 0, $num_per_page = 5, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    return db_fetch_array("SELECT * FROM `tbl_post_cat` {$where} LIMIT {$start}, {$num_per_page}");
}

function get_post_by_id($id)
{
    $sql = "SELECT * FROM `tbl_posts` WHERE `id` = {$id}";
    return db_fetch_row($sql);
}


function edit_post($data, $id)
{
    db_update("tbl_posts", $data, "`id` = {$id}");
}

function delete_post($id)
{
    db_delete("tbl_posts", "`id` = {$id}");
}
