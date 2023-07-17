<?php
#1. Biến cục bộ

#2. Biến toàn cầu
$a = 10;
$b = 20;
function sum(){
    // global $a, $b;
    // return $a + $b;

    return $GLOBALS['a'] + $GLOBALS['b'];
}
echo sum();
?>