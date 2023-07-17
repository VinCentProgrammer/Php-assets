<?php
get_header();
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
                    <h3 id="index" class="fl-left">Cập nhật thông tin admin</h3>
                </div>
            </div>
            <?php if (!empty($alert)) echo $alert; ?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" id="upadate_info">
                        <label for="fullname">Họ và Tên</label>
                        <input type="text" name="fullname" id="fullname" value="<?php echo $info_admin['fullname'] ?>">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" name="username" id="username" placeholder="<?php echo $info_admin['username'] ?>" readonly="readonly">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" value="<?php echo $info_admin['email'] ?>">
                        <label for="tel">Số điện thoại</label>
                        <input type="tel" name="tel" id="tel" value="<?php echo $info_admin['phone_numbers'] ?>">
                        <label for="address">Địa chỉ</label>
                        <textarea name="address" id="address"><?php echo $info_admin['address'] ?></textarea>
                        <label for="birth">Tuổi</label>
                        <input type="text" name="date-of-birth" id="date-of-birth" value="<?php echo $info_admin['age'] ?>">
                        <label for="gender">Giới tính</label>
                        <select name="gender" id="gender">
                            <option value="">Chọn</option>
                            <option <?php if ($info_admin['gender'] == 'male') echo "selected = 'selected'"; ?> value="male">Nam</option>
                            <option <?php if ($info_admin['gender'] == 'female') echo "selected = 'selected'"; ?> value="female">Nữ</option>
                        </select>
                        <input type="submit" value="Cập nhật" id="btn-update" name="btn-update">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
get_footer();
?>