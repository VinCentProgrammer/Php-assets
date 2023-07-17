<?php

$id = (int)$_GET['id'];
// echo $id;

delete_cart($id);

redirect_to("?mod=cart&act=show");
// show_array($_SESSION['cart']);

?>