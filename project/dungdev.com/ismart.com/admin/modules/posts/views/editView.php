<?php
get_header();
global $alert;
// show_array($post);
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Chỉnh sửa bài viết</h3>
                </div>
            </div>
            <?php if (!empty($alert)) echo $alert;
            ?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="title">Tiêu đề bài viết</label>
                        <?php echo form_error('title', 'add-user');
                        ?>
                        <input type="text" name="title" id="title" value="<?php echo $post['title']; ?>">
                        <label for="desc">Mô tả bài viết</label>
                        <?php echo form_error('desc', 'add-user');
                        ?>
                        <textarea name="desc_post" id="desc" cols="30" rows="10"><?php echo $post['desc_post']; ?></textarea>
                        <label for="slug">Slug ( Friendly_url )</label>
                        <?php echo form_error('slug', 'add-user');
                        ?>
                        <input type="text" name="slug" id="slug" value="<?php echo $post['slug']; ?>">
                        <label for="detail">Chi tiết bài viết</label>
                        <?php echo form_error('detail', 'add-user');
                        ?>
                        <textarea class="ckeditor" name="detail" id="detail" cols="30" rows="10"><?php echo $post['detail']; ?></textarea><br>

                        <label for="path_thumb">Hình ảnh đại diện bài viết</label>
                        <?php echo form_error('file_empty', 'add-user');
                        ?>
                        <?php echo form_error('file_size', 'add-user');
                        ?>
                        <?php echo form_error('file_type', 'add-user');
                        ?>
                        <input type="file" name="file" id="path_thumb"><br>
                        <img style="max-width: 200px; height: auto;" src="<?php echo $post['path_thumb']; ?>" alt="">
                        <label for="cat_post">Danh mục</label>
                        <?php echo form_error('cat_post', 'add-user');
                        ?>
                        <select name="cat_post" id="cat_post">
                            <option value="">Chọn</option>
                            <?php
                            foreach ($list_cat as $cat) {
                            ?>
                                <option <?php if ($cat['id'] == $post['cat_id']) echo "selected = 'selected'"; ?> value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input type="submit" value="Chỉnh sửa bài viết" id="btn-edit-post" name="btn-edit-post">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>