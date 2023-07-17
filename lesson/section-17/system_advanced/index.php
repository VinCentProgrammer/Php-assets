
<?php
session_start();
ob_start();
require "data/users.php";
require "lib/template.php";
require "lib/data.php";
require "lib/url.php";
require "lib/validation.php";
require "lib/users.php";

?>


<?php

if(!empty($_COOKIE['is_login']) && $_COOKIE['is_login']){
    $_SESSION['is_login'] = $_COOKIE['is_login'];
    $_SESSION['user_login'] = $_COOKIE['user_login'];
}

$mod = !empty($_GET['mod']) ? $_GET['mod'] : 'home';
$act = !empty($_GET['act']) ? $_GET['act'] : 'main';

$path = "modules/$mod/$act.php";


if(file_exists($path)){
    require $path;
}else get_404();


if (!is_login() && $mod != 'user' && $act != 'login') {
    redirect_to('?mod=user&act=login');
}

?>

