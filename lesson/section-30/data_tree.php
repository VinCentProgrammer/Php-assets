<?php


function show_array($data)
{
    if (is_array($data)) {
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}


$data = array(
    1 => array(
        'cat_id' => 1,
        'cat_title' => 'Thể thao',
        'parent_id' => 0
    ),
    2 => array(
        'cat_id' => 2,
        'cat_title' => 'Kinh doanh',
        'parent_id' => 0
    ),
    3 => array(
        'cat_id' => 3,
        'cat_title' => 'Châu Á',
        'parent_id' => 1
    ),
    4 => array(
        'cat_id' => 4,
        'cat_title' => 'Châu Âu',
        'parent_id' => 1
    ),
    5 => array(
        'cat_id' => 5,
        'cat_title' => 'Bất động sản',
        'parent_id' => 2
    ),
    6 => array(
        'cat_id' => 6,
        'cat_title' => 'Nội thất',
        'parent_id' => 2
    ),
    7 => array(
        'cat_id' => 7,
        'cat_title' => 'Việt Nam',
        'parent_id' => 3
    ),
    8 => array(
        'cat_id' => 8,
        'cat_title' => 'Trung Quốc',
        'parent_id' => 3
    ),
);


function has_child($data, $cat_id)
{
    foreach ($data as $v) {
        if ($v['parent_id'] == $cat_id)
            return true;
    }
    return false;
}

function data_tree($data, $parent_id = 0, $level = 0)
{
    $result = array();
    foreach ($data as $v) {
        if ($v['parent_id'] == $parent_id) {
            $v['level'] = $level;
            $result[] = $v;
            if (has_child($data, $v['cat_id'])) {
                $result_child = data_tree($data, $v['cat_id'], $level + 1);
                $result = array_merge($result, $result_child);
            }
        }
    }
    return $result;
}

// show_array(data_tree($data, 0));

$result = data_tree($data);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Xuat du lieu da cap trong website</title>
</head>

<body>
    <style>
        #wrapper {
            width: 960px;
            margin: 0px auto;
            margin-top: 50px;
        }
    </style>
    <div id="wrapper">
        <table class="table w-50">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Ten danh muc</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $tmp = 0;
                foreach ($result as $item) {
                    $tmp++;
                ?>
                    <tr>
                        <th scope="row"><?php echo $tmp; ?></th>
                        <td><?php echo str_repeat('|---', $item['level']) . $item['cat_title']; ?></td>
                    </tr>
                <?php
                }

                ?>

            </tbody>
        </table>
    </div>

</body>

</html>