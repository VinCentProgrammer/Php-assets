<?php

function currency_format($number, $unit = "VND"){
    return number_format($number).$unit;
}


?>