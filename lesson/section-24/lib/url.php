<?php

function redirect_to($path = '?page=home'){
    header("location: {$path}");
}
