<?php

function get_list_cat()
{
    $sql = "SELECT * FROM `tbl_product_cat`";
    return db_fetch_array($sql);
}
function add_cat($data)
{
    if (!empty($data))
        db_insert("tbl_product_cat", $data);
}
function add_product($data)
{
    if (!empty($data))
        return db_insert("tbl_products", $data);
}

function  add_file_relate_product($id_product, $upload_file_relate)
{
    $data = array(
        'img_id' => $id_product,
        'path_img_relate' => $upload_file_relate
    );
    db_insert("tbl_path_img_relate_product", $data);
}

function get_path_img_relate_by_img_id($img_id)
{
    if (isset($img_id)) {
        $sql = "SELECT * FROM `tbl_path_img_relate_product` WHERE `img_id` = {$img_id}";
        return db_fetch_array($sql);
    }
}
function get_list_img_relate()
{
    $sql = "SELECT * FROM `tbl_path_img_relate_product`";
    return db_fetch_array($sql);
}

function get_num_rows_img_relate()
{
    return db_num_rows("SELECT * FROM `tbl_path_img_relate_product`");
}
function get_num_rows_product()
{
    return db_num_rows("SELECT * FROM `tbl_products`");
}

function get_list_imgs_relate($start = 0, $num_per_page = 5, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    return db_fetch_array("SELECT * FROM `tbl_path_img_relate_product` {$where} LIMIT {$start}, {$num_per_page}");
}
function get_list_product($start = 0, $num_per_page = 5, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    return db_fetch_array("SELECT * FROM `tbl_products` {$where} LIMIT {$start}, {$num_per_page}");
}

function get_product_by_id($id)
{
    $sql = "SELECT * FROM `tbl_products` WHERE `id` = {$id}";
    return db_fetch_row($sql);
}

function get_cat_product_by_cat_id($cat_id)
{
    $sql = "SELECT * FROM `tbl_product_cat` WHERE `id` = {$cat_id}";
    return db_fetch_row($sql);
}

function edit_product($data, $id)
{
    db_update("tbl_products", $data, "`id` = {$id}");
}

function edit_file_relate_product($upload_file_relate_new, $upload_file_relate_old, $id)
{
    $data = array(
        'path_img_relate' => $upload_file_relate_new
    );
    db_update("tbl_path_img_relate_product", $data, "`img_id` = {$id} AND `path_img_relate` = '{$upload_file_relate_new}'");
}

function delete_product($id)
{
    db_delete("tbl_products", "`id` = {$id}");
}

function delete_list_img_relate_by_id($id)
{
    if (isset($id))
        db_delete('tbl_path_img_relate_product', "`img_id` = {$id}");
}
