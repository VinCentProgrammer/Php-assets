<?php
/*
1. Tính số trang $num_page hiển thị khi có tổng số bài $total_rows và số bài trên mỗi trang $num_per_page
CHECKLIST:
B1: Thực hiện tính $total_rows/$num_per_page
B2: Lấy trần lên bằng hàm ceil();
B3: Test
B4: Kết thúc
*/

function num_page($total_rows, $num_per_page){
    return ceil($total_rows/$num_per_page);
}

$num_page = num_page(25, 3);
echo $num_page;
?>