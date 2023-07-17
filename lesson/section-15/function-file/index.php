<?php
#file_exists

$file_url = '../upload-file/uploads/ads.png';
// if(file_exists($file_url)){
//     echo "File tồn tại";
// }else
//     echo "File không tồn tại";

#copy
// if(copy($file_url, '../upload-file/uploads/ads-2.png'))
//     echo "Copy thành công";
// else
//     echo "Copy không thành công";

#file_size

echo filesize($file_url);
?>