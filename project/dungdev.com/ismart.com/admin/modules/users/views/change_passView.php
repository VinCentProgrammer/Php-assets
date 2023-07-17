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
                    <h3 id="index" class="fl-left">Thay đổi mật khẩu</h3>
                </div>
            </div>
            <?php if (!empty($alert)) echo $alert; ?>
            <div class="section" id="detail-page">
                <div class="section" id="detail-page">
                    <div class="section-detail">
                        <form method="POST">
                            <label for="old-pass">Mật khẩu cũ</label>
                            <?php echo form_error('pass-old', 'add-user') ?>
                            <input type="password" name="pass-old" id="old-pass">
                            <label for="new-pass">Mật khẩu mới</label>
                            <?php echo form_error('pass-new', 'add-user') ?>
                            <input type="password" name="pass-new" id="new-pass">
                            <label for="confirm-pass">Xác nhận mật khẩu</label>
                            <?php echo form_error('pass-confirm', 'add-user') ?>
                            <input type="password" name="pass-confirm" id="confirm-pass">
                            <input type="submit" value="Thay đổi" name="btn-change-pass" id="btn-change-pass">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>