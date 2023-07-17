<?php
/*CHECKLIST:
1. Chuẩn bị dữ liệu mảng đã xử lí
2. Tạo cấu trúc HTML
3. Kiểm tra dữ liệu
4. Đổ dữ liệu lên HTML

*/
#1. Nhúng dữ liệu mảng 1 chiều
$list_prime = array(2, 3, 5, 7, 11);

#2. Nhúng dữ liệu mảng 2 chiều

$list_user = array(
    1 => array(
        'id' => 1,
        'fullname' => 'Hà Văn Dũng',
        'email' => 'dungken2112@gmail.com'
    ),
    2 => array(
        'id' => 2,
        'fullname' => 'Hà Thanh Hùng',
        'email' => 'thanhhung@gmail.com'
    ),
    3 => array(
        'id' => 3,
        'fullname' => 'Hà Thị Mỹ Dung',
        'email' => 'mydung@gmail.com'
    ),
    4 => array(
        'id' => 4,
        'fullname' => 'Hà Thị Thanh Bích',
        'email' => 'thanhbich@gmail.com'
    ),
);

function show_data($data){
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Embed Data For HTML</title>
</head>
<body>
    <h2>Nhúng dữ liệu mảng 1 chiều</h2>
    <?php 
        if(!empty($list_prime)){
            ?>
            <table border="1" style="width: 200px; text-align: center">
                <caption>Danh sách số nguyên tố</caption>
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Số nguyên tố</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $tmp = 0;
                        foreach($list_prime as $prime){
                            $tmp++;
                            ?>
                                <tr>
                                    <td><?php echo $tmp; ?></td>
                                    <td><?php echo $prime; ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
            <?php
        }else echo "Danh sách số nguyên tố hiện tại không tồn tại!";
    ?>
    
    <?php
        if(!empty($list_user)){
            ?>
                <table border="1" style="width: 400px; text-align: center; margin-top: 30px;">
                    <caption>Danh sách thành viên</caption>
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Id</th>
                            <th>Họ và Tên</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $temp = 0;
                            foreach($list_user as $user){
                                $temp++;
                                ?>
                                    <tr>
                                        <td><?php echo $temp; ?></td>
                                        <td><?php echo $user['id']; ?></td>
                                        <td><?php echo $user['fullname']; ?></td>
                                        <td><?php echo $user['email']; ?></td>
                                    </tr>
                                <?php
                            }
                        ?>
                        
                    </tbody>
                </table>
            <?php
        }else echo "Danh sách thành viên hiện tại không tồn tại!!!";
    ?>
</body>
</html>