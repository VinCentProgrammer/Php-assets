<?php

function construct()
{
    load_model('index');
}

function show_info_saleAction()
{
    $num_rows = get_num_rows_product_ordered();
    //Số lượng bản ghi trên mỗi trang 
    $num_per_page = 4;
    $total_row = $num_rows;
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $list_product_ordered = get_list_product_ordered($start, $num_per_page, "");
    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['list_product_ordered'] = $list_product_ordered;
    load_view('show_info_sale', $data);
}
function show_info_clientAction()
{
    $id = (int)$_GET['id'];
    $info_client = get_client_by_id($id);
    $data['info_client'] = $info_client;
    load_view('show_info_client', $data);
}
function show_info_clientsAction()
{
    $num_rows = get_num_rows_client();
    //Số lượng bản ghi trên mỗi trang 
    $num_per_page = 4;
    $total_row = $num_rows;
    $num_page = ceil($total_row / $num_per_page);
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    //Điểm xuất phát
    $start = ($page - 1) * $num_per_page;

    $clients = get_list_client($start, $num_per_page, "");
    $data['num_page'] = $num_page;
    $data['page'] = $page;
    $data['clients'] = $clients;

    load_view('show_info_clients', $data);
}
function show_info_productAction()
{
    $id_client = (int)$_GET['id_client'];
    $products_ordered = get_products_ordered_by_id_client($id_client);
    $client = get_client_by_id($id_client);
    $data['products_ordered'] = $products_ordered;
    $data['client'] = $client;
    load_view('show_info_product', $data);
}
