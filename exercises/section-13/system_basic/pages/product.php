
<?php

// show_array($list_product);
?>
<div id="content">
    <div id="wp-content" class="my-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><a href="" class="text-decoration-none text-dark h3">Product</a></div>
                </div>
                <?php
                    if(!empty($list_product)){
                        ?>
                            <div class="list-product mt-3">
                                <div class="row">
                                    <?php
                                        foreach($list_product as $item){
                                            // show_array($item);
                                            ?>
                                                <div class="col-12 col-sm-6 col-md-4 col-lg-3 product-item px-3 mb-4 text-center">
                                                    <div class="info-product border border-muted p-1 p-sm-2 p-md-3 rounded shadow-sm">
                                                        <a class="d-block" href=""><img src="<?php echo $item['product_thumb'] ?>" alt="" class="img-fluid border-none product-thumb"></a>
                                                        <a href="" class="product-title text-decoration-none d-block py-2"><?php echo $item['product_title'] ?></a>
                                                        <p class="price-current text-danger mb-0"><?php echo $item['product_price_current'] ?> <s class="price-old text-muted"> <?php echo $item['product_price_old'] ?></s></p>
                                                        <a href="" class="btn-buy-now border border-danger text-danger text-decoration-none py-1 py-md-2 px-2 d-inline-block my-1 my-md-2 w-50 rounded">Buy Now</a>
                                                    </div>
                                                </div>
                                            <?php
                                        }
                                    ?>
                                    
                                </div>
                            </div>
                        <?php
                    }else echo "Hiện tại dữ liệu sản phẩm không tồn tại!!!";
                ?>
                
            </div>
        </div>
</div>
