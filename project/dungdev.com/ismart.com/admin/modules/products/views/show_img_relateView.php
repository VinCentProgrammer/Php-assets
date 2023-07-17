<?php
get_header();
// show_array($list_img_relate);
?>
<div id="main-content-wp" class="list-post-page">
    <div class="wrap clearfix">
        <?php get_sidebar(); ?>
        <div id="content" class="fl-right">
            <div class="section" id="title-page">
                <div class="clearfix">
                    <h3 id="index" class="fl-left">Hình ảnh liên quan</h3>
                </div>
            </div>
            <div class="section" id="detail-page">
                <?php
                if (!empty($list_img_relate)) {
                ?>
                    <div class="table-responsive">
                        <table class="table list-table-wp">
                            <thead>
                                <tr>
                                    <td><span class="thead-text">STT</span></td>
                                    <td><span class="thead-text">Mã sản phẩm</span></td>
                                    <td><span class="thead-text">Hình ảnh liên quan</span></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $tmp = 0;
                                foreach ($list_img_relate as $item) {
                                    $tmp++;
                                    $product = get_product_by_id($item['img_id']);
                                    // show_array($product);
                                ?>
                                    <tr>
                                        <td><span class="tbody-text"><?php echo $tmp; ?></span></td>
                                        <td><span class="tbody-text"><?php echo $product['code'] ?></span></td>
                                        <td><span class="tbody-text"><img style="width: 100px; height: auto; " src="<?php echo $item['path_img_relate']; ?>" alt=""></span></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="section-detail clearfix">
                        <?php
                        echo get_pagging($num_page, $page, "?mod=products&action=show_img_relate");
                        ?>
                    </div>
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