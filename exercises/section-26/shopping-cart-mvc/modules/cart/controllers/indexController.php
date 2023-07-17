<?php

function construct(){
    load_model('index');
}

function indexAction(){
    load_view('index');
}

function addAction(){
    $id = (int)$_GET['id'];
    $product_item = get_product_by_id($id);
    $data['product_item'] = $product_item;
    $data['id'] = $id;
    load_view('add', $data);
}

function deleteAction(){
    $id = (int)$_GET['id'];
    $data['id'] = $id;
    load_view('delete', $data);
}

function checkoutAction(){
    load_view('checkout');
}

function confirmBuyAction(){
    load_view('confirmBuy');
}

function updateAction(){
    load_view('update');
}
?>