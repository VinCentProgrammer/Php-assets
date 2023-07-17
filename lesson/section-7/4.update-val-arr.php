<?php
$user = array(
    'id' => 1,
    'fullname' => 'Hà Văn Dung',
    'email' => 'dungken2112@gmail.com'
);
echo "<pre>";
print_r($user);
echo "</pre>";
//Cập nhật lại fullname
$user['fullname'] = 'Hà Văn Dũng';
echo "<pre>";
print_r($user);
echo "</pre>";
?>