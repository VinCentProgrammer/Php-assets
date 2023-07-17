<?php
get_header();
global $alert, $cat_id;
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Thêm danh mục sản phẩm</h3>
                </div>
            </div>
            <?php if (!empty($alert)) echo $alert; ?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST">
                        <label for="name_cat">Tên danh mục</label>
                        <?php echo form_error('name_cat', 'add-user'); ?>
                        <input type="text" name="name_cat" id="name_cat" value="<?php echo set_value('name_cat'); ?>">
                        <label for="desc">Mô tả danh mục</label>
                        <?php echo form_error('desc', 'add-user'); ?>
                        <input type="text" name="desc" id="desc" value="<?php echo set_value('desc'); ?>">
                        <label for="slug">Slug danh mục ( Friendly_url )</label>
                        <?php echo form_error('slug', 'add-user'); ?>
                        <input type="text" name="slug" id="slug" value="<?php echo set_value('slug'); ?>">
                        <label for="cat_product">Chọn danh mục</label>
                        <select name="cat_product" id="cat_product">
                            <option value="0">Danh mục cha</option>
                            <?php
                            foreach ($list_cat as $cat) {
                            ?>
                                <option <?php if ($cat_id == $cat['id']) echo "selected = 'selected'"; ?> value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <input type="submit" value="Thêm danh mục" id="btn-add-cat" name="btn-add-cat">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>