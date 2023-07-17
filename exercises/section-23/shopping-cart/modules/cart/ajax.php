<?php
$id = (int)$_POST['id'];
$num_order = $_POST['num_order'];

if(is_cart() && $_SESSION['cart']['buy']){
    $_SESSION['cart']['buy'][$id]['product_qty'] = $num_order;
    
    $sub_total = $num_order * $_SESSION['cart']['buy'][$id]['product_price'];
    $_SESSION['cart']['buy'][$id]['product_sub_total'] = $sub_total;

    update_cart();

    $total = get_total_cart();

    $num = get_num_order();

    $res = array(
        'num' => $num,
        'id' => $id,
        'sub_total' => currency_format($sub_total),
        'total' => currency_format($total)
    );

    echo json_encode($res);   
}



?>