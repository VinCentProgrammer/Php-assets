<?php
get_header();
global $alert;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm trang</h3>
                </div>
            </div>
            <?php if (!empty($alert)) echo $alert; ?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề</label>
                        <?php echo form_error('title', 'add-user'); ?>
                        <input type="text" name="title" id="title" value="<?php echo set_value('title'); ?>">
                        <label for="slug">Slug ( Friendly_url )</label>
                        <?php echo form_error('slug', 'add-user'); ?>
                        <input type="text" name="slug" id="slug" value="<?php echo set_value('slug'); ?>">
                        <label for="desc">Mô tả</label>
                        <?php echo form_error('content', 'add-user'); ?>
                        <textarea class="ckeditor" name="content" id="content" cols="30" rows="10"><?php echo set_value('content'); ?></textarea>
                        <label>Hình ảnh</label>
                        <?php echo form_error('file_empty','add-user'); ?>
                        <?php echo form_error('file_size', 'add-user'); ?>
                        <?php echo form_error('file_type', 'add-user'); ?>
                        <input type="file" name="file" id="upload-thumb" value="<?php echo set_value('file'); ?>"><br><br>
                        <img style="max-width: 200px; height: auto;" src="<?php if(file_exists($upload_file)) echo $upload_file; ?>" alt=""><br>
                        <input type="submit" value="Thêm trang" id="btn-add" name="btn-add">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>