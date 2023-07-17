<?php 

function add_slide($data){
    if(!empty($data))
        db_insert("tbl_slides", $data);
}

function get_num_rows_slide()
{
    return db_num_rows("SELECT * FROM `tbl_slides`");
}

function get_list_slide($start = 0, $num_per_page = 5, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    return db_fetch_array("SELECT * FROM `tbl_slides` {$where} LIMIT {$start}, {$num_per_page}");
}

function get_slide_by_id($id)
{
    $sql = "SELECT * FROM `tbl_slides` WHERE `id` = {$id}";
    return db_fetch_row($sql);
}

function edit_slide($data, $id)
{
    db_update("tbl_slides", $data, "`id` = {$id}");
}

function delete_slide($id)
{
    db_delete("tbl_slides", "`id` = {$id}");
}
