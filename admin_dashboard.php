<?php
require_once 'config.php';
checkLogin();

if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $stmt = $pdo->prepare("DELETE FROM articles WHERE id = ?");
    $stmt->execute([$_GET['delete']]);
    header('Location: admin_dashboard.php?msg=deleted');
    exit();
}

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 10;
$offset = ($page - 1) * $limit;

$stmt = $pdo->prepare("SELECT a.*, ad.username as author FROM articles a LEFT JOIN admins ad ON a.author_id = ad.id ORDER BY a.created_at DESC LIMIT ?, ?");
$stmt->bindValue(1, $offset, PDO::PARAM_INT);
$stmt->bindValue(2, $limit, PDO::PARAM_INT);
$stmt->execute();
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

$total_stmt = $pdo->query("SELECT COUNT(*) FROM articles");
$total_articles = $total_stmt->fetchColumn();
$total_pages = ceil($total_articles / $limit);

?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>後台管理 - 美國信用卡玩賺世界</title>
    <link rel="stylesheet" href="styless.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, var(--primary-color), #2a4365);
            min-height: 100vh;
        }

        .admin-header {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-bottom: 2px solid var(--gold-color);
            padding: 1rem 0;
            margin-bottom: 2rem;
        }

        .admin-container {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            padding: 2rem;
            margin: 2rem auto;
            max-width: 1200px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(197, 165, 114, 0.2);
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 2rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .btn-gold {
            background: var(--gold-color);
            border: none;
            color: var(--primary-color);
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-gold:hover {
            background: #d4af37;
            color: var(--primary-color);
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(197, 165, 114, 0.3);
        }

        .table {
            background: white;
            border-radius: 15px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }

        .table thead {
            background: linear-gradient(135deg, var(--primary-color), #2a4365);
            color: white;
        }

        .table th {
            border: none;
            padding: 1rem;
            font-weight: 600;
        }

        .table td {
            padding: 1rem;
            border-top: 1px solid #e2e8f0;
            vertical-align: middle;
        }

        .status-badge {
            padding: 5px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .status-published {
            background: rgba(40, 167, 69, 0.1);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .status-draft {
            background: rgba(255, 193, 7, 0.1);
            color: #ffc107;
            border: 1px solid rgba(255, 193, 7, 0.3);
        }

        .status-archived {
            background: rgba(108, 117, 125, 0.1);
            color: #6c757d;
            border: 1px solid rgba(108, 117, 125, 0.3);
        }

        .alert-success {
            background: rgba(40, 167, 69, 0.1);
            border: 1px solid rgba(40, 167, 69, 0.3);
            color: #28a745;
            border-radius: 10px;
        }
    </style>
</head>

<body>
    <div class="admin-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h4 class="mb-0" style="color: var(--primary-color);">
                        <img src="logo.png" alt="Logo" height="40" class="me-2">
                        後台管理系統
                    </h4>
                </div>
                <div class="col-md-6 text-end">
                    <span class="me-3">歡迎，<?= $_SESSION['admin_username'] ?></span>
                    <a href="index.php" class="btn btn-outline-secondary btn-sm me-2">
                        <i class="bi bi-house me-1"></i>首頁
                    </a>
                    <a href="logout.php" class="btn btn-outline-danger btn-sm">
                        <i class="bi bi-box-arrow-right me-1"></i>登出
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="admin-container">
            <?php if (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
                <div class="alert alert-success">
                    <i class="bi bi-check-circle me-2"></i>
                    文章已成功刪除
                </div>
            <?php endif; ?>

            <div class="page-title">
                <h2><i class="bi bi-newspaper me-2"></i>文章管理</h2>
                <a href="article_editor.php" class="btn btn-gold">
                    <i class="bi bi-plus-circle me-2"></i>新增文章
                </a>
            </div>

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>標題</th>
                            <th>狀態</th>
                            <th>作者</th>
                            <th>觀看次數</th>
                            <th>建立時間</th>
                            <th>操作</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($articles)): ?>
                            <tr>
                                <td colspan="7" class="text-center py-4">
                                    <i class="bi bi-inbox display-4 text-muted"></i>
                                    <p class="text-muted mt-2">尚無文章</p>
                                </td>
                            </tr>
                        <?php else: ?>
                            <?php foreach ($articles as $article): ?>
                                <tr>
                                    <td><?= $article['id'] ?></td>
                                    <td>
                                        <strong><?= htmlspecialchars($article['title']) ?></strong>
                                        <?php if ($article['excerpt']): ?>
                                            <br><small
                                                class="text-muted"><?= substr(htmlspecialchars($article['excerpt']), 0, 80) ?>...</small>
                                        <?php endif; ?>
                                    </td>
                                    <td>
                                        <span class="status-badge status-<?= $article['status'] ?>">
                                            <?php
                                            switch ($article['status']) {
                                                case 'published':
                                                    echo '已發布';
                                                    break;
                                                case 'draft':
                                                    echo '草稿';
                                                    break;
                                                case 'archived':
                                                    echo '已封存';
                                                    break;
                                            }
                                            ?>
                                        </span>
                                    </td>
                                    <td><?= htmlspecialchars($article['author']) ?></td>
                                    <td><i class="bi bi-eye me-1"></i><?= $article['views'] ?></td>
                                    <td><?= date('Y-m-d H:i', strtotime($article['created_at'])) ?></td>
                                    <td>
                                        <a href="article_editor.php?id=<?= $article['id'] ?>"
                                            class="btn btn-sm btn-outline-primary me-1">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="?delete=<?= $article['id'] ?>" class="btn btn-sm btn-outline-danger"
                                            onclick="return confirm('確定要刪除這篇文章嗎？')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>