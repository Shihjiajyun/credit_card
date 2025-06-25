<?php
// 資料庫連接配置
define('DB_HOST', '43.207.210.147');
define('DB_NAME', 'credit_card_website');
define('DB_USER', 'myuser');
define('DB_PASS', '123456789');

// 建立資料庫連接
try {
    $pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4", DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("資料庫連接失敗: " . $e->getMessage());
}

// 啟動 session
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// 檢查是否已登入的函數
function checkLogin()
{
    if (!isset($_SESSION['admin_id'])) {
        header('Location: admin_login.php');
        exit();
    }
}

// 清理輸入的函數
function cleanInput($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// 生成 slug 的函數
function generateSlug($title, $id = 0)
{
    global $pdo;

    // 將標題轉換為小寫
    $slug = strtolower($title);

    // 將中文字符轉換為拼音（如果需要）
    if (preg_match('/[\x{4e00}-\x{9fa5}]/u', $slug)) {
        $slug = str_replace(' ', '-', $title);
    }

    // 替換空格為破折號
    $slug = str_replace(' ', '-', $slug);

    // 移除特殊字符
    $slug = preg_replace('/[^a-z0-9\-]/', '', $slug);

    // 移除多餘的破折號
    $slug = preg_replace('/-+/', '-', $slug);

    // 移除開頭和結尾的破折號
    $slug = trim($slug, '-');

    // 確保 slug 是唯一的
    $original_slug = $slug;
    $counter = 1;

    while (true) {
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM articles WHERE slug = ? AND id != ?");
        $stmt->execute([$slug, $id]);
        if ($stmt->fetchColumn() == 0) {
            break;
        }
        $slug = $original_slug . '-' . $counter;
        $counter++;
    }

    return $slug;
}
