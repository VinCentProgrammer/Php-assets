<!DOCTYPE html>
<html>
    <head>
        <title>Quản lý ISMART</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="public/css/bootstrap/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/bootstrap/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/reset.css" rel="stylesheet" type="text/css"/>
        <link href="public/css/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
        <link href="public/style.css" rel="stylesheet" type="text/css"/>
        <link href="public/responsive.css" rel="stylesheet" type="text/css"/>

        <script src="public/js/jquery-2.2.4.min.js" type="text/javascript"></script>
        <script src="public/js/bootstrap/bootstrap.min.js" type="text/javascript"></script>
        <script src="public/js/plugins/ckeditor/ckeditor.js" type="text/javascript"></script>
        <script src="public/js/main.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="site">
            <div id="container">
                <div id="header-wp">
                    <div class="wp-inner clearfix">
                        <a href="<?php echo base_url('?mod=users&controller=team&action=index'); ?>" title="" id="logo" class="fl-left">ADMIN</a>
                        <ul id="main-menu" class="fl-left">
                            <li>
                                <a href="<?php echo base_url('?mod=pages&action=index'); ?>" title="">Trang</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=pages&action=add" title="">Thêm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=pages&action=index" title="">Danh sách trang</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?mod=posts&action=show_list_post" title="">Bài viết</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=posts&action=add_post" title="">Thêm bài viết mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=posts&action=add_cat" title="">Thêm danh mục mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=posts&action=show_list_post" title="">Danh sách bài viết</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=posts&action=show_list_cat" title="">Danh mục bài viết</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?mod=products&action=show_products" title="">Sản phẩm</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=products&action=add_product" title="">Thêm sản phẩm mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=products&action=add_cat" title="">Thêm danh mục mới</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=products&action=show_products" title="">Danh sách sản phẩm</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=products&action=show_cat_product" title="">Danh sách danh mục</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=products&action=show_img_relate" title="">Hình ảnh liên quan</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?mod=sales&action=show_info_sale" title="">Bán hàng</a>
                                <ul class="sub-menu">
                                    <li>
                                        <a href="?mod=sales&action=show_info_sale" title="">Danh sách đơn hàng</a> 
                                    </li>
                                    <li>
                                        <a href="?mod=sales&action=show_info_clients" title="">Danh sách khách hàng</a> 
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="?page=menu" title="">Menu</a>
                            </li>
                        </ul>
                        <div id="dropdown-user" class="dropdown dropdown-extended fl-right">
                            <button class="dropdown-toggle clearfix" type="button"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                <div id="thumb-circle" class="fl-left">
                                    <img src="public/images/img-admin.png">
                                </div>
                                <h3 id="account" class="fl-right"><?php echo get_user_admin('fullname'); ?></h3>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="<?php echo base_url('?mod=users&controller=team&action=index'); ?>" title="Thông tin cá nhân">Thông tin tài khoản</a></li>
                                <li><a href="<?php echo base_url('?mod=users&controller=index&action=logout'); ?>" title="Thoát">Thoát</a></li>
                            </ul>
                        </div>
                    </div>
                </div>