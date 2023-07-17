<?php
ob_start();
//1. Xây dựng hàm chuyển hướng redirect_to()
function redirect_to($path){
    if(file_exists($path))
        header("location: {$path}");
    else
        echo "Đường dẫn không tồn tại!";
}


?>