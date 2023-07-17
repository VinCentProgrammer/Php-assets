
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

// show_array($_SESSION);

$page = !empty($_GET['page']) ? $_GET['page'] : 'home';
$path = "pages/{$page}.php";

if (!is_login() && $page != 'login') {
    redirect_to('?page=login');
}

if (file_exists($path)) {
    require $path;
} else
    get_404();


?>

