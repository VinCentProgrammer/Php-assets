<?php

function is_cart()
{
    if (!empty($_SESSION['cart']))
        return true;
    return false;
}

function is_product($id)
{
    if (is_cart()) {
        foreach ($_SESSION['cart']['buy'] as $product) {
            if ($product['id'] == $id) {
                return true;
            }
        }
        return false;
    }
}


function update_cart()
{
    $num_order = 0;
    $total = 0;

    foreach ($_SESSION['cart']['buy'] as $item) {
        $num_order += $item['product_qty'];
        $total += $item['product_sub_total'];
    }
    $_SESSION['cart']['checkout'] = array(
        'num_order' => $num_order,
        'total' => $total
    );
}


function add_cart($id)
{

    $product = get_product($id);

    $info_product = array(
        'id' => $product['id'],
        'product_title' => $product['product_title'],
        'product_thumb' => $product['product_thumb'],
        'product_price' => $product['product_price'],
        'product_code' => $product['product_code'],
        'product_qty' => 1,
        'product_sub_total' => $product['product_price']
    );
    // show_array($info_product);

    if (is_cart()) {
        if (array_key_exists($id, $_SESSION['cart']['buy'])) {
            // echo $_SESSION['cart']['buy'][$id]['product_qty'];
            $_SESSION['cart']['buy'][$id]['product_qty'] += 1;
            $_SESSION['cart']['buy'][$id]['product_sub_total'] += $product['product_price'];
            update_cart();
            // $_SESSION['cart']['buy'][$id] = $info_product;
        } else {
            $_SESSION['cart']['buy'][$id] = $info_product;
            update_cart();
        }
    } else {
        $_SESSION['cart']['buy'][$id] = $info_product;
        update_cart();
    }
}

function get_cart_buy()
{
    if (is_cart())
        return $_SESSION['cart']['buy'];
    return false;
}

function get_total_cart()
{
    if (is_cart())
        return $_SESSION['cart']['checkout']['total'];
    return false;
}

function get_num_order()
{
    if (is_cart())
        return $_SESSION['cart']['checkout']['num_order'];
    return false;
}

function delete_cart($id = '')
{
    if (is_cart()) {
        if (!empty($id)) {
            unset($_SESSION['cart']['buy'][$id]);
            update_cart();
        }else{
            unset($_SESSION['cart']);
        }
    }
}


function update_number_cart($qty){
    foreach($qty as $id => $qty_new){
        $_SESSION['cart']['buy'][$id]['product_qty'] = $qty_new;
        $_SESSION['cart']['buy'][$id]['product_sub_total'] = $qty_new * $_SESSION['cart']['buy'][$id]['product_price'];
    }
    update_cart();
}