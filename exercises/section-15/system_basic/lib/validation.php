<?php

function form_error($label_field){
    global $error;
    if(!empty($error[$label_field])) 
        return "<p class = 'error'>{$error[$label_field]}</p>";
}


function set_value($label_field){
    global $$label_field;
    if(!empty($$label_field)) 
        return $$label_field;
}
?>