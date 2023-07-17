
<?php
session_start();
ob_start();
// Database
require "db/config.php";
require "db/database.php";
// Data
require "data/users.php";
//Libarary
require "lib/template.php";
require "lib/data.php";
require "lib/url.php";
require "lib/validation.php";
require "lib/users.php";

db_connect($config);
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

