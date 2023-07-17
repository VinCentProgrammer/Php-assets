<?php

$id = (int)$_GET['id'];

add_cart($id);


redirect_to('?mod=cart&act=show');