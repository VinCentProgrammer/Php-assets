<?php
get_header();
?>

<?php
// echo $info_cat['cat_title'];
// die();
?>

<div id="main-content-wp" class="category-product-page">
    <div class="wp-inner clearfix">
        <?php
        get_sidebar();
        ?>
        <?php
        if (!empty($products)) {
        ?>
            <div id="content" class="fl-right">
                <div class="section list-cat">
                    <div class="section-head">
                        <h3 class="section-title"><?php echo $info_cat['cat_title']; ?></h3>
                        <p class="section-desc">Có <?php echo count($products); ?> sản phẩm trong mục này</p>
                    </div>
                    <div class="section-detail">
                        <ul class="list-item clearfix">
                            <?php
                            foreach ($products as $product) {
                                $product['url'] = create_slug_detail_product($info_cat['cat_title'], $info_cat['cat_id'], $product['product_title'], $product['id']);
                            ?>
                                <li>
                                    <a href="<?php echo $product['url'] ?>" title="" class="thumb">
                                        <img src="<?php echo $product['product_thumb']  ?>" alt="">
                                    </a>
                                    <a href="<?php echo $product['url'] ?>" title="" class="title"><?php echo $product['product_title']  ?></a>
                                    <p class="price"><?php echo currency_format($product['product_price'])  ?></p>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="section" id="pagenavi-wp">
                    <div class="section-detail">
                        <ul id="list-pagenavi">
                            <li class="active">
                                <a href="" title="">1</a>
                            </li>
                            <li>
                                <a href="" title="">2</a>
                            </li>
                            <li>
                                <a href="" title="">3</a>
                            </li>
                        </ul>
                        <a href="" title="" class="next-page"><i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<?php
get_footer();
?>