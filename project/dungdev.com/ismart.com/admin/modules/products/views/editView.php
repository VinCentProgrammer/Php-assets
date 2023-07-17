<?php
get_header();
global $alert;
// show_array($list_path_img_relate);
// show_array();
$cats = $list_cat;
// show_array($cats);
?>
<div id="main-content-wp" class="add-cat-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Cập nhật sản phẩm</h3>
                </div>
            </div>
            <?php if (!empty($alert)) echo $alert;
            ?>
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <form method="POST" enctype="multipart/form-data">
                        <label for="name">Tên sản phẩm</label>
                        <?php echo form_error('name_product', 'add-user');
                        ?>
                        <input type="text" name="name_product" id="name" value="<?php echo $product['name'] ?>">
                        <label for="code">Mã sản phẩm</label>
                        <?php echo form_error('code', 'add-user');
                        ?>
                        <input type="text" name="code" id="code" value="<?php echo $product['code'] ?>">
                        <label for="price_current">Giá sản phẩm</label>
                        <?php echo form_error('price_current', 'add-user');
                        ?>
                        <input type="text" name="price_current" id="price_current" value="<?php echo $product['price_current'] ?>">
                        <label for="desc">Mô tả ngắn</label>
                        <?php echo form_error('desc_product', 'add-user');
                        ?>
                        <textarea name="desc_product" id="desc_product" cols="30" rows="10"><?php echo $product['desc_product'] ?></textarea>
                        <label for="detail">Chi tiết sản phẩm</label>
                        <?php echo form_error('detail', 'add-user');
                        ?>
                        <textarea class="ckeditor" name="detail" id="detail" cols="30" rows="10"><?php echo $product['detail'] ?></textarea><br>

                        <label for="path_thumb">Hình ảnh đại diện sản phẩm</label>
                        <?php echo form_error('file_size', 'add-user');
                        ?>
                        <?php echo form_error('file_type', 'add-user');
                        ?>
                        <input type="file" name="file" id="path_thumb"><br>
                        <img style="max-width: 200px; height: auto;" src="<?php if (file_exists($product['thumb'])) echo $product['thumb']; ?>" alt=""><br>
                        <label for="path_img_relate">Hình ảnh liên quan sản phẩm</label>
                        <?php echo form_error('multi_file_size', 'add-user');
                        ?>
                        <?php echo form_error('multi_file_type', 'add-user');
                        ?>
                        <input type="file" name="file_relate[]" id="path_img_relate" multiple="multiple"><br>
                        <?php
                        if (!empty($list_path_img_relate)) {
                            foreach ($list_path_img_relate as $item) {
                        ?>
                                <img style="max-width: 200px; height: auto;" src="<?php if (file_exists($item['path_img_relate'])) echo $item['path_img_relate']; ?>" alt=""><br>
                        <?php
                            }
                        }
                        ?>
                        <br>
                        <label for="cat_product">Danh mục</label>
                        <?php echo form_error('cat_product', 'add-user');
                        ?>
                        <select name="cat_product" id="cat_product">
                            <option value="">Chọn</option>
                            <?php
                            foreach ($cats as $cat) {
                            ?>
                                <option <?php if ($cat['id'] == $product['cat_id']) echo "selected = 'selected'" ?> value="<?php echo $cat['id'] ?>"><?php echo $cat['name'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label for="status">Trạng thái</label>
                        <?php echo form_error('status', 'add-user');
                        ?>
                        <select name="status" id="status">
                            <option value="">Chọn</option>
                            <option <?php if ($product['status'] == 'waiting') echo "selected = 'selected'"; ?> value="waiting">Chờ duyệt</option>
                            <option <?php if ($product['status'] == 'posted') echo "selected = 'selected'"; ?> value="posted">Đã đăng</option>
                        </select>
                        <input type="submit" value="Cập nhật" id="btn-edit-product" name="btn-edit-product">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>