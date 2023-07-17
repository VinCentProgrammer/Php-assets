
<?php
/*
3. Hiển thị mảng danh mục theo đa cấp
Giáo dục
-- Khuyến học
-- Du học
Thể thao
-- Châu Âu
-- Châu Á
CHECKLIST:
B1: Chuẩn bị mảng danh mục
- cat_id
- cat_name
- level
B2: Duyệt mảng và xuất danh mục theo đa cấp (sử dụng hàm str_repeat)
B3: Test
B4: Kết thúc

*/

$list_cat = array(
    1 => array(
        'cat_id' => 1,
        'cat_name' => 'Giáo dục',
        'level' => 0
    ),
    2 => array(
        'cat_id' => 2,
        'cat_name' => 'Khuyến học',
        'level' => 1
    ),
    3 => array(
        'cat_id' => 3,
        'cat_name' => 'Du học',
        'level' => 1
    ),
    4 => array(
        'cat_id' => 4,
        'cat_name' => 'Thể thao',
        'level' => 0
    ),
    5 => array(
        'cat_id' => 5,
        'cat_name' => 'Châu Á',
        'level' => 1
    ),
    6 => array(
        'cat_id' => 6,
        'cat_name' => 'Châu Âu',
        'level' => 1
    ),
    7 => array(
        'cat_id' => 7,
        'cat_name' => 'Thiết bị di động',
        'level' => 0
    ),
    8 => array(
        'cat_id' => 8,
        'cat_name' => 'Lap top',
        'level' => 1
    ),
    9 => array(
        'cat_id' => 9,
        'cat_name' => 'Acer',
        'level' => 2
    ),
    10 => array(
        'cat_id' => 10,
        'cat_name' => 'Điện thoại',
        'level' => 1
    )
);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị danh mục theo đa cấp</title>
</head>
<body>
    <?php
        if(!empty($list_cat) && is_array($list_cat)){
            ?>
                <table border="1" style="width: 300px;">
                    <caption>Hiển thị danh mục</caption>
                    <thead style="text-align: center;">
                        <tr>
                            <th>STT</th>
                            <th>Tên danh mục</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: left;">
                    <?php
                    $temp = 0;
                        foreach($list_cat as $item){
                            $temp++;
                            ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $temp; ?></td>
                                    <td><?php echo str_repeat('---', $item['level']) . $item['cat_name']; ?></td>
                                </tr>
                            <?php
                        }
                    ?>
                    </tbody>
                </table>
            <?php
        }else echo "<p style = 'color: red;'>Hiện tại không có dữ liệu nào!!!</p>"
    ?>
</body>
</html>