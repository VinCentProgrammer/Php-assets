<?php
function get_product_by_id($id)
{
    $sql = "SELECT * FROM `tbl_product` WHERE `id` = {$id}";
    return db_fetch_row($sql);
}

