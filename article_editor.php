<?php
require_once 'config.php';
checkLogin();

$article = null;
$is_edit = false;

// 如果是編輯模式
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $stmt = $pdo->prepare("SELECT * FROM articles WHERE id = ?");
    $stmt->execute([$_GET['id']]);
    $article = $stmt->fetch();
    $is_edit = true;
}

// 獲取分類
$categories_stmt = $pdo->query("SELECT * FROM categories ORDER BY name");
$categories = $categories_stmt->fetchAll();

// 處理表單提交
if ($_POST) {
    $title = cleanInput($_POST['title'] ?? '');
    $content = $_POST['content'] ?? '';
    $excerpt = cleanInput($_POST['excerpt'] ?? '');
    $status = $_POST['status'] ?? 'draft';
    $meta_keywords = cleanInput($_POST['meta_keywords'] ?? '');
    $response = ['success' => false, 'message' => ''];

    // 處理圖片上傳
    $featured_image = '';
    if (isset($_FILES['featured_image']) && $_FILES['featured_image']['error'] == 0) {
        $upload_dir = 'uploads/images/';
        $file_extension = strtolower(pathinfo($_FILES['featured_image']['name'], PATHINFO_EXTENSION));
        $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

        if (!in_array($file_extension, $allowed_extensions)) {
            $response['message'] = '只允許上傳 JPG、JPEG、PNG 或 GIF 格式的圖片';
            echo json_encode($response);
            exit;
        }

        $new_filename = uniqid() . '.' . $file_extension;
        $upload_path = $upload_dir . $new_filename;

        if (!move_uploaded_file($_FILES['featured_image']['tmp_name'], $upload_path)) {
            $response['message'] = '圖片上傳失敗';
            echo json_encode($response);
            exit;
        }
        $featured_image = $upload_path;
    }

    // 驗證必填欄位
    if (empty($title) || empty($content)) {
        $response['message'] = '請填寫標題和內容';
        echo json_encode($response);
        exit;
    }

    try {
        // 處理 slug
        $custom_slug = cleanInput($_POST['custom_slug'] ?? '');
        $slug = !empty($custom_slug) ? $custom_slug : generateSlug($title, $is_edit ? $_GET['id'] : 0);

        // 設定發布時間（UTC+8）
        $published_at = null;
        if ($status === 'published') {
            $published_at = date('Y-m-d H:i:s', strtotime('+8 hours'));
        }

        if ($is_edit) {
            // 更新文章
            $sql = "UPDATE articles SET 
                    title = ?, 
                    content = ?, 
                    excerpt = ?, 
                    status = ?, 
                    slug = ?,
                    meta_keywords = ?,
                    updated_at = NOW()";
            $params = [$title, $content, $excerpt, $status, $slug, $meta_keywords];

            if ($published_at) {
                $sql .= ", published_at = ?";
                $params[] = $published_at;
            }

            // 只有在有新上傳圖片時才更新圖片欄位
            if (!empty($featured_image)) {
                $sql .= ", featured_image = ?";
                $params[] = $featured_image;
            }

            $sql .= " WHERE id = ?";
            $params[] = $_GET['id'];

            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
        } else {
            // 創建新文章
            $sql = "INSERT INTO articles (title, content, excerpt, status, featured_image, author_id, slug, meta_keywords, created_at, updated_at";
            $values = "?, ?, ?, ?, ?, ?, ?, ?, NOW(), NOW()";
            $params = [$title, $content, $excerpt, $status, $featured_image, $_SESSION['admin_id'], $slug, $meta_keywords];

            if ($published_at) {
                $sql .= ", published_at";
                $values .= ", ?";
                $params[] = $published_at;
            }

            $sql .= ") VALUES (" . $values . ")";
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
        }

        $response['success'] = true;
        $response['message'] = '文章保存成功';
        echo json_encode($response);
        exit;
    } catch (PDOException $e) {
        $response['message'] = '保存文章時發生錯誤: ' . $e->getMessage();
        echo json_encode($response);
        exit;
    }
}
?>
<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $is_edit ? '編輯' : '新增' ?>文章</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    <style>
        :root {
            --primary-color: #1a365d;
            --gold-color: #c5a572;
            --border-radius: 10px;
        }

        body {
            min-height: 100vh;
            background-color: #f8f9fa;
            padding-top: 2rem;
            padding-bottom: 2rem;
        }

        .preview-image {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
            border-radius: var(--border-radius);
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .note-editor {
            background-color: white;
            border-radius: var(--border-radius) !important;
        }

        .card {
            border: none;
            border-radius: var(--border-radius);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), #2a4a7f);
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            padding: 1.5rem;
        }

        .form-label {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 0.5rem;
        }

        .required::after {
            content: '*';
            color: #e74c3c;
            margin-left: 4px;
        }

        .form-control,
        .form-select {
            border-radius: 8px;
            border: 1px solid #dee2e6;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold-color);
            box-shadow: 0 0 0 0.2rem rgba(197, 165, 114, 0.25);
        }

        .btn {
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-primary:hover {
            background-color: #2a4a7f;
            border-color: #2a4a7f;
            transform: translateY(-1px);
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #5a6268;
            transform: translateY(-1px);
        }

        .input-group {
            border-radius: var(--border-radius);
            overflow: hidden;
        }

        .input-group .btn {
            border-radius: 0 8px 8px 0;
        }

        .text-muted {
            font-size: 0.875rem;
        }

        #imagePreview {
            margin-top: 1rem;
        }

        .note-editor .note-toolbar {
            background-color: #f8f9fa;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
        }

        .note-editor .note-statusbar {
            border-radius: 0 0 var(--border-radius) var(--border-radius);
        }

        .note-editor .note-editing-area {
            background-color: white;
        }

        .tag-input-container {
            position: relative;
        }

        .tag-suggestions {
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background: white;
            border: 1px solid #dee2e6;
            border-radius: 8px;
            margin-top: 4px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            display: none;
        }

        .tag-suggestion-item {
            padding: 0.5rem 1rem;
            cursor: pointer;
            transition: all 0.2s ease;
        }

        .tag-suggestion-item:hover {
            background-color: #f8f9fa;
        }

        .form-section {
            background: white;
            padding: 1.5rem;
            border-radius: var(--border-radius);
            margin-bottom: 1.5rem;
        }

        .form-section-title {
            color: var(--primary-color);
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 1.5rem;
            padding-bottom: 0.75rem;
            border-bottom: 2px solid #f0f0f0;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <h4 class="mb-0 text-white d-flex align-items-center">
                            <i class="bi bi-pencil-square me-2"></i>
                            <?= $is_edit ? '編輯' : '新增' ?>文章
                        </h4>
                    </div>
                    <div class="card-body p-4">
                        <form id="articleForm" method="post" enctype="multipart/form-data">
                            <!-- 基本信息 -->
                            <div class="form-section">
                                <div class="form-section-title">
                                    <i class="bi bi-info-circle me-2"></i>基本信息
                                </div>
                                <div class="mb-4">
                                    <label class="form-label required">標題</label>
                                    <input type="text" name="title" class="form-control" required
                                        value="<?= $article ? htmlspecialchars($article['title']) : '' ?>"
                                        placeholder="請輸入文章標題">
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">網址別名 (Slug)</label>
                                    <div class="input-group">
                                        <input type="text" name="custom_slug" class="form-control"
                                            value="<?= $article ? htmlspecialchars($article['slug']) : '' ?>"
                                            placeholder="留空將自動根據標題生成">
                                        <button type="button" class="btn btn-outline-secondary" id="generateSlug">
                                            <i class="bi bi-magic me-1"></i>自動生成
                                        </button>
                                    </div>
                                    <small class="text-muted">
                                        <i class="bi bi-info-circle me-1"></i>用於文章網址，只能包含小寫字母、數字和破折號
                                    </small>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">摘要</label>
                                    <textarea name="excerpt" class="form-control" rows="3"
                                        placeholder="請輸入文章摘要，將顯示在文章列表中"><?= $article ? htmlspecialchars($article['excerpt']) : '' ?></textarea>
                                </div>
                            </div>

                            <!-- 文章內容 -->
                            <div class="form-section">
                                <div class="form-section-title">
                                    <i class="bi bi-file-text me-2"></i>文章內容
                                </div>
                                <div class="mb-4">
                                    <label class="form-label required">內容</label>
                                    <textarea name="content" id="content" class="form-control" required>
                                        <?= $article ? htmlspecialchars($article['content']) : '' ?>
                                    </textarea>
                                </div>
                            </div>

                            <!-- 媒體與標籤 -->
                            <div class="form-section">
                                <div class="form-section-title">
                                    <i class="bi bi-image me-2"></i>媒體與標籤
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">特色圖片</label>
                                    <input type="file" name="featured_image" class="form-control" accept="image/*"
                                        onchange="previewImage(this);">
                                    <?php if ($article && $article['featured_image']): ?>
                                        <div class="mt-3">
                                            <p class="text-muted mb-2">當前圖片：</p>
                                            <img src="<?= htmlspecialchars($article['featured_image']) ?>"
                                                class="preview-image" alt="當前特色圖片">
                                        </div>
                                    <?php endif; ?>
                                    <div id="imagePreview"></div>
                                </div>

                                <div class="mb-4">
                                    <label class="form-label">文章標籤</label>
                                    <div class="tag-input-container">
                                        <input type="text" name="meta_keywords" class="form-control"
                                            value="<?= $article ? htmlspecialchars($article['meta_keywords']) : '' ?>"
                                            placeholder="請用逗號分隔多個標籤，例如：美國信用卡,哩程累積,開卡禮">
                                        <small class="text-muted">
                                            <i class="bi bi-tags me-1"></i>標籤之間請用逗號分隔
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <!-- 發布設定 -->
                            <div class="form-section">
                                <div class="form-section-title">
                                    <i class="bi bi-gear me-2"></i>發布設定
                                </div>
                                <div class="mb-4">
                                    <label class="form-label">狀態</label>
                                    <select name="status" class="form-select">
                                        <option value="draft"
                                            <?= ($article && $article['status'] == 'draft') ? 'selected' : '' ?>>
                                            <i class="bi bi-file-earmark"></i>草稿
                                        </option>
                                        <option value="published"
                                            <?= ($article && $article['status'] == 'published') ? 'selected' : '' ?>>
                                            <i class="bi bi-file-earmark-check"></i>發布
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="text-end mt-4">
                                <a href="admin_dashboard.php" class="btn btn-secondary me-2">
                                    <i class="bi bi-x-circle me-1"></i>取消
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="bi bi-check-circle me-1"></i>保存
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // 初始化 Summernote
            $('#content').summernote({
                height: 300,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ],
                callbacks: {
                    onImageUpload: function(files) {
                        // 這裡可以添加圖片上傳的處理
                        for (let i = 0; i < files.length; i++) {
                            uploadImage(files[i]);
                        }
                    }
                }
            });

            // 表單提交處理
            $('#articleForm').on('submit', function(e) {
                e.preventDefault();

                let formData = new FormData(this);

                $.ajax({
                    url: 'article_editor.php<?= $is_edit ? "?id=" . $_GET['id'] : "" ?>',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        let result = JSON.parse(response);
                        if (result.success) {
                            Swal.fire({
                                icon: 'success',
                                title: '成功',
                                text: result.message,
                                showConfirmButton: false,
                                timer: 1500
                            }).then(() => {
                                window.location.href = 'admin_dashboard.php';
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: '錯誤',
                                text: result.message
                            });
                        }
                    },
                    error: function() {
                        Swal.fire({
                            icon: 'error',
                            title: '錯誤',
                            text: '保存文章時發生錯誤'
                        });
                    }
                });
            });

            // 添加自動生成 slug 的功能
            $('#generateSlug').on('click', function() {
                const title = $('input[name="title"]').val();
                if (title) {
                    const slug = title
                        .toLowerCase()
                        .replace(/[^a-z0-9\u4e00-\u9fa5]/g, '-') // 保留中文字符
                        .replace(/-+/g, '-')
                        .replace(/^-|-$/g, '');
                    $('input[name="custom_slug"]').val(slug);
                }
            });

            // 當標題改變時自動更新 slug（如果 slug 是空的）
            $('input[name="title"]').on('blur', function() {
                if (!$('input[name="custom_slug"]').val()) {
                    $('#generateSlug').click();
                }
            });
        });

        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            preview.innerHTML = '';

            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'preview-image';
                    preview.appendChild(img);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        // Summernote 圖片上傳處理
        function uploadImage(file) {
            let formData = new FormData();
            formData.append('file', file);

            $.ajax({
                url: 'upload_image.php',
                method: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    let result = JSON.parse(response);
                    if (result.success) {
                        $('#content').summernote('insertImage', result.url);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: '錯誤',
                            text: '圖片上傳失敗'
                        });
                    }
                }
            });
        }
    </script>
</body>

</html>