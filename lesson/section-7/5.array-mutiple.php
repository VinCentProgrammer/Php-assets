<?php
#1. Thêm phần tử vào mảng đa chiều
$list_user = array(
    1 => array(
        'id' => 1,
        'fullname' => 'Hà Văn Dũng',
        'email' => 'dungken2112@gmail.com'
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
//Thêm user
/*
id: 3
fullname: Hà Thị Mỹ Dung
email: mydung@gmail.com

*/

// $list_user[3] = array(
//     'id' => 3,
//     'fullname' => 'Hà Thị Mỹ Dung',
//     'email' => 'mydung@gmail.com'
// );

$list_user[3]['id'] = 3;
$list_user[3]['fullname'] = 'Hà Thị Mỹ Dung';
$list_user[3]['email'] = 'mydung@gmail.com';


echo "<pre>";
print_r($list_user);
echo "</pre>";

#2. Lấy phần tử của mảng đa chiều

$info = $list_user[3];

// echo "<pre>";
// print_r($info);
// echo "</pre>";

// echo $info['fullname'];

echo $list_user[3]['fullname'];

?>