<?php get_header(); ?>
<?php
global $alert;
?>
<div id="main-content-wp" class="info-account-page">
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
                    <h3 id="index" class="fl-left">Thêm thành viên mới</h3>
                </div>
            </div>
            <?php if (!empty($alert)) echo $alert; ?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" id="add-user">
                        <label for="fullname">Họ và Tên</label>
                        <input type="text" name="fullname" id="fullname" value="<?php echo set_value('fullname') ?>">
                        <label for="username">Tên đăng nhập</label>
                        <?php echo form_error('username', 'add-user'); ?>
                        <input type="text" name="username" id="username" value="<?php echo set_value('username') ?>">
                        <label for="password">Mật khẩu</label>
                        <?php echo form_error('password', 'add-user'); ?>
                        <input type="password" name="password" id="password">
                        <label for="email">Email</label>
                        <?php echo form_error('email', 'add-user'); ?>
                        <input type="email" name="email" id="email" value="<?php echo set_value('email') ?>">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="<?php echo set_value('tel') ?>">
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo set_value('address') ?></textarea>
                        <label for="gender">Giới tính</label>
                        <select name="gender" id="gender">
                            <option value="">Chọn</option>
                            <option value="male">Nam</option>
                            <option value="female">Nữ</option>
                        </select>
                        <label for="role">Quyền</label>
                        <select name="roles" id="role">
                            <option value="">Chọn</option>
                            <option value="Admin">Quản trị</option>
                            <option value="Manager">Quản lí</option>
                        </select>
                        <input type="submit" value="Thêm mới" name="btn-add" id="btn-add">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>