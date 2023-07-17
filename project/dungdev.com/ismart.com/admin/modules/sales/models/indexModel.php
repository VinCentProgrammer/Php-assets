<?php
function get_products_ordered()
{
    $sql = "SELECT * FROM `tbl_cart`";
    return db_fetch_array($sql);
}
function get_clients()
{
    $sql = "SELECT * FROM `tbl_clients`";
    return db_fetch_array($sql);
}

function get_num_rows_product_ordered()
{
    return db_num_rows("SELECT * FROM `tbl_cart`");
}
function get_list_product_ordered($start = 0, $num_per_page = 5, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    return db_fetch_array("SELECT * FROM `tbl_cart` {$where} LIMIT {$start}, {$num_per_page}");
}
function get_num_rows_client()
{
    return db_num_rows("SELECT * FROM `tbl_clients`");
}
function get_list_client($start = 0, $num_per_page = 5, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    return db_fetch_array("SELECT * FROM `tbl_clients` {$where} LIMIT {$start}, {$num_per_page}");
}

function get_client_by_id($id)
{
    $sql = "SELECT * FROM `tbl_clients` WHERE `id` = {$id}";
    return db_fetch_row($sql);
}

function get_products_ordered_by_id_client($id_client)
{
    $sql = "SELECT * FROM `tbl_cart` WHERE `id_client` = {$id_client}";
    return db_fetch_array($sql);
}
