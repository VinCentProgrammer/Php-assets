<?php
//5. Hiển thị danh sách sản phẩm lên giao diện
/*
B1: Chuẩn bị dữ liệu
B2: Cắt giao diện HTML
B3: Kiểm tra dữ liệu
B4: Đổ dữ liệu
*/

function show_array($data){
    if(is_array($data)){
        echo "<pre>";
        print_r($data);
        echo "</pre>";
    }
}

$list_product = array(
    1 => array(
        'product_id' => 1,
        'product_thumb' => 'https://salt.tikicdn.com/cache/280x280/ts/product/54/ff/25/bfdf0febe11a28eaa7cd3fa735a82c49.png.webp',
        'product_title' => 'Apple iPad 10.2-inch (9th Gen) Wi-Fi, 2021',
        'product_price_old' => '6.990.000 ₫',
        'product_precent_sale' => '-36%',
        'product_price_current' => '5.990.000 ₫',
        'product_number_reviews' => '22',
        'product_rank' => '4',
        'product_sold' => '1000',
        'product_detail' => 'product detail',
    ),
    2 => array(
        'product_id' => 2,
        'product_thumb' => 'https://salt.tikicdn.com/cache/280x280/ts/product/a2/f0/e7/d7bc5cb5e12fac78066eb630a077ae95.jpg.webp',
        'product_title' => 'Những Người Hàng Xóm - Nguyễn Nhật Ánh',
        'product_price_old' => '95.100 ₫',
        'product_precent_sale' => '-23%',
        'product_price_current' => '85.100 ₫',
        'product_number_reviews' => '20',
        'product_rank' => '5',
        'product_sold' => '900',
        'product_detail' => 'product detail',
    ),
    3 => array(
        'product_id' => 3,
        'product_thumb' => 'https://salt.tikicdn.com/cache/280x280/ts/product/7c/e3/95/dae5605536e6c8b9bd8073e6482b0335.jpg.webp',
        'product_title' => 'Không Diệt Không Sinh Đừng Sợ Hãi (TB5)',
        'product_price_old' => '83.000 ₫',
        'product_precent_sale' => '-34%',
        'product_price_current' => '73.000 ₫',
        'product_number_reviews' => '90',
        'product_rank' => '3',
        'product_sold' => '500',
        'product_detail' => 'product detail',
    ),
    4 => array(
        'product_id' => 4,
        'product_thumb' => 'https://salt.tikicdn.com/cache/280x280/ts/product/45/3b/fc/aa81d0a534b45706ae1eee1e344e80d9.jpg.webp',
        'product_title' => 'Nhà Giả Kim (Tái Bản 2020)',
        'product_price_old' => '63.000 ₫',
        'product_precent_sale' => '-36%',
        'product_price_current' => '53.000 ₫',
        'product_number_reviews' => '91',
        'product_rank' => '4',
        'product_sold' => '600',
        'product_detail' => 'product detail',
    ),
    5 => array(
        'product_id' => 5,
        'product_thumb' => 'https://salt.tikicdn.com/cache/280x280/ts/product/a5/3d/b1/e09d04e66f5774383ca1fea6160917aa.png.webp',
        'product_title' => 'HCM - Sườn non heo (500g) - Thích hợp với các món nướng, hầm, rang, xào chua ngọt - [Giao nhanh TPHCM]',
        'product_price_old' => '53.000 ₫',
        'product_precent_sale' => '-36%',
        'product_price_current' => '43.000 ₫',
        'product_number_reviews' => '10',
        'product_rank' => '4',
        'product_sold' => '200',
        'product_detail' => 'product detail',
    ),
    6 => array(
        'product_id' => 6,
        'product_thumb' => 'https://salt.tikicdn.com/cache/280x280/ts/product/45/3b/fc/aa81d0a534b45706ae1eee1e344e80d9.jpg.webp',
        'product_title' => 'Nhà Giả Kim (Tái Bản 2020)',
        'product_price_old' => '63.000 ₫',
        'product_precent_sale' => '-36%',
        'product_price_current' => '53.000 ₫',
        'product_number_reviews' => '91',
        'product_rank' => '4',
        'product_sold' => '600',
        'product_detail' => 'product detail',
    ),
    7 => array(
        'product_id' => 7,
        'product_thumb' => 'https://salt.tikicdn.com/cache/280x280/ts/product/54/ff/25/bfdf0febe11a28eaa7cd3fa735a82c49.png.webp',
        'product_title' => 'Apple iPad 10.2-inch (9th Gen) Wi-Fi, 2021',
        'product_price_old' => '6.990.000 ₫',
        'product_precent_sale' => '-36%',
        'product_price_current' => '5.990.000 ₫',
        'product_number_reviews' => '22',
        'product_rank' => '4',
        'product_sold' => '1000',
        'product_detail' => 'product detail',
    ),
    8 => array(
        'product_id' => 8,
        'product_thumb' => 'https://salt.tikicdn.com/cache/280x280/ts/product/a2/f0/e7/d7bc5cb5e12fac78066eb630a077ae95.jpg.webp',
        'product_title' => 'Những Người Hàng Xóm - Nguyễn Nhật Ánh',
        'product_price_old' => '95.100 ₫',
        'product_precent_sale' => '-23%',
        'product_price_current' => '85.100 ₫',
        'product_number_reviews' => '20',
        'product_rank' => '5',
        'product_sold' => '900',
        'product_detail' => 'product detail',
    ),
);
?>


<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Hiển thị danh sách sản phẩm</title>
</head>
<body>
    <style>
        .list-product .product-item:hover .info-product{
            border: 1px solid #d3cece !important;
            transition: all 0.25s ease-in-out;
        }
        .list-product .product-item .info-product a:last-child:hover{
            background-color: #fa6372 !important;
            color: #fff !important;
            transition: all 0.2s ease-in-out;
            border: 1px solid #eae5e5 !important;
        }
        #wp-content{
            min-height: 600px;
        }
    </style>
    <div id="wrapper">
        <div id="header" class="bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-center text-light font-weight-normal text-uppercase py-2 mb-0">
                            Hiển thị danh sách sản phẩm
                        </h5>
                    </div>
                </div>
            </div>
        </div>
        <div id="wp-content" class="my-2 p-3">
            <div class="container">
                <div class="row">
                    <div class="col-md-12"><a href="" class="text-decoration-none text-dark h3">Shop</a></div>
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
        <div id="footer" class="bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h5 class="text-center text-white font-weight-normal text-capitalize py-1 mb-0">
                            Dungdev.com
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>


</body>
</html>