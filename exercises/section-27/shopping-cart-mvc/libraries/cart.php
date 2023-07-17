<?php
function is_cart()
{
    if (!empty($_SESSION['cart']['buy']))
        return true;
    return false;
}

function update_cart()
{
    $num_order = 0;
    $total = 0;
    if (is_cart()) {
        foreach ($_SESSION['cart']['buy'] as $item) {
            $num_order += $item['qty'];
            $total += $item['sub_total'];
        }
    }

    $_SESSION['cart']['checkout']['num_order'] = $num_order;
    $_SESSION['cart']['checkout']['total'] = $total;
}


function get_cart_buy()
{
    if (is_cart()) {
        return $_SESSION['cart']['buy'];
    }
}

function get_total_cart()
{
    if (is_cart()) {
        return $_SESSION['cart']['checkout']['total'];
    }
}
function get_num_order()
{
    if (is_cart())
        return $_SESSION['cart']['checkout']['num_order'];
    return false;
}

function delete_cart($id = '')
{
    if (!empty($id)) {
        unset($_SESSION['cart']['buy'][$id]);
        update_cart();
    } else unset($_SESSION['cart']);
}
