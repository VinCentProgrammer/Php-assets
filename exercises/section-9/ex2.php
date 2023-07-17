
<?php
/*
2. Xuất một mảng số nguyên chẵn từ một mảng số nguyên cho trước.
CHECKLIST:
B1: Chuẩn bị 1 mảng số nguyên
B2: Khởi tạo mảng $list_even để lưu số nguyên chẵn.
B3: Viết hàm kiểm tra số nguyên chẵn
B4: Duyệt mảng ban đầu và kết hợp vs hàm kiểm tra số nguyên chẵn
B5: Lưu số nguyên vào mảng khởi tạo ban đầu
B6: Viết hàm xuất mảng
B7: Xuất mảng 
B8; Kết thúc

*/

$list_number = array(1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15);

$list_even = array();

function check_even($k){
    return $k % 2 == 0;
}

if(!empty($list_number) && is_array($list_number)){
    foreach($list_number as $value){
        if(check_even($value))
            $list_even[] = $value;
    }   
}

function show_array($data){
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}


show_array($list_even);


?>