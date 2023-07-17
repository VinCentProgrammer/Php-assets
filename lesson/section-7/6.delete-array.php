<?php
#1. Xóa phần tử mảng 1 chiều
$user = array(
    'id' => 1,
    'fullname' => 'Hà Văn Dung',
    'email' => 'dungken2112@gmail.com',
    'website' => 'dungdev.com'
);
// echo "<pre>";
// print_r($user);
// echo "</pre>";
//Xóa phần tử website
unset($user['website']);

// echo "<pre>";
// print_r($user);
// echo "</pre>";

#2. Xóa phần tử mảng đa chiều

$list_user = array(
    1 => array(
        'id' => 1,
        'fullname' => 'Hà Văn Dũng',
        'email' => 'dungken2112@gmail.com',
        'website' => 'dungdev.com'
    ),
    2 => array(
        'id' => 2,
        'fullname' => 'Hà Thanh Hùng',
        'email' => 'thanhhung@gmail.com'
    ),
);
echo "<pre>";
print_r($list_user);
echo "</pre>";
//Xóa phần tử số 2 trong mảng list_user
unset($list_user[2]);
echo "<pre>";
print_r($list_user);
echo "</pre>";
//Xóa phần tử website của pt số 1 trong mảng list_user
unset($list_user[1]['website']);
echo "<pre>";
print_r($list_user);
echo "</pre>";
#3. Xóa mảng

//Xóa luôn mảng list_user
unset($list_user);
echo "<pre>";
print_r($list_user);
echo "</pre>";
?>