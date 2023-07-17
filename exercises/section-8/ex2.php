<?php
// 2. Hàm tính tổng số nguyên tố từ 2 đến $n ($n >= 2)
/*CHECKLIST:
B1: Viết hàm kiểm tra số nguyên tố
B2: Viết hàm tính tổng số nguyên tố từ 2 -> $n
B3: Kiểm tra số nhập vào có >= 2 hay không
    B2.1: Có -> Tính tổng và xuất ra
    B2.2: Không -> Thông báo
B4: Kết luận và Kết thúc
*/

function check_prime($n){
    for($i = 2; $i <= sqrt($n); $i++){
        if($n % $i == 0)
            return false;
    }
    return true;
}

function sum_prime($n){
    $res = 0;
    for($i = 2; $i <= $n; $i++){
        if(check_prime($i))
            $res += $i;
    }
    return $res;
}

$n = 2000000; 

if($n >= 2){
    echo sum_prime($n);
}else
    echo "Nhập số >= 2";

?>