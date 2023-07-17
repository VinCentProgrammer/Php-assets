<?php
/*
2. Xây dựng hàm gọi giao diện 
- get-header();
- get-footer();
*/

function get_header($path){
    if(file_exists($path)){
        require "$path";
    }else
        echo "Đường dẫn không tồn tại!";
}
function get_footer($path){
    if(file_exists($path)){
        require "$path";
    }else
        echo "Đường dẫn không tồn tại!";
}

?>