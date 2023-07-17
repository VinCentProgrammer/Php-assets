<?php

#1. Hàm có 1 tham số
//Hàm kiểm 1 số nguyên có phải là số chẵn hay không?
// function check_even($n){
//     if($n % 2 == 0)
//         echo "{$n} là số chẵn";
// }
// check_even(4);

#2. Hàm có 2 tham số

//Tạo hàm tính tổng 2 số
// function sum($a, $b){
//     return $a + $b;
// }

// echo sum(4, 5);
#3. Hàm có tham số tùy biến

//Tạo hàm tính tổng nhiều số
// function sum_multi(){
//     //func_num_args(): Lấy số lượng đối số được truyền vào hàm
//     //func_get_arg(k): Lấy giá trị của tham số theo index (k)
//     //func_get_args(): Lấy mảng tham số

//     $res = 0;
//     $list_number = func_get_args();
//     foreach($list_number as $val){
//         $res += $val;
//     }
//     return $res;
// }
// echo sum_multi(2, 4, 10, 20, 30, 10);

#4. Tạo input bằng hàm
function show_array($data){
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
//Tạo input: <input type = 'text' name = 'username' value = '' id = 'form_input' class = 'input_text' />
function create_input_text($name, $val, $option = array()){
    $name = $name;
    $value = $val;
    // echo $value;
    if(!empty($option)){
        $id = $option['id'];
        $class = $option['class'];
    }
    return "<input type = 'text' name = '{$name}' value = '$value' id = '$id' class = '$class' />";
}
echo create_input_text('username', '', $option = array('id' => 'form_input', 'class' => 'input_text'));



?>