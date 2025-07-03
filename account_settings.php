<?php
require_once 'config.php';
checkLogin();

$admin_id = $_SESSION['admin_id'];
$success_message = '';
$error_message = '';

// 獲取當前管理者資訊
$stmt = $pdo->prepare("SELECT username FROM admins WHERE id = ?");
$stmt->execute([$admin_id]);
$admin = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'];
    $new_password = trim($_POST['new_password']);
    $confirm_password = trim($_POST['confirm_password']);

    // 驗證當前密碼
    $stmt = $pdo->prepare("SELECT password FROM admins WHERE id = ?");
    $stmt->execute([$admin_id]);
    $stored_password = $stmt->fetchColumn();

    if (!password_verify($current_password, $stored_password)) {
        $error_message = '當前密碼不正確';
    } else {
        try {
            // 如果提供了新密碼，則更新密碼
            if (empty($new_password)) {
                throw new Exception('請輸入新密碼');
            }

            if (strlen($new_password) < 8) {
                throw new Exception('新密碼長度必須至少為8個字符');
            }

            if ($new_password !== $confirm_password) {
                throw new Exception('新密碼與確認密碼不符');
            }

            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
            $stmt = $pdo->prepare("UPDATE admins SET password = ? WHERE id = ?");
            $stmt->execute([$hashed_password, $admin_id]);

            $success_message = '密碼已成功更新';
        } catch (Exception $e) {
            $error_message = $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="zh-TW">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改密碼 - 美國信用卡玩賺世界</title>
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
            max-width: 800px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(197, 165, 114, 0.2);
        }

        .page-title {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 2rem;
        }

        .form-label {
            color: var(--primary-color);
            font-weight: 600;
        }

        .form-control:focus {
            border-color: var(--gold-color);
            box-shadow: 0 0 0 0.25rem rgba(197, 165, 114, 0.25);
        }

        .btn-gold {
            background: var(--gold-color);
            border: none;
            color: var(--primary-color);
            border-radius: 10px;
            padding: 10px 20px;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-gold:hover {
            background: #d4af37;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(197, 165, 114, 0.3);
        }

        .alert {
            border-radius: 10px;
            margin-bottom: 2rem;
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
                    <a href="admin_dashboard.php" class="btn btn-outline-secondary btn-sm me-2">
                        <i class="bi bi-speedometer2 me-1"></i>返回儀表板
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
            <h2 class="page-title"><i class="bi bi-key me-2"></i>修改密碼</h2>

            <?php if ($success_message): ?>
                <div class="alert alert-success">
                    <i class="bi bi-check-circle me-2"></i><?= htmlspecialchars($success_message) ?>
                </div>
            <?php endif; ?>

            <?php if ($error_message): ?>
                <div class="alert alert-danger">
                    <i class="bi bi-exclamation-circle me-2"></i><?= htmlspecialchars($error_message) ?>
                </div>
            <?php endif; ?>

            <form method="POST" class="needs-validation" novalidate>
                <div class="mb-4">
                    <label for="current_password" class="form-label">當前密碼</label>
                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                    <div class="form-text">請輸入當前密碼以確認更改</div>
                </div>

                <div class="mb-4">
                    <label for="new_password" class="form-label">新密碼</label>
                    <input type="password" class="form-control" id="new_password" name="new_password" minlength="8"
                        required>
                    <div class="form-text">新密碼長度必須至少為8個字符</div>
                </div>

                <div class="mb-4">
                    <label for="confirm_password" class="form-label">確認新密碼</label>
                    <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-gold">
                        <i class="bi bi-save me-2"></i>更新密碼
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // 表單驗證
        (function() {
            'use strict'
            var forms = document.querySelectorAll('.needs-validation')
            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    if (!form.checkValidity()) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        })()

        // 密碼確認驗證
        document.getElementById('confirm_password').addEventListener('input', function() {
            const newPassword = document.getElementById('new_password').value;
            if (this.value !== newPassword) {
                this.setCustomValidity('密碼不符');
            } else {
                this.setCustomValidity('');
            }
        });

        document.getElementById('new_password').addEventListener('input', function() {
            const confirmPassword = document.getElementById('confirm_password');
            if (confirmPassword.value !== '') {
                if (this.value !== confirmPassword.value) {
                    confirmPassword.setCustomValidity('密碼不符');
                } else {
                    confirmPassword.setCustomValidity('');
                }
            }
        });
    </script>
</body>

</html>