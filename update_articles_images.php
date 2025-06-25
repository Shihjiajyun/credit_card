<?php
require_once 'config.php';

// 為現有文章添加示例圖片
$updates = [
    'us-credit-card-beginner-guide' => 'https://images.unsplash.com/photo-1556742049-0cfed4f6a45d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    'chase-sapphire-preferred-guide' => 'https://images.unsplash.com/photo-1559526324-4b87b5e36e44?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80',
    'maximize-credit-card-rewards' => 'https://images.unsplash.com/photo-1563013544-824ae1b704d3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80'
];

try {
    foreach ($updates as $slug => $image_url) {
        $stmt = $pdo->prepare("UPDATE articles SET featured_image = ? WHERE slug = ?");
        $stmt->execute([$image_url, $slug]);
        echo "已更新文章: $slug<br>";
    }
    echo "<br>所有文章圖片已成功更新！<br>";
    echo '<a href="index.php">返回首頁查看效果</a>';
} catch (PDOException $e) {
    echo "更新失敗: " . $e->getMessage();
}
