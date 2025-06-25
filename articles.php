<?php
require_once 'config.php';

// 分頁設定
$articles_per_page = 9;
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$offset = ($page - 1) * $articles_per_page;

// 搜索和篩選
$search = isset($_GET['search']) ? trim($_GET['search']) : '';
$category_filter = isset($_GET['category']) ? intval($_GET['category']) : 0;

// 構建查詢條件
$where_conditions = ["articles.status = 'published'"];
$params = [];

if ($search) {
    $where_conditions[] = "(articles.title LIKE ? OR articles.content LIKE ?)";
    $params[] = "%$search%";
    $params[] = "%$search%";
}

if ($category_filter > 0) {
    $where_conditions[] = "article_categories.category_id = ?";
    $params[] = $category_filter;
}

$where_clause = implode(' AND ', $where_conditions);

// 查詢總文章數
try {
    $count_sql = "
        SELECT COUNT(DISTINCT articles.id) 
        FROM articles 
        " . ($category_filter > 0 ? "LEFT JOIN article_categories ON articles.id = article_categories.article_id " : "") . "
        WHERE $where_clause";

    $count_stmt = $pdo->prepare($count_sql);
    $count_stmt->execute($params);
    $total_articles = $count_stmt->fetchColumn();
    $total_pages = ceil($total_articles / $articles_per_page);

    // 查詢文章列表
    $articles_sql = "
        SELECT DISTINCT 
            articles.*, 
            admins.username as author,
            GROUP_CONCAT(categories.name SEPARATOR ', ') as category_names
        FROM articles 
        LEFT JOIN admins ON articles.author_id = admins.id
        LEFT JOIN article_categories ON articles.id = article_categories.article_id
        LEFT JOIN categories ON article_categories.category_id = categories.id
        " . ($category_filter > 0 ? "WHERE $where_clause" : "WHERE $where_clause") . "
        GROUP BY articles.id
        ORDER BY articles.published_at DESC 
        LIMIT ? OFFSET ?";

    $articles_stmt = $pdo->prepare($articles_sql);
    foreach ($params as $key => $value) {
        $articles_stmt->bindValue($key + 1, $value);
    }
    $articles_stmt->bindValue(count($params) + 1, $articles_per_page, PDO::PARAM_INT);
    $articles_stmt->bindValue(count($params) + 2, $offset, PDO::PARAM_INT);
    $articles_stmt->execute();
    $articles = $articles_stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $articles = [];
    error_log($e->getMessage());
}

