<?php
#Luu tru thong tin users
/*
- Id user: id
- Họ và Tên: fullname
- Tên đăng nhập: username
- Mật khẩu: password
- Email: email
*/

$list_user = array(
    1 => array(
        'id' => 1,
        'fullname' => 'Hà Văn Dũng',
        'username' => 'dungken2112',
        'password' => md5('Dungken@!!@'),
        'email' => 'dungken2112@gmail.com'
    ),
    2 => array(
        'id' => 2,
        'fullname' => 'Hà Thanh Hùng',
        'username' => 'thanhhung',
        'password' => md5('Thanhhung@!!@'),
        'email' => 'thanhhung@gmail.com'
    ),
    3 => array(
        'id' => 3,
        'fullname' => 'Hà Thị Mỹ Dung',
        'username' => 'mydung2009',
        'password' => md5('Mydung2009@!!@'),
        'email' => 'mydung2009@gmail.com'
    ),
);


?>