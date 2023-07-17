<?php
//xu li cap nhat gio hang bang ajax
$id = (int)$_POST['id'];
$num_order = $_POST['num_order'];


//cap nhat so luong cho san pham
$_SESSION['cart']['buy'][$id]['qty'] = $num_order;

$_SESSION['cart']['buy'][$id]['sub_total'] = $num_order * $_SESSION['cart']['buy'][$id]['price'];
$sub_total = $_SESSION['cart']['buy'][$id]['sub_total'];

update_cart();

$total = get_total_cart();

//Tra va sub_total va total
$result = array(
    'sub_total' => currency_format($sub_total),
    'total' => currency_format($total)
);


echo json_encode($result);
