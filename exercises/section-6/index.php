<?php
/*CHECKLIST:
1. Làm bài tập 1
    1.1. Nhập n >= 2
    1.2. Tạo biến lưu tổng
    1.3. Dùng vòng lặp tính tổng dồn (nếu nó là số chẵn)
2. Làm bài tập 2
    2.1. Nhập n >= 3
    2.2. Tạo biến lưu tổng
    2.3. Dùng vòng lặp tính tổng dồn (nếu nó là số chia hết cho 3)
3. Làm bài tập 3
    3.1. Nhập n >= 1
    3.2. Tạo biến lưu tổng
    3.3. Dùng vòng lặp tính tổng dồn
4. Làm bài tập 4
    4.1. Nhập hệ số a, b, c
    4.2. Kiểm tra a có khác 0 hay không?
        4.2.1. Có => Đến bước 4.3
        4.2.2. Không => Giải phương trình bậc 1
    4.3. Tính delta
    4.4. Kiểm tra delta ? 0
        4.4.1. == 0 -> Phương trình có nghiệm kép
        4.4.1. < 0 -> Phương trình vô nghiệm
        4.4.1. > 0 -> Phương trình có 2 nghiệm phân biệt

*/

#Bài tập 1: 

// $n = 1;
// if($n >= 2){
//     $total = 0;
//     for($i = 1; $i <= $n; $i++){
//         if($i % 2 == 0)
//             $total += $i;
//     }

//     echo $total;
// }else echo "n phải >= 2";

#Bài tập 2: 
// $n = 10;
// if($n >= 3){
//     $res = 0;
//     for($i = 1; $i <= $n; $i++){
//         if($i % 3 == 0)
//             $res += 1 / $i;
//     }
//     echo $res;
// }else echo "n phải >= 3";   

#Bài tập 3: 
// $n = 2;
// if($n >= 1){
//     $res = 0;
//     for($i = 1; $i <= $n; $i++){
//         $res = $i / ($i + 1);
//     }
//     echo $res;
// }else echo "n phải >= 1";

#Bài tập 4: 
$a = -1;
$b = 7;
$c = 6;

if($a == 0){
    $res = -$c / $b;
    echo "Nghiem cua phuong trinh la: {$res}";
}else{
    $delta = pow($b, 2) - (4 * $a * $c);
    if($delta < 0) 
        echo "Phuong trinh vo nghiem";
    else if($delta == 0) {
        $res = -$b / (2 * $a);
        echo "Phuong trinh co nghiem kep x1 = x2 = {$res}";
    }else{
        $x1 = (-$b + sqrt($delta)) / 2 * $a;
        $x2 = (-$b - sqrt($delta)) / 2 * $a;
        echo "Phuong trinh co 2 nghiem phan biet la x1 = {$x1}, x2 = {$x2}";
    }
}
?>