// 獲取所有分類
try {
    $categories_stmt = $pdo->query("SELECT * FROM categories ORDER BY name");
    $categories = $categories_stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    $categories = [];
    error_log($e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>所有文章 - 美國信用卡玩賺世界</title>
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
            /* 固定寬高比 5:3 */
            overflow: hidden;
            background-color: #f8f9fa;
        }

        .article-image {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .article-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #f8f9fa;
        }

        .article-placeholder i {
            font-size: 2rem;
            color: #dee2e6;
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

        .article-meta {
            font-size: 0.875rem;
            color: #6c757d;
            margin-bottom: 0.5rem;
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
        }

        .article-tags .badge:hover {
            background-color: #e9ecef;
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

    <!-- 頁面標題區域 -->
    <section class="hero-section-small text-white">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12 text-center">
                    <h1 class="display-5 fw-bold mb-3" data-aos="fade-up">文章專區</h1>
                    <p class="lead mb-0" data-aos="fade-up" data-aos-delay="100">
                        探索美國信用卡的世界，掌握最新攻略與技巧
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- 搜索和篩選區域 -->
    <section class="py-4 bg-light">
        <div class="container">
            <div class="row g-3 align-items-end">
                <div class="col-md-6">
                    <form method="GET" class="d-flex">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search"
                                value="<?= htmlspecialchars($search) ?>" placeholder="搜索文章標題或內容...">
                            <button class="btn btn-primary" type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                        <?php if ($category_filter): ?>
                            <input type="hidden" name="category" value="<?= $category_filter ?>">
                        <?php endif; ?>
                    </form>
                </div>
                <div class="col-md-4">
                    <form method="GET" class="d-flex">
                        <select class="form-select" name="category" onchange="this.form.submit()">
                            <option value="0">所有分類</option>
                            <?php foreach ($categories as $category): ?>
                                <option value="<?= $category['id'] ?>"
                                    <?= $category_filter == $category['id'] ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($category['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        <?php if ($search): ?>
                            <input type="hidden" name="search" value="<?= htmlspecialchars($search) ?>">
                        <?php endif; ?>
                    </form>
                </div>
                <div class="col-md-2 text-end">
                    <?php if ($search || $category_filter): ?>
                        <a href="articles.php" class="btn btn-outline-secondary">
                            <i class="bi bi-x-circle me-1"></i>清除篩選
                        </a>
                    <?php endif; ?>
                </div>
            </div>

            <!-- 結果統計 -->
            <div class="mt-3">
                <small class="text-muted">
                    <i class="bi bi-file-text me-1"></i>
                    共找到 <?= $total_articles ?> 篇文章
                    <?php if ($search): ?>
                        ，搜索關鍵字：<strong><?= htmlspecialchars($search) ?></strong>
                    <?php endif; ?>
                    <?php if ($category_filter): ?>
                        <?php
                        $selected_category = array_filter($categories, fn($c) => $c['id'] == $category_filter);
                        if ($selected_category):
                            $selected_category = reset($selected_category);
                        ?>
                            ，分類：<strong><?= htmlspecialchars($selected_category['name']) ?></strong>
                        <?php endif; ?>
                    <?php endif; ?>
                </small>
            </div>
        </div>
    </section>

    <!-- 文章列表 -->
    <section class="py-5">
        <div class="container">
            <?php if (!empty($articles)): ?>
                <div class="row g-4">
                    <?php foreach ($articles as $index => $article): ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <article class="article-card">
                                <div class="article-image-container">
                                    <?php if ($article['featured_image']): ?>
                                        <img src="<?= htmlspecialchars($article['featured_image']) ?>"
                                            alt="<?= htmlspecialchars($article['title']) ?>" class="article-image">
                                    <?php else: ?>
                                        <div class="article-placeholder">
                                            <i class="bi bi-image"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-body">
                                    <div class="article-meta">
                                        <i class="bi bi-calendar me-1"></i>
                                        <?= date('Y/m/d', strtotime($article['published_at'])) ?>
                                        <span class="ms-3">
                                            <i class="bi bi-eye me-1"></i>
                                            <?= $article['views'] ?> 次觀看
                                        </span>
                                    </div>
                                    <h5 class="card-title"><?= htmlspecialchars($article['title']) ?></h5>
                                    <?php if ($article['excerpt']): ?>
                                        <p class="card-text">
                                            <?= htmlspecialchars(mb_substr($article['excerpt'], 0, 100)) ?>...
                                        </p>
                                    <?php endif; ?>
                                </div>
                                <div class="article-footer">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <a href="article.php?slug=<?= urlencode($article['slug']) ?>"
                                            class="btn btn-primary btn-sm">
                                            閱讀更多
                                        </a>
                                    </div>
                                    <?php if ($article['meta_keywords']): ?>
                                        <div class="article-tags">
                                            <?php
                                            $keywords = explode(',', $article['meta_keywords']);
                                            foreach (array_slice($keywords, 0, 3) as $keyword): ?>
                                                <span class="badge">
                                                    <?= htmlspecialchars(trim($keyword)) ?>
                                                </span>
                                            <?php endforeach; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </article>
                        </div>
                    <?php endforeach; ?>
                </div>

                <!-- 分頁 -->
                <?php if ($total_pages > 1): ?>
                    <nav aria-label="文章分頁" class="mt-5">
                        <ul class="pagination justify-content-center">
                            <!-- 上一頁 -->
                            <?php if ($page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="?page=<?= $page - 1 ?><?= $search ? '&search=' . urlencode($search) : '' ?><?= $category_filter ? '&category=' . $category_filter : '' ?>">
                                        <i class="bi bi-chevron-left"></i> 上一頁
                                    </a>
                                </li>
                            <?php endif; ?>

                            <!-- 頁碼 -->
                            <?php
                            $start_page = max(1, $page - 2);
                            $end_page = min($total_pages, $page + 2);

                            if ($start_page > 1): ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="?page=1<?= $search ? '&search=' . urlencode($search) : '' ?><?= $category_filter ? '&category=' . $category_filter : '' ?>">1</a>
                                </li>
                                <?php if ($start_page > 2): ?>
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                <?php endif; ?>
                            <?php endif; ?>

                            <?php for ($i = $start_page; $i <= $end_page; $i++): ?>
                                <li class="page-item <?= $i == $page ? 'active' : '' ?>">
                                    <a class="page-link"
                                        href="?page=<?= $i ?><?= $search ? '&search=' . urlencode($search) : '' ?><?= $category_filter ? '&category=' . $category_filter : '' ?>">
                                        <?= $i ?>
                                    </a>
                                </li>
                            <?php endfor; ?>

                            <?php if ($end_page < $total_pages): ?>
                                <?php if ($end_page < $total_pages - 1): ?>
                                    <li class="page-item disabled"><span class="page-link">...</span></li>
                                <?php endif; ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="?page=<?= $total_pages ?><?= $search ? '&search=' . urlencode($search) : '' ?><?= $category_filter ? '&category=' . $category_filter : '' ?>">
                                        <?= $total_pages ?>
                                    </a>
                                </li>
                            <?php endif; ?>

                            <!-- 下一頁 -->
                            <?php if ($page < $total_pages): ?>
                                <li class="page-item">
                                    <a class="page-link"
                                        href="?page=<?= $page + 1 ?><?= $search ? '&search=' . urlencode($search) : '' ?><?= $category_filter ? '&category=' . $category_filter : '' ?>">
                                        下一頁 <i class="bi bi-chevron-right"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </nav>
                <?php endif; ?>

            <?php else: ?>
                <!-- 無文章時的顯示 -->
                <div class="text-center py-5" data-aos="fade-up">
                    <div class="mb-4">
                        <i class="bi bi-search display-1 text-muted"></i>
                    </div>
                    <h4 class="text-muted mb-3">找不到相關文章</h4>
                    <p class="text-muted mb-4">
                        <?php if ($search || $category_filter): ?>
                            請嘗試調整搜索條件或瀏覽其他分類
                        <?php else: ?>
                            目前還沒有發布任何文章，敬請期待！
                        <?php endif; ?>
                    </p>
                    <?php if ($search || $category_filter): ?>
                        <a href="articles.php" class="btn btn-primary">
                            <i class="bi bi-arrow-left me-2"></i>查看所有文章
                        </a>
                    <?php else: ?>
                        <a href="index.php" class="btn btn-primary">
                            <i class="bi bi-house me-2"></i>返回首頁
                        </a>
                    <?php endif; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer-section py-5">
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