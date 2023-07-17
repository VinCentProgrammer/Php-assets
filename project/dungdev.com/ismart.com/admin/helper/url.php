<?php

function base_url($url = "") {
    global $config;
    return $config['base_url'].$url;
}

function redirect_to($path = '?mod=users&controller=team&action=index'){
    header("location: {$path}");
}
