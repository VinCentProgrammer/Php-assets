<?php
#Xóa file trong hệ thống
$file_url = 'uploads/logo.png';
if(@unlink($file_url)){
    echo "Xóa file: {$file_url} thành công!";
}else
    echo "Xóa file: {$file_url} không thành công";
    
?>