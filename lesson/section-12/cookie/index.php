<?php
ob_start();
session_start();

echo "Day la trang chu" . "<br>";

if(!empty($_COOKIE['is_login'])){
    print_r($_COOKIE);
}

echo "<br>";

if(!isset($_SESSION['is_login'])){
    header('location: login.php');
}else 
    print_r($_SESSION);


?>
<br> 
<a href="logout.php">Logout</a>
