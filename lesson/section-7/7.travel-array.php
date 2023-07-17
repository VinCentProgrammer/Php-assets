<?php
#1. Duyệt mảng 1 chiều
// $list_prime = array(2, 3, 5, 7);
// $res = 0;
// foreach($list_prime as $key => $val){
//     echo "{$key} => {$val}" . "<br>";
//     $res += $val;
// }
// echo "Tổng các số nguyên tố từ 1 -> 10: T = {$res}";
#2. Duyệt mảng đa chiều

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

foreach($list_user as $user){
    echo $user['id'] . "<br>";
    echo $user['fullname'] . "<br>";
    echo $user['email'] . "<br>";
    echo "--------------------------------" . "<br>";
}

?>