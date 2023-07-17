<?php
get_header();
?>
<?php

$list_product = get_list_product();
$list_product_cat = get_list_product_cat();
?>

<div id="main-content-wp" class="home-page">
    <div class="wp-inner clearfix">
        <?php
        get_sidebar();
        ?>
        <?php
        if (!empty($list_product_cat)) {
        ?>
            <div id="content" class="fl-right">
                <?php
                foreach ($list_product_cat as $product_cat) {
                    $product_cat['url'] = "?mod=product&cat_id={$product_cat['cat_id']}";
                    // show_array($product_cat);
                ?>
                    <div class="section list-cat">
                        <div class="section-head">
                            <h3 class="section-title"><a href="<?php echo $product_cat['url']; ?>"><?php echo $product_cat['cat_title']; ?></a></h3>
                        </div>
                        <?php
                        if (!empty($list_product)) {
                            $products = get_list_product_by_cat_id($product_cat['cat_id']);
                            // show_array($products);
                        ?>
                            <div class="section-detail">
                                <ul class="list-item clearfix">
                                    <?php
                                    foreach ($products as $product) {
                                        $product['url'] = "?mod=product&action=detail&id={$product['id']}";
                                    ?>
                                        <li>
                                            <a href="<?php echo $product['url']; ?>" title="" class="thumb">
                                                <img src="<?php echo $product['product_thumb']; ?>" alt="">
                                            </a>
                                            <a href="<?php echo $product['url']; ?>" title="" class="title"><?php echo $product['product_title']; ?></a>
                                            <p class="price"><?php echo currency_format($product['product_price']); ?></p>
                                        </li>
                                    <?php
                                    }
                                    ?>
                                <?php
                            }
                                ?>
                                </ul>
                            </div>
                        <?php
                    }
                        ?>

                    </div>
                <?php
            }
                ?>
            </div>
    </div>
</div>
</div>


<?php
get_footer();
?>