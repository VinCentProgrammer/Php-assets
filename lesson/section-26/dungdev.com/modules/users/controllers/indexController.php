<?php

function construct(){
    // echo "Dung chung, load dau tien!";
    load_model('index');
}

function indexAction(){
    load('helper', 'format');
    // echo "Hien thi danh sach thanh vien!";
    $list_user = get_list_user();
    // $a = 10;
    // show_array($list_user);
    $data['list_user'] = $list_user;
    // $data['a'] = $a;
    load_view('index', $data);
}

function addAction(){
    // echo "Them thanh vien";
}


function editAction(){
    $id = (int)$_GET['id'];
    $item = get_user($id);
    show_array($item);
}


?>