<?php
function get_list_product(){
    $sql = "SELECT * FROM `tbl_product`";
    return db_fetch_array($sql);
}
function get_list_product_cat(){
    $sql = "SELECT * FROM `tbl_product_cat`";
    return db_fetch_array($sql);
}

function get_list_product_by_cat_id($cat_id){
    $sql = "SELECT * FROM `tbl_product` WHERE `cat_id` = {$cat_id}";
    return db_fetch_array($sql);
}


?>