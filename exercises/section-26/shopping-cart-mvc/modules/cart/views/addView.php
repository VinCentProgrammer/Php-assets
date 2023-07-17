<?php
// show_array($product_item);

if (!empty($_POST['btn_add'])) {
    $qty = $_POST['num_order'];

    $_SESSION['cart']['buy'][$id] = array(
        'id' => $product_item['id'],
        'thumb' => $product_item['product_thumb'],
        'title' => $product_item['product_title'],
        'code' => $product_item['product_code'],
        'price' => $product_item['product_price'],
        'qty' => $qty,
        'sub_total' => $product_item['product_price'] * $qty,
    );

    update_cart();

    // show_array($_SESSION['cart']);
    redirect_to("?mod=cart");
}
