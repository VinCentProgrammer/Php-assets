<?php 
#Lưu trữ dữ liệu danh mục sản phẩm
/*
- id danh mục
- Tiêu đề danh mục
*/

$list_product_cat = array(
    1 => array(
        'cat_id' => 1,
        'cat_title' => 'Điện thoại' 
    ),
    2 => array(
        'cat_id' => 2,
        'cat_title' => 'Máy tính' 
    )
);

#Lưu trữ dữ liệu sản phẩm
/*
- id sản phẩm: id
- Tiêu đề sản phẩm: product_title
- Ảnh đại diện sản phẩm: product_thumb
- Giá sản phẩm: product_price
- Mã sản phẩm: product_code
- Mô tả ngắn sản phẩm: product_desc
- Số lượng sản phẩm: product_qty
- Chi tiết sản phẩm: product_detail
- id danh mục sản phẩm: cat_id
*/

$list_product = array(
    1 => array(
        'id' => 1,
        'cat_id' => 1,
        'product_title' => 'Samsung Galaxy A24',
        'product_thumb' => 'https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24-black-thumb-600x600.jpg',
        'product_price' => 6090000,
        'product_code' => 'UNI#1',
        'product_desc' => '<p>Samsung Galaxy A24 6GB tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Samsung giới thiệu đến thị trường Việt Nam vào tháng 04/2023, máy nổi bật với giá thành rẻ, màn hình Super AMOLED cùng camera 50 MP chụp ảnh sắc nét.</p>',
        'product_detail' => ""
        ."<p>Samsung Galaxy A24 được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p><img src='https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24.jpg'></img><p>Galaxy A24 được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p><p>Galaxy A24 được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p>"
    ),
    2 => array(
        'id' => 2,
        'cat_id' => 1,
        'product_title' => 'Điện thoại OPPO Find N2 Flip 5G',
        'product_thumb' => 'https://cdn.tgdd.vn/Products/Images/42/299034/oppo-find-n2-flip-purple-thumb-1-600x600-1-600x600.jpg',
        'product_price' => 19990000,
        'product_code' => 'UNI#2',
        'product_desc' => '<p>Điện thoại OPPO Find N2 Flip 5G tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Samsung giới thiệu đến thị trường Việt Nam vào tháng 04/2023, máy nổi bật với giá thành rẻ, màn hình Super AMOLED cùng camera 50 MP chụp ảnh sắc nét.</p>',
        'product_detail' => ""
        ."<p>Điện thoại OPPO Find N2 Flip 5G được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p><img src='https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24.jpg'></img><p>Galaxy A24 được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p><p>Galaxy A24 được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p>"
    ),
    3 => array(
        'id' => 3,
        'cat_id' => 1,
        'product_title' => 'iPhone 14 Pro Max',
        'product_thumb' => 'https://cdn.tgdd.vn/Products/Images/42/251192/iphone-14-pro-max-den-thumb-600x600.jpg',
        'product_price' => 27490000,
        'product_code' => 'UNI#3',
        'product_desc' => '<p>iPhone 14 Pro Max tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Samsung giới thiệu đến thị trường Việt Nam vào tháng 04/2023, máy nổi bật với giá thành rẻ, màn hình Super AMOLED cùng camera 50 MP chụp ảnh sắc nét.</p>',
        'product_detail' => ""
        ."<p>iPhone 14 Pro Max được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p><img src='https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24.jpg'></img><p>Galaxy A24 được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p><p>Galaxy A24 được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p>"
    ),
    4 => array(
        'id' => 4,
        'cat_id' => 1,
        'product_title' => ' iPhone 14 Pro',
        'product_thumb' => 'https://cdn.tgdd.vn/Products/Images/42/247508/iphone-14-pro-vang-thumb-600x600.jpg',
        'product_price' => 25490000,
        'product_code' => 'UNI#4',
        'product_desc' => '<p> iPhone 14 Pro tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Samsung giới thiệu đến thị trường Việt Nam vào tháng 04/2023, máy nổi bật với giá thành rẻ, màn hình Super AMOLED cùng camera 50 MP chụp ảnh sắc nét.</p>',
        'product_detail' => ""
        ."<p> iPhone 14 Pro được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p><img src='https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24.jpg'></img><p>Galaxy A24 được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p><p>Galaxy A24 được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p>"
    ),
    5 => array(
        'id' => 5,
        'cat_id' => 1,
        'product_title' => 'Samsung Galaxy S21 FE 5G',
        'product_thumb' => 'https://cdn.tgdd.vn/Products/Images/42/267211/Samsung-Galaxy-S21-FE-vang-1-2-600x600.jpg',
        'product_price' => 9990000,
        'product_code' => 'UNI#5',
        'product_desc' => '<p>Samsung Galaxy S21 FE 5G tiếp tục sẽ là mẫu điện thoại tầm trung được nhà Samsung giới thiệu đến thị trường Việt Nam vào tháng 04/2023, máy nổi bật với giá thành rẻ, màn hình Super AMOLED cùng camera 50 MP chụp ảnh sắc nét.</p>',
        'product_detail' => ""
        ."<p>Samsung Galaxy S21 FE 5G được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p><img src='https://cdn.tgdd.vn/Products/Images/42/274018/samsung-galaxy-a24.jpg'></img><p>Galaxy A24 được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p><p>Galaxy A24 được lấy cảm hứng thiết kế đến từ những mẫu điện thoại Galaxy dòng A được ra mắt trong năm 2023, máy có thiên hướng vuông vắn với tạo hình phẳng ở cả phần mặt lưng và bộ khung</p>"
    ),
    6 => array(
        'id' => 6,
        'cat_id' => 2,
        'product_title' => ' iMac 24 inch M1 2021 4.5K/8-core GPU',
        'product_thumb' => 'https://cdn.tgdd.vn/Products/Images/5698/238053/imac-24-icnh-2021-m1-thumb-xanh-duong-600x600.jpg',
        'product_price' => 27990000,
        'product_code' => 'UNI#6',
        'product_desc' => 'iMac 24 inch 2021 4.5K Retina M1 là mẫu máy tính để bàn tích hợp CPU vào màn hình của Apple với thiết kế vẻ ngoài hoàn toàn mới, màu sắc rực rỡ cùng hiệu năng vô cùng mạnh mẽ từ chip M1.',
        'product_detail' => ""
        ."<p>Máy tính để bàn Apple M1 sở hữu card đồ hoạ tích hợp 8 nhân, cung cấp tốc độ xử lý về hình ảnh đồ hoạ nhanh gấp 2 lần so với phiên bản tiền nhiệm, đáp ứng tốt nhu cầu sử dụng các phần mềm như Photoshop, Lightroom, Final Cut, Xcode,...</p>"
        ."<img src = 'https://cdn.tgdd.vn/Products/Images/5698/238053/imac-24-inch-45k-retina-m1-mgph3saa-4-1.jpg' ></img>"
        ."<p>iMac M1 sở hữu màn hình 24 inch độ phân giải Retina 4.5K sắc nét đến từng chi tiết với hơn 11.3 triệu điểm ảnh. Viền màn hình được chế tác nhỏ hơn, mang đến không gian hiển thị lớn ấn tượng. Độ sáng màn hình lên đến 500 nits cùng lớp phủ chống phản chiếu trên màn hình càng làm tăng độ chính xác của hình ảnh hiển thị trong bất kì điều kiện ánh sáng nào, tạo sự thoải mái, dễ chịu khi trải nghiệm.</p>"
    ),
    7 => array(
        'id' => 7,
        'cat_id' => 2,
        'product_title' => 'Mac mini M1 2020 Silver (MGNT3SA/A)',
        'product_thumb' => 'https://cdn.tgdd.vn/Products/Images/5698/251248/mac-mini-2020-m1-8-core-8gb-512gb-silver-mgnt3sa-a-600x600.jpg',
        'product_price' => 27990000,
        'product_code' => 'UNI#7',
        'product_desc' => 'Mac mini M1 2020 Silver (MGNT3SA/A là mẫu máy tính để bàn tích hợp CPU vào màn hình của Apple với thiết kế vẻ ngoài hoàn toàn mới, màu sắc rực rỡ cùng hiệu năng vô cùng mạnh mẽ từ chip M1.',
        'product_detail' => ""
        ."<p>Mac mini M1 2020 Silver (MGNT3SA/A sở hữu card đồ hoạ tích hợp 8 nhân, cung cấp tốc độ xử lý về hình ảnh đồ hoạ nhanh gấp 2 lần so với phiên bản tiền nhiệm, đáp ứng tốt nhu cầu sử dụng các phần mềm như Photoshop, Lightroom, Final Cut, Xcode,...</p>"
        ."<img src = 'https://cdn.tgdd.vn/Products/Images/5698/238053/imac-24-inch-45k-retina-m1-mgph3saa-4-1.jpg' ></img>"
        ."<p>iMac M1 sở hữu màn hình 24 inch độ phân giải Retina 4.5K sắc nét đến từng chi tiết với hơn 11.3 triệu điểm ảnh. Viền màn hình được chế tác nhỏ hơn, mang đến không gian hiển thị lớn ấn tượng. Độ sáng màn hình lên đến 500 nits cùng lớp phủ chống phản chiếu trên màn hình càng làm tăng độ chính xác của hình ảnh hiển thị trong bất kì điều kiện ánh sáng nào, tạo sự thoải mái, dễ chịu khi trải nghiệm.</p>"
    ),
    8 => array(
        'id' => 8,
        'cat_id' => 2,
        'product_title' => 'Lenovo IdeaCentre AIO 3 24IAP7 i5 1235U 23.8 inch (F0GH00JWVN)',
        'product_thumb' => 'https://cdn.tgdd.vn/Products/Images/5698/305765/lenovo-ideacentre-aio-3-24iap7-i5-f0gh00jwvn-thumb-600x600.jpg',
        'product_price' => 16290000,
        'product_code' => 'UNI#8',
        'product_desc' => 'Lenovo IdeaCentre AIO 3 24IAP7 i5 1235U 23.8 inch (F0GH00JWVN) là mẫu máy tính để bàn tích hợp CPU vào màn hình của Apple với thiết kế vẻ ngoài hoàn toàn mới, màu sắc rực rỡ cùng hiệu năng vô cùng mạnh mẽ từ chip M1.',
        'product_detail' => ""
        ."<p>Lenovo IdeaCentre AIO 3 24IAP7 i5 1235U 23.8 inch (F0GH00JWVN) sở hữu card đồ hoạ tích hợp 8 nhân, cung cấp tốc độ xử lý về hình ảnh đồ hoạ nhanh gấp 2 lần so với phiên bản tiền nhiệm, đáp ứng tốt nhu cầu sử dụng các phần mềm như Photoshop, Lightroom, Final Cut, Xcode,...</p>"
        ."<img src = 'https://cdn.tgdd.vn/Products/Images/5698/238053/imac-24-inch-45k-retina-m1-mgph3saa-4-1.jpg' ></img>"
        ."<p>iMac M1 sở hữu màn hình 24 inch độ phân giải Retina 4.5K sắc nét đến từng chi tiết với hơn 11.3 triệu điểm ảnh. Viền màn hình được chế tác nhỏ hơn, mang đến không gian hiển thị lớn ấn tượng. Độ sáng màn hình lên đến 500 nits cùng lớp phủ chống phản chiếu trên màn hình càng làm tăng độ chính xác của hình ảnh hiển thị trong bất kì điều kiện ánh sáng nào, tạo sự thoải mái, dễ chịu khi trải nghiệm.</p>"
    ),
    9 => array(
        'id' => 9,
        'cat_id' => 2,
        'product_title' => 'HP AIO ProOne 240 G9 i5 1235U 23.8 inch (6M3V2PA)',
        'product_thumb' => 'https://cdn.tgdd.vn/Products/Images/5698/293650/hp-aio-proone-240-g9-i5-6m3v2pa-ab-thumb-600x600.jpg',
        'product_price' => 27990000,
        'product_code' => 'UNI#9',
        'product_desc' => 'HP AIO ProOne 240 G9 i5 1235U 23.8 inch (6M3V2PA) là mẫu máy tính để bàn tích hợp CPU vào màn hình của Apple với thiết kế vẻ ngoài hoàn toàn mới, màu sắc rực rỡ cùng hiệu năng vô cùng mạnh mẽ từ chip M1.',
        'product_detail' => ""
        ."<p>HP AIO ProOne 240 G9 i5 1235U 23.8 inch (6M3V2PA) sở hữu card đồ hoạ tích hợp 8 nhân, cung cấp tốc độ xử lý về hình ảnh đồ hoạ nhanh gấp 2 lần so với phiên bản tiền nhiệm, đáp ứng tốt nhu cầu sử dụng các phần mềm như Photoshop, Lightroom, Final Cut, Xcode,...</p>"
        ."<img src = 'https://cdn.tgdd.vn/Products/Images/5698/238053/imac-24-inch-45k-retina-m1-mgph3saa-4-1.jpg' ></img>"
        ."<p>HP AIO ProOne 240 G9 i5 1235U 23.8 inch (6M3V2PA) sở hữu màn hình 24 inch độ phân giải Retina 4.5K sắc nét đến từng chi tiết với hơn 11.3 triệu điểm ảnh. Viền màn hình được chế tác nhỏ hơn, mang đến không gian hiển thị lớn ấn tượng. Độ sáng màn hình lên đến 500 nits cùng lớp phủ chống phản chiếu trên màn hình càng làm tăng độ chính xác của hình ảnh hiển thị trong bất kì điều kiện ánh sáng nào, tạo sự thoải mái, dễ chịu khi trải nghiệm.</p>"
    ),
    10 => array(
        'id' => 10,
        'cat_id' => 2,
        'product_title' => 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch (WA070W)',
        'product_thumb' => 'https://cdn.tgdd.vn/Products/Images/5698/305829/asus-vivo-aio-a3402wbak-i3-wa070w-thumb-600x600.jpg',
        'product_price' => 16690000,
        'product_code' => 'UNI#10',
        'product_desc' => 'Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch (WA070W) là mẫu máy tính để bàn tích hợp CPU vào màn hình của Apple với thiết kế vẻ ngoài hoàn toàn mới, màu sắc rực rỡ cùng hiệu năng vô cùng mạnh mẽ từ chip M1.',
        'product_detail' => ""
        ."<p>Asus Vivo AIO A3402WBAK i3 1215U 23.8 inch (WA070W) sở hữu card đồ hoạ tích hợp 8 nhân, cung cấp tốc độ xử lý về hình ảnh đồ hoạ nhanh gấp 2 lần so với phiên bản tiền nhiệm, đáp ứng tốt nhu cầu sử dụng các phần mềm như Photoshop, Lightroom, Final Cut, Xcode,...</p>"
        ."<img src = 'https://cdn.tgdd.vn/Products/Images/5698/238053/imac-24-inch-45k-retina-m1-mgph3saa-4-1.jpg' ></img>"
        ."<p>iMac M1 sở hữu màn hình 24 inch độ phân giải Retina 4.5K sắc nét đến từng chi tiết với hơn 11.3 triệu điểm ảnh. Viền màn hình được chế tác nhỏ hơn, mang đến không gian hiển thị lớn ấn tượng. Độ sáng màn hình lên đến 500 nits cùng lớp phủ chống phản chiếu trên màn hình càng làm tăng độ chính xác của hình ảnh hiển thị trong bất kì điều kiện ánh sáng nào, tạo sự thoải mái, dễ chịu khi trải nghiệm.</p>"
    )
);
?>