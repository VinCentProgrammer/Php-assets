<?php

#1. Tạo mảng rỗng
$error = array();
$error['username'] = 'Bạn không được để trống tên đăng nhập!';

#2. Tạo mảng với key mặc định
$list_even = array(2, 4, 6, 8, 10);
$list_odd = array(0 => 1, 1 => 3, 2 => 5, 3 => 7, 4 => 9);

#3. Tạo mảng với key xác định
$user = array(
    'id' => 1,
    'fullname' => 'Hà Văn Dũng',
    'email' => 'dungken2112@gmail.com'
);

echo "<pre>";
print_r($user);
echo "</pre>";


?>