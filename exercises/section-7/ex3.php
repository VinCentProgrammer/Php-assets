<?php
//3. Tạo mảng đa chiều quản lí các sản phẩm trong website bán hàng
/*
B1: Khảo sát website bán hàng (thegioididong fptshop tiki)
B2: Phân tích dữ liệu cần lưu trữ
- Id sản phẩm
- Hình ảnh đại diện sản phẩm
- Tiêu đề sản phẩm
- Giá cũ sản phẩm
- Phần trăm giảm giá
- Giá hiện tại
- Số lượng đánh giá
- Rank sản phẩm
- Chi tiết sản phẩm:
+ Điểm nổi bật
+ Thông số kĩ thuật (sản phẩm điện tử)
+ Thông tin sản phẩm
- Số lượng đã bán
B3: Convert data -> key
- product_id
- product_thumb
- product_title
- product_price_old
- product_precent_sale
- product_price_current
- product_number_reviews
- product_rank
- product_sold
- product_detail

B4: Copy data

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
);

show_array($list_product);
?>