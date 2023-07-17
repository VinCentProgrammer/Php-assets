<?php
#array_key_exists

// $list_key = array('first' => 1, 'second' => 2, 'third' => 3);

// if(array_key_exists('second', $list_key)){
//     echo "second exists";
// }

#array_merge

$list_odd = array(1, 3, 5, 7, 9);
$list_even = array(2, 4, 6, 8, 10);
$list_prime = array(2, 3, 5, 7, 11);

$res = array_merge($list_even, $list_odd, $list_prime);

// echo "<pre>";
// print_r($res);
// echo "</pre>";


#count

// echo count($res);

#in_array

// echo in_array(11, $res);

#is_array

$my_var = 10;
// echo is_array($my_var);

#array_values

// $array = array("size" => "XL", "color" => "gold");
// print_r(array_values($array));

#array_search

$array = array(0 => 'blue', 1 => 'red', 2 => 'green', 3 => 'red');

$key = array_search('green', $array); // $key = 2;
echo $key . "<br>";
$key = array_search('red', $array);   // $key = 1;
echo $key . "<br>";


?>