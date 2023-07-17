<?php

function get_page_by_id($id)
{
    $sql = "SELECT * FROM `tbl_pages` WHERE `id` = {$id}";
    return db_fetch_row($sql);
}
