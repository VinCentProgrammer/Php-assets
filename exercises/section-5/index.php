<?php
//CHECKLIST:
/*
1. Tạo số nguyên a
2. Kiểm tra a có phải là số nguyên dương chẵn hay không?
    2.1. Có -> Cộng a thêm 1 đơn vị
    2.2. Xuất kết quả cho người dùng
*/

$a = 20;
if($a >= 0 && $a % 2 == 0){
    $a++;
    echo $a;
}

?>