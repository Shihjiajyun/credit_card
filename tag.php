<?php
require_once 'config.php';

// 獲取標籤參數
$tag = trim($_GET['tag'] ?? '');

if (empty($tag)) {
    header('Location: index.php');
    exit;
}

// 查詢包含該標籤的文章
$sql = "SELECT * FROM articles 
        WHERE status = 'published' 
        AND meta_keywords LIKE ? 
        ORDER BY published_at DESC";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['%' . $tag . '%']);
    $articles = $stmt->fetchAll();
} catch (PDOException $e) {
    $articles = [];
}
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($tag) ?> - 相關文章</title>
    <link rel="stylesheet" href="styless.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        .article-card {
            height: 100%;
            background: white;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            display: flex;
            flex-direction: column;
        }

        .article-image-container {
            position: relative;
            width: 100%;
            padding-bottom: 60%;
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .article-featured-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .article-card .card-body {
            flex: 1;
            display: flex;
            flex-direction: column;
            padding: 1.25rem;
        }

        .article-card .card-title {
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
            line-height: 1.4;
            height: 3.5rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
        }

        .article-card .card-text {
            flex: 1;
            margin-bottom: 1rem;
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            color: #6c757d;
        }

        .article-footer {
            padding: 1rem;
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            background-color: #f8f9fa;
            margin-top: auto;
        }

        .article-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
        }

        .article-tags .badge {
            font-size: 0.75rem;
            padding: 0.5em 0.8em;
            background-color: #f8f9fa;
            color: #6c757d;
            border: 1px solid #dee2e6;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .article-tags .badge:hover {
            background-color: var(--gold-color);
            color: var(--primary-color);
            border-color: var(--gold-color);
        }

        .tag-header {
            background: linear-gradient(135deg, var(--primary-color), #1a365d);
            padding: 3rem 0;
            margin-bottom: 3rem;
            color: white;
        }

        .tag-header .tag-badge {
            background: var(--gold-color);
            color: var(--primary-color);
            padding: 0.5rem 1rem;
            border-radius: 2rem;
            font-weight: 500;
            margin-bottom: 1rem;
            display: inline-block;
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
                    <li class="nav-item"><a class="nav-link" href="articles.php">最新文章</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- 標籤頁面內容 -->
    <div class="tag-header">
        <div class="container">
            <span class="tag-badge">
                <i class="bi bi-tag-fill me-2"></i><?= htmlspecialchars($tag) ?>
            </span>
            <h1 class="mb-0">相關文章</h1>
        </div>
    </div>

    <div class="container py-5">
        <?php if (!empty($articles)): ?>
            <div class="row g-4">
                <?php foreach ($articles as $article): ?>
                    <div class="col-lg-4 col-md-6" data-aos="fade-up">
                        <div class="card article-card h-100">
                            <?php if ($article['featured_image']): ?>
                                <div class="article-image-container">
                                    <img src="<?= htmlspecialchars($article['featured_image']) ?>"
                                        class="article-featured-image"
                                        alt="<?= htmlspecialchars($article['title']) ?>">
                                </div>
                            <?php endif; ?>
                            <div class="card-body">
                                <div class="article-meta mb-2">
                                    <small class="text-muted">
                                        <i class="bi bi-calendar me-1"></i>
                                        <?= date('Y年m月d日', strtotime($article['published_at'])) ?>
                                    </small>
                                    <small class="text-muted ms-3">
                                        <i class="bi bi-eye me-1"></i>
                                        <?= $article['views'] ?> 次觀看
                                    </small>
                                </div>
                                <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
                                <?php if ($article['excerpt']): ?>
                                    <p class="card-text">
                                        <?= htmlspecialchars(substr($article['excerpt'], 0, 120)) ?>
                                        <?= strlen($article['excerpt']) > 120 ? '...' : '' ?>
                                    </p>
                                <?php endif; ?>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="article.php?slug=<?= urlencode($article['slug']) ?>"
                                        class="btn btn-outline-primary btn-sm">
                                        <i class="bi bi-arrow-right me-1"></i>
                                        閱讀更多
                                    </a>
                                    <?php if ($article['meta_keywords']): ?>
                                        <div class="article-tags">
                                            <?php
                                            $keywords = explode(',', $article['meta_keywords']);
                                            foreach (array_slice($keywords, 0, 3) as $keyword): ?>
                                                <a href="tag.php?tag=<?= urlencode(trim($keyword)) ?>" class="badge text-decoration-none">
                                                    <?= htmlspecialchars(trim($keyword)) ?>
                                                </a>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="text-center py-5">
                <i class="bi bi-search display-1 text-muted mb-3"></i>
                <h3 class="text-muted">沒有找到相關文章</h3>
                <p class="text-muted">目前沒有與「<?= htmlspecialchars($tag) ?>」相關的文章</p>
                <a href="articles.php" class="btn btn-primary mt-3">
                    <i class="bi bi-arrow-left me-2"></i>
                    返回文章列表
                </a>
            </div>
        <?php endif; ?>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- AOS JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>
</body>

</html>