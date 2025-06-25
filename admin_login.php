<?php
require_once 'config.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = cleanInput($_POST['username']);
    $password = $_POST['password'];

    if (!empty($username) && !empty($password)) {
        try {
            $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
            $stmt->execute([$username]);
            $admin = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($admin) {
                // 使用 password_verify 驗證密碼
                if (password_verify($password, $admin['password'])) {
                    $_SESSION['admin_id'] = $admin['id'];
                    $_SESSION['admin_username'] = $admin['username'];
                    header('Location: admin_dashboard.php');
                    exit();
                } else {
                    $error = '密碼錯誤';
                }
            } else {
                $error = '用戶名不存在';
            }
        } catch (PDOException $e) {
            $error = '資料庫錯誤：' . $e->getMessage();
        }
    } else {
        $error = '請填寫所有欄位';
    }
}

// 重新生成一個新的管理員密碼（如果需要）
if (isset($_GET['reset']) && $_GET['reset'] === 'true') {
    $new_password = 'admin123';
    $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
    try {
        $stmt = $pdo->prepare("UPDATE admins SET password = ? WHERE username = 'admin'");
        $stmt->execute([$hashed_password]);
        $error = '密碼已重置';
    } catch (PDOException $e) {
        $error = '密碼重置失敗：' . $e->getMessage();
    }
}
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
        .login-container {
            min-height: 100vh;
            background: linear-gradient(135deg, var(--primary-color), #2a4365);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('card.jpg') center/cover no-repeat;
            opacity: 0.1;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            padding: 3rem;
            width: 100%;
            max-width: 450px;
            position: relative;
            z-index: 1;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(197, 165, 114, 0.2);
        }

        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .login-header h2 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .login-header p {
            color: #666;
            margin: 0;
        }

        .form-control {
            border: 2px solid #e2e8f0;
            border-radius: 10px;
            padding: 12px 15px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--gold-color);
            box-shadow: 0 0 0 0.25rem rgba(197, 165, 114, 0.25);
        }

        .btn-login {
            background: linear-gradient(135deg, var(--primary-color), #2a4365);
            border: none;
            border-radius: 10px;
            padding: 12px;
            font-weight: 600;
            color: white;
            transition: all 0.3s ease;
            width: 100%;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #2a4365, var(--primary-color));
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(26, 54, 93, 0.3);
            color: white;
        }

        .error-alert {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #dc3545;
            border-radius: 10px;
            padding: 12px;
            margin-bottom: 1rem;
        }

        .back-to-home {
            position: absolute;
            top: 20px;
            left: 20px;
            z-index: 2;
        }

        .back-to-home a {
            color: white;
            text-decoration: none;
            display: flex;
            align-items: center;
            background: rgba(255, 255, 255, 0.1);
            padding: 10px 15px;
            border-radius: 8px;
            transition: all 0.3s ease;
            backdrop-filter: blur(10px);
        }

        .back-to-home a:hover {
            background: rgba(255, 255, 255, 0.2);
            color: var(--gold-color);
        }
    </style>
</head>

<body>
    <div class="login-container">
        <div class="back-to-home">
            <a href="index.php">
                <i class="bi bi-arrow-left me-2"></i>
                返回首頁
            </a>
        </div>

        <div class="login-card">
            <div class="login-header">
                <img src="logo.png" alt="Logo" height="60" class="mb-3">
                <h2>後台管理</h2>
                <p>美國信用卡玩賺世界</p>
            </div>

            <?php if ($error): ?>
                <div class="error-alert">
                    <i class="bi bi-exclamation-triangle me-2"></i>
                    <?= $error ?>
                </div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">使用者名稱</label>
                    <input type="text" class="form-control" id="username" name="username" required>
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label">密碼</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>

                <button type="submit" class="btn btn-login">
                    <i class="bi bi-box-arrow-in-right me-2"></i>
                    登入
                </button>
            </form>

            <div class="text-center mt-4">
                <small class="text-muted">
                    <i class="bi bi-shield-lock me-1"></i>
                    安全的管理平台
                </small>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>