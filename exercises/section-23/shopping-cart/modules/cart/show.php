<?php
get_header();
?>
<?php


$list_product = get_cart_buy();

// show_array($list_product);

?>



<div id="main-content-wp" class="cart-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <h3 class="title">Giỏ hàng</h3>
            </div>
        </div>
    </div>
    <?php
    if (!empty($list_product)) {
    ?>
        <form action="?mod=cart&act=update" method="POST">
            <div id="wrapper" class="wp-inner clearfix">
                <div class="section" id="info-cart-wp">
                    <div class="section-detail table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td>Mã sản phẩm</td>
                                    <td>Ảnh sản phẩm</td>
                                    <td>Tên sản phẩm</td>
                                    <td>Giá sản phẩm</td>
                                    <td>Số lượng</td>
                                    <td colspan="2">Thành tiền</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($list_product as $product) {
                                    $product['url'] = "?mod=product&act=detail&id={$product['id']}";
                                    $product['url_cart_delete'] = "?mod=cart&act=delete&id={$product['id']}";
                                ?>
                                    <tr>
                                        <td><?php echo $product['product_code'] ?></td>
                                        <td>
                                            <a href="<?php echo $product['url'] ?>" title="" class="thumb">
                                                <img src="<?php echo $product['product_thumb'] ?>" alt="">
                                            </a>
                                        </td>
                                        <td>
                                            <a href="<?php echo $product['url'] ?>" title="" class="name-product"><?php echo $product['product_title'] ?></a>
                                        </td>
                                        <td id="price"><?php echo currency_format($product['product_price']); ?></td>
                                        <td>
                                            <input id="num_order" type="number" name="qty[<?php echo $product['id']; ?>]" value="<?php echo $product['product_qty'] ?>" class="num-order" min='1' max='100' data-id="<?php echo $product['id'] ?> ">
                                        </td>
                                        <td id="sub_total" data-id="<?php echo $product['id'] ?>"><?php echo currency_format($product['product_sub_total']); ?></td>
                                        <td>
                                            <a href="<?php echo $product['url_cart_delete'] ?>" title="" class="del-product"><i class="fa fa-trash-o"></i></a>
                                        </td>
                                    </tr>

                                <?php
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <p id="total-price" class="fl-right">Tổng giá: <span><?php echo currency_format(get_total_cart()); ?></span></p>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="7">
                                        <div class="clearfix">
                                            <div class="fl-right">
                                                <input type="submit" name='btn_update_cart' id="update-cart" value="Cập nhật giỏ hàng">
                                                <a href="?mod=cart&act=checkout" title="" id="checkout-cart">Thanh toán</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>

                    </div>
                </div>
                <div class="section" id="action-cart-wp">
                    <div class="section-detail">
                        <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                        <a href="?mod=home&act=main" title="" id="buy-more">Mua tiếp</a><br />
                        <a href="?mod=cart&act=delete" title="" id="delete-cart">Xóa giỏ hàng</a>
                    </div>
                </div>
            </div>
        </form>
    <?php
    } else echo "<p style = 'text-align: center;'>Không có sản phẩm nào được thêm vào giỏ hàng!</p>";
    ?>

</div>
<?php
get_footer();
?>