<?php
#1. Thêm phần tử với key xác định
$user = array(
    'id' => 1,
    'fullname' => 'Hà Văn Dũng',
    'email' => 'dungken2112@gmail.com'
);
echo "<pre>";
print_r($user);
echo "</pre>";
//Lưu thêm số điện thoại
$user['phone'] = '0327250461';
echo "<pre>";
print_r($user);
echo "</pre>";
#2. Thêm phần tử với key mặc định

$list_prime = [2, 3, 5, 7];
echo "<pre>";
print_r($list_prime);
echo "</pre>";
//Lưu thêm số nguyên tố 11
$list_prime[] = 11;
echo "<pre>";
print_r($list_prime);
echo "</pre>";
?>