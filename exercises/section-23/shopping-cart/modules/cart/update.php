<?php
if(isset($_POST['btn_update_cart'])){
    update_number_cart($_POST['qty']);
    redirect_to('?mod=cart&act=show');
}

?>