<?php
//====================
//KIEU DU LIEU BOOLEAN
//====================

$n = 10;

if($n % 2 == 0){ // true | false
    echo "{$n} la so chan";
}

function check($n){
    if($n % 2 == 0)
        return true;
    return false;
}

$check = check(4);



?>