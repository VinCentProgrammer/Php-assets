<?php

function construct(){
    // echo "Dung chung, load dau tien!";
    load_model('index');
}

function loginAction(){
    load_view('index');
    //Xu li dang nhap

}

function logoutAction(){
    //logout
    load_view('logout');
}


?>