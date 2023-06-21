<?php
require_once('../../db/dbhelper.php');

if (isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
    
    // Thực hiện truy vấn tất cả các sản phẩm
    $sql = "SELECT * FROM product";
    $products = executeResult($sql);
    
    $results = array();
    
    // Lặp qua từng sản phẩm và tính độ tương đồng với từ khóa
    foreach ($products as $product) {
        $similarity = 0;
        similar_text($product['product_name'], $keyword, $similarity);
        
        // Lưu kết quả và độ tương đồng vào mảng
        $results[] = array(
            'product' => $product,
            'similarity' => $similarity
        );
    }
    
    // Sắp xếp kết quả theo độ tương đồng giảm dần
    usort($results, function($a, $b) {
        return $b['similarity'] - $a['similarity'];
    });
    
    // Hiển thị kết quả tìm kiếm
    echo '<div class="search-results">';
    
    if (!empty($results)) {
        foreach ($results as $result) {
            $product = $result['product'];
            
            // Hiển thị thông tin sản phẩm và độ tương đồng
            echo '<div class="product">';
            echo '<h3>' . $product['product_name'] . '</h3>';
            echo '<p>' . $product['price'] . '</p>';
            echo '<p>Độ tương đồng: ' . $result['similarity'] . '%</p>';
            echo '</div>';
        }
    } else {
        echo '<p>Không tìm thấy sản phẩm nào.</p>';
    }
    
    echo '</div>';
}
?>
