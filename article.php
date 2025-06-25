<?php
require_once 'config.php';

// 獲取文章 slug
$slug = isset($_GET['slug']) ? trim($_GET['slug']) : '';

if (empty($slug)) {
    header('Location: articles.php');
    exit;
}

try {
    // 查詢文章內容
    $stmt = $pdo->prepare("
        SELECT 
            articles.*,
            admins.username as author,
            GROUP_CONCAT(categories.name SEPARATOR ', ') as category_names
        FROM articles 
        LEFT JOIN admins ON articles.author_id = admins.id
        LEFT JOIN article_categories ON articles.id = article_categories.article_id
        LEFT JOIN categories ON article_categories.category_id = categories.id
        WHERE articles.slug = ? AND articles.status = 'published'
        GROUP BY articles.id
    ");
    $stmt->execute([$slug]);
    $article = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$article) {
        header('Location: articles.php');
        exit;
    }

    // 更新瀏覽次數
    $update_stmt = $pdo->prepare("UPDATE articles SET views = views + 1 WHERE id = ?");
    $update_stmt->execute([$article['id']]);
} catch (PDOException $e) {
    error_log($e->getMessage());
    header('Location: articles.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['title']) ?> - 美國信用卡玩賺世界</title>
    <meta name="description"
        content="<?= htmlspecialchars($article['meta_description'] ?? substr(strip_tags($article['content']), 0, 160)) ?>">
    <?php if ($article['meta_keywords']): ?>
    <meta name="keywords" content="<?= htmlspecialchars($article['meta_keywords']) ?>">
    <?php endif; ?>
    <link rel="stylesheet" href="styless.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
    /* 文章頁面特定樣式 */
    .article-page {
        padding-top: 80px;
        /* 調整頂部間距 */
        background-color: #f8f9fa;
    }

    .article-container {
        max-width: 900px;
        margin: 0 auto;
        background: white;
        border-radius: 15px;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        padding: 40px;
    }

    .article-header {
        text-align: left;
        border-bottom: 1px solid #eee;
        padding-bottom: 30px;
        margin-bottom: 30px;
    }

    .article-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #1a1a1a;
        line-height: 1.3;
    }

    .article-meta {
        font-size: 0.95rem;
        color: #6c757d;
    }

    .article-meta span {
        margin-right: 20px;
    }

    .article-featured-image {
        position: relative;
        height: 400px;
        overflow: hidden;
        border-radius: 15px 15px 0 0;
    }

    .article-featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        object-position: center;
    }

    .article-content {
        font-size: 1.1rem;
        line-height: 1.8;
        color: #333;
    }

    .article-content p {
        margin-bottom: 1.5rem;
    }

    .article-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
        margin-top: 1rem;
    }

    .article-tags .badge {
        font-size: 0.85rem;
        padding: 0.5em 1em;
        background-color: #f8f9fa;
        color: #6c757d;
        border: 1px solid #dee2e6;
        transition: all 0.3s ease;
        white-space: nowrap;
    }

    .article-tags .badge:hover {
        background-color: var(--gold-color);
        color: var(--primary-color);
        border-color: var(--gold-color);
    }

    .article-tags .more-tags {
        font-size: 0.85rem;
        color: #6c757d;
        cursor: pointer;
        padding: 0.5em 1em;
        background-color: transparent;
        border: 1px dashed #dee2e6;
        border-radius: 0.25rem;
        transition: all 0.3s ease;
    }

    .article-tags .more-tags:hover {
        background-color: #f8f9fa;
        border-color: #6c757d;
    }

    .article-content h2,
    .article-content h3 {
        margin-top: 2rem;
        margin-bottom: 1rem;
        color: #1a1a1a;
    }

    .article-categories .badge {
        font-size: 0.85rem;
        padding: 0.5em 1em;
        margin-right: 0.5rem;
        background-color: var(--gold-color);
        color: var(--primary-color);
    }

    .back-button {
        position: fixed;
        bottom: 30px;
        right: 30px;
        z-index: 100;
        background-color: var(--primary-color);
        color: var(--gold-color);
        border: 2px solid var(--gold-color);
        padding: 15px;
        border-radius: 50%;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .back-button:hover {
        background-color: var(--gold-color);
        color: var(--primary-color);
        transform: translateY(-2px);
    }

    .share-buttons {
        margin-top: 50px;
        padding-top: 30px;
        border-top: 1px solid #eee;
    }

    .share-buttons .btn {
        padding: 10px 20px;
        margin: 5px;
        border-radius: 25px;
        transition: all 0.3s ease;
    }

    .share-buttons .btn:hover {
        transform: translateY(-2px);
    }

    /* 響應式調整 */
    @media (max-width: 768px) {
        .article-container {
            padding: 20px;
            margin: 10px;
        }

        .article-featured-image {
            height: 250px;
            margin: -20px -20px 30px -20px;
        }

        .article-title {
            font-size: 2rem;
        }
    }
    </style>
</head>

<body>
    <!-- 導航欄 -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-custom-navy fixed-top">
        <div class="container">
            <a class="navbar-brand" href="index.php">
                <img src="logo.png" alt="Logo" height="50" class="me-2">
                美國信用卡玩賺世界
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="index.php#home">首頁</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#about">關於我們</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#cards">信用卡推薦</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#services">服務介紹</a></li>
                    <li class="nav-item"><a class="nav-link active" href="articles.php">文章專區</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.php#contact">聯絡我們</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 文章內容 -->
    <div class="article-page">
        <div class="container">
            <div class="article-container">
                <?php if ($article['featured_image']): ?>
                <div class="article-featured-image">
                    <img src="<?= htmlspecialchars($article['featured_image']) ?>"
                        alt="<?= htmlspecialchars($article['title']) ?>">
                </div>
                <?php endif; ?>

                <!-- 文章標題區 -->
                <header class="article-header">
                    <?php if ($article['category_names']): ?>
                    <div class="article-categories mb-3">
                        <?php foreach (explode(', ', $article['category_names']) as $category): ?>
                        <span class="badge"><?= htmlspecialchars($category) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <?php endif; ?>

                    <h1 class="article-title"><?= htmlspecialchars($article['title']) ?></h1>

                    <div class="article-meta mb-4">
                        <div class="d-flex flex-wrap align-items-center gap-3">
                            <span class="text-muted">
                                <i class="bi bi-calendar me-1"></i>
                                <?= date('Y年m月d日', strtotime($article['published_at'])) ?>
                            </span>
                            <span class="text-muted">
                                <i class="bi bi-eye me-1"></i>
                                <?= $article['views'] ?> 次觀看
                            </span>
                        </div>

                        <?php if ($article['meta_keywords']): ?>
                        <div class="article-tags mt-3">
                            <?php
                                $keywords = explode(',', $article['meta_keywords']);
                                $keywords = array_map('trim', $keywords);
                                $displayKeywords = array_slice($keywords, 0, 5);
                                $remainingCount = count($keywords) - 5;

                                foreach ($displayKeywords as $keyword): ?>
                            <a href="tag.php?tag=<?= urlencode($keyword) ?>" class="badge text-decoration-none"
                                title="查看更多「<?= htmlspecialchars($keyword) ?>」相關文章">
                                <i class="bi bi-tag-fill me-1"></i>
                                <?= htmlspecialchars($keyword) ?>
                            </a>
                            <?php endforeach;

                                if ($remainingCount > 0): ?>
                            <span class="more-tags"
                                title="<?= htmlspecialchars(implode(', ', array_slice($keywords, 5))) ?>">
                                +<?= $remainingCount ?> 個標籤
                            </span>
                            <?php endif; ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </header>

                <!-- 文章內容 -->
                <div class="article-content">
                    <?= $article['content'] ?>
                </div>

                <!-- 分享按鈕 -->
                <div class="share-buttons text-center">
                    <h5 class="mb-4">分享這篇文章</h5>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?= urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>"
                        target="_blank" class="btn btn-primary">
                        <i class="bi bi-facebook"></i> Facebook
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?= urlencode('https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>&text=<?= urlencode($article['title']) ?>"
                        target="_blank" class="btn btn-info">
                        <i class="bi bi-twitter"></i> Twitter
                    </a>
                    <a href="https://line.me/R/msg/text/?<?= urlencode($article['title'] . ' https://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']) ?>"
                        target="_blank" class="btn btn-success">
                        <i class="bi bi-line"></i> LINE
                    </a>
                </div>
            </div>
        </div>

        <!-- 返回按鈕 -->
        <a href="articles.php" class="back-button">
            <i class="bi bi-arrow-left"></i>
        </a>
    </div>

    <!-- Footer -->
    <footer class="footer-section py-5 mt-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-brand mb-4">
                        <img src="logo.png" alt="Logo" height="40" class="mb-3">
                        <h5 class="text-white">美國信用卡玩賺世界</h5>
                        <p class="text-light-gray">一群對服務吹毛求疵的信用卡顧問組成，與您共同踏上玩賺世界的哩程</p>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6">
                    <h5 class="text-gold mb-4">快速連結</h5>
                    <ul class="footer-links">
                        <li><a href="index.php#home">首頁</a></li>
                        <li><a href="index.php#about">關於我們</a></li>
                        <li><a href="index.php#cards">信用卡推薦</a></li>
                        <li><a href="index.php#services">服務介紹</a></li>
                        <li><a href="articles.php">文章專區</a></li>
                        <li><a href="index.php#contact">聯絡我們</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-gold mb-4">聯絡資訊</h5>
                    <ul class="footer-contact">
                        <li>
                            <i class="bi bi-line"></i>
                            <span>@927ukytp</span>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="footer-divider">
            <div class="footer-bottom">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <p class="copyright mb-0">
                            © 2025 美國信用卡玩賺世界. All rights reserved.
                        </p>
                    </div>
                    <div class="col-md-6 text-md-end">
                        <div class="footer-links-bottom">
                            <a href="#">隱私政策</a>
                            <a href="#">服務條款</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    AOS.init({
        duration: 1000,
        once: true
    });
    </script>
</body>

</html>