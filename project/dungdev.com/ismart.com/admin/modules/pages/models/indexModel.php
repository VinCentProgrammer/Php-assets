<?php
function add_page($data)
{
    if (!empty($data))
        db_insert("tbl_pages", $data);
}


function get_num_rows_pages()
{
    return db_num_rows("SELECT * FROM `tbl_pages`");
}

function get_pages($start = 0, $num_per_page = 5, $where = "")
{
    if (!empty($where)) {
        $where = "WHERE $where";
    }
    return db_fetch_array("SELECT * FROM `tbl_pages` {$where} LIMIT {$start}, {$num_per_page}");
}