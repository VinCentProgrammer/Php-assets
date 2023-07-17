<?php

function construct(){
    load_model('index');
}

function indexAction(){
    $cat_id = (int)$_GET['cat_id'];
    $products = get_list_product_by_cat_id($cat_id);
    $info_cat = get_info_cat_by_cat_id($cat_id);
    $data['products'] = $products;
    $data['info_cat'] = $info_cat;
    load_view('index', $data);
}

function detailAction(){
    $id = (int)$_GET['id'];
    $product = get_product_by_id($id);
    $data['product'] = $product;
    load_view('detail', $data);
}


?>