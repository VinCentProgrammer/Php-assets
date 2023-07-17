<?php
//1. Tạo mảng lưu các số lẻ từ 3 -> 150
/*
B1: Tạo mảng rỗng lưu trữ
B2: Sử dụng vòng lặp thêm phần tử số lẻ từ 3 -> 150 vào mảng
B3: Xuất mảng các số lẻ & kiểm tra
B4: Kết luận
*/

function show_array($data){
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}


$list_odd = array();
for($i = 3; $i <= 150; $i += 2){
    $list_odd[] = $i;
}

show_array($list_odd);


?>