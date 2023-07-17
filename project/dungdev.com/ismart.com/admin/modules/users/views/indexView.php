<?php
get_header();
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="<?php echo base_url('?mod=users&controller=team&action=index') ?>" title="">Hiển thị thành viên</a>
                </li>
                <li>
                    <a href="<?php echo base_url('?mod=users&controller=team&action=add') ?>" title="">Thêm mới thành viên</a>
                </li>
                <li>
                    <a href="<?php echo base_url('?mod=users&controller=team&action=update') ?>" title="">Chỉnh sửa thông tin</a>
                </li>
                <li>
                    <a href="<?php echo base_url('?mod=users&controller=team&action=change_pass') ?>" title="">Thay đổi mật khẩu</a>
                </li>
                <li>
                    <a href="<?php echo base_url('?mod=users&controller=team&action=index') ?>" title="">Thoát</a>
                </li>
            </ul>
        </div>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Danh sách thành viên</h3>
                    <a href="<?php echo base_url('?mod=users&controller=team&action=add') ?>" title="" id="add-new" class="fl-left">Thêm mới thành viên</a>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php
                if (!empty($users)) {
                ?>
                    <div class="section-detail">
                        <div class="filter-wp clearfix">
                            <ul class="post-status fl-left">
                                <li class="all"><a href="">Tất cả thành viên<span class="count">(<?php echo get_num_user(''); ?>)</span></a> |</li>
                                <li class="admin"><a href="">Thành viên quản trị<span class="count">(<?php echo get_num_user("`role` = 'Admin'"); ?>)</span></a> |</li>
                                <li class="manager"><a href="">Thành viên quản lí<span class="count">(<?php echo get_num_user("`role` = 'Manager'"); ?>)</span></a></li>
                            </ul>
                        </div>
                        <div class="table-responsive">
                            <table class="table list-table-wp">
                                <thead>
                                    <tr>
                                        <td><span class="thead-text">STT</span></td>
                                        <td><span class="thead-text">Tên đăng nhập</span></td>
                                        <td><span class="thead-text">Email</span></td>
                                        <td><span class="thead-text">Họ và Tên</span></td>
                                        <td><span class="thead-text">Số điện thoại</span></td>
                                        <td><span class="thead-text">Giới tính</span></td>
                                        <td><span class="thead-text">Tuổi</span></td>
                                        <td><span class="thead-text">Địa chỉ</span></td>
                                        <td><span class="thead-text">Vai trò</span></td>
                                        <td><span class="thead-text">Thời gian</span></td>
                                        <td><span class="thead-text">Tác vụ</span></td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tmp = 0;
                                    $gender = array(
                                        'male' => 'Nam',
                                        'female' => 'Nữ'
                                    );
                                    foreach ($users as $user) {
                                        $tmp++;
                                    ?>
                                        <tr>
                                            <td><span class="tbody-text"><?php echo $tmp; ?></h3></span>
                                            <td><span class="tbody-text"><?php echo $user['username']; ?></h3></span>
                                            <td><span class="tbody-text"><?php echo $user['email']; ?></span></td>
                                            <td><span class="tbody-text"><?php if (!empty($user['fullname'])) echo $user['fullname'];
                                                                            else echo "--"; ?></span></td>
                                            <td><span class="tbody-text"><?php if (!empty($user['phone_numbers'])) echo $user['phone_numbers'];
                                                                            else echo "--"; ?></span></td>
                                            <td><span class="tbody-text"><?php if (!empty($user['gender'])) echo $gender[$user['gender']];
                                                                            else echo "--"; ?></span></td>
                                            <td><span class="tbody-text"><?php if (!empty($user['age'])) echo $user['age'];
                                                                            else echo "--"; ?></span></td>
                                            <td><span class="tbody-text"><?php if (!empty($user['address'])) echo $user['address'];
                                                                            else echo "--"; ?></span></td>
                                            <td><span class="tbody-text"><?php if (!empty($user['role'])) echo $user['role'];
                                                                            else echo "--"; ?></span></td>
                                            <td><span class="tbody-text">7/3/2023</span></td>
                                            <?php
                                            if ($user['role'] != 'Admin') {
                                            ?>
                                                <td><span class="tbody-text">
                                                        <a href="?mod=users&controller=team&action=edit&id=<?php echo $user['id'] ?>" title="Sửa" class="edit"><i class="fa fa-pencil" aria-hidden="true"></i></a> | <a href="?mod=users&controller=team&action=delete&id=<?php echo $user['id'] ?>" title="Xóa" class="delete"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </span>
                                                </td>
                                            <?php
                                            }
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="section-detail clearfix">
                        <?php
                        echo get_pagging($num_page, $page, "?mod=users&controller=team&action=index");
                        ?>
                    </div>
                <?php
                } else echo "Không có dữ liệu!!!";
                ?>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>