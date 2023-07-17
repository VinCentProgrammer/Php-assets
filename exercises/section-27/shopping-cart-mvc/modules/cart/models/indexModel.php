<?php
function get_product_by_id($id)
{
    $sql = "SELECT * FROM `tbl_product` WHERE `id` = {$id}";
    return db_fetch_row($sql);
}

function get_info_cat_by_cat_id($cat_id){
    $sql = "SELECT * FROM `tbl_product_cat` WHERE `cat_id` = {$cat_id}";
    return db_fetch_row($sql);
}