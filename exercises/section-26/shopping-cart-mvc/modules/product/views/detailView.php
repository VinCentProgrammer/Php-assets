<?php
get_header();
?>

<div id="main-content-wp" class="detail-product-page clearfix">
    <div class="wp-inner clearfix">
        <?php
        get_sidebar();
        ?>
        <?php
        if (!empty($product)) {
        ?>
            <div id="content" class="fl-right">
                <div class="section" id="info-product-wp">
                    <div class="section-detail clearfix">
                        <div class="thumb fl-left">
                            <img src="<?php echo $product['product_thumb']; ?>" alt="">
                        </div>
                        <div class="detail fl-right">
                            <h3 class="title"><?php echo $product['product_title']; ?></h3>
                            <p class="price"><?php echo currency_format($product['product_price']); ?></p>
                            <p class="product-code">Mã sản phẩm: <span><?php echo $product['product_code']; ?></span></p>
                            <div class="desc-short">
                                <h5>Mô tả sản phẩm:</h5>
                                <p><?php echo $product['product_desc']; ?></p>
                            </div>
                            <form action="?mod=cart&action=add&id=<?php echo $product['id']; ?>" method="post" class="num-order-wp">
                            <label for="num_order">Số lượng</label>
                            <input type="number" name="num_order" id="num_order" min = "1" max = "200" value="1">
                            <input type="submit" value="Thêm giỏ hàng" class="add-to-cart" name="btn_add">
                            </form>
                        </div>
                    </div>
                </div>
                <div class="section" id="desc-wp">
                    <div class="section-head">
                        <h3 class="section-title">Chi tiết sản phẩm</h3>
                    </div>
                    <div class="section-detail">
                        <?php echo $product['product_detail']; ?>
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