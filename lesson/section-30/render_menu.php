<?php


$data = array(
    1 => array(
        'cat_id' => 1,
        'cat_title' => 'Thể thao',
        'parent_id' => 0,
        'url' => '#'
    ),
    2 => array(
        'cat_id' => 2,
        'cat_title' => 'Kinh doanh',
        'parent_id' => 0,
        'url' => '#'
    ),
    3 => array(
        'cat_id' => 3,
        'cat_title' => 'Châu Á',
        'parent_id' => 1,
        'url' => '#'
    ),
    4 => array(
        'cat_id' => 4,
        'cat_title' => 'Châu Âu',
        'parent_id' => 1,
        'url' => '#'
    ),
    5 => array(
        'cat_id' => 5,
        'cat_title' => 'Bất động sản',
        'parent_id' => 2,
        'url' => '#'
    ),
    6 => array(
        'cat_id' => 6,
        'cat_title' => 'Nội thất',
        'parent_id' => 2,
        'url' => '#'
    ),
    7 => array(
        'cat_id' => 7,
        'cat_title' => 'Việt Nam',
        'parent_id' => 3,
        'url' => '#'
    ),
    8 => array(
        'cat_id' => 8,
        'cat_title' => 'Trung Quốc',
        'parent_id' => 3,
        'url' => '#'
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

function render_menu($data, $parent_id = 0, $level = 0)
{
    if ($level == 0)
        $res = "<ul id='main-menu'>";
    else
        $res = "<ul class='sub-menu'>";
    foreach ($data as $v) {
        if ($v['parent_id'] == $parent_id) {
            $res .= "<li>";
            $res .= "<a href='{$v['url']}'>{$v['cat_title']}</a>";
            if (has_child($data, $v['cat_id'])) {
                $res .= render_menu($data, $v['cat_id'], $level + 1);
            }
            $res .= "</li>";
        }
    }
    $res .= "</ul>";
    return $res;
}

echo render_menu($data);

?>



<!-- <ul id="main-menu">
    <li><a href="#">Main menu 1</a></li>
    <li><a href="#">Main menu 2</a>
        <ul class="sub-menu">
            <li><a href="#">Main menu 3</a></li>
            <li><a href="#">Main menu 4</a></li>
        </ul>
    </li>
    <li><a href="#">Main menu 3</a></li>
    <li><a href="#">Main menu 4</a></li>
</ul> -->