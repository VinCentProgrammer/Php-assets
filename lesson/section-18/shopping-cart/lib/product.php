<?php
function get_info_cat($cat_id){
    global $list_product_cat;
    if(array_key_exists($cat_id, $list_product_cat))
        return $list_product_cat[$cat_id];
    return false;
}


function get_products($cat_id){
    global $list_product;
    $res = array();// arr list product by cat id
    foreach($list_product as $product){
        if($product['cat_id'] == $cat_id){
            $product['url'] = "?mod=product&act=detail&id={$product['id']}";
            $res[] = $product;
        }
    }
    return $res;
}

function get_product($id){
    global $list_product;
    if(array_key_exists($id, $list_product))
        $list_product[$id]['url_add_cart'] = "?mod=cart&act=add&id={$id}";
        return $list_product[$id];
    return false;
}