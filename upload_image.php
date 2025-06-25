<?php
require_once 'config.php';

// 檢查登入狀態
checkLogin();

// 設置回應頭
header('Content-Type: application/json');

$response = ['success' => false, 'message' => '', 'url' => ''];

if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $upload_dir = 'uploads/images/';
    $file_extension = strtolower(pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION));
    $allowed_extensions = array('jpg', 'jpeg', 'png', 'gif');

    if (!in_array($file_extension, $allowed_extensions)) {
        $response['message'] = '只允許上傳 JPG、JPEG、PNG 或 GIF 格式的圖片';
        echo json_encode($response);
        exit;
    }

    $new_filename = uniqid() . '.' . $file_extension;
    $upload_path = $upload_dir . $new_filename;

    if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_path)) {
        $response['success'] = true;
        $response['url'] = $upload_path;
        $response['message'] = '圖片上傳成功';
    } else {
        $response['message'] = '圖片上傳失敗';
    }
} else {
    $response['message'] = '請選擇要上傳的圖片';
}

echo json_encode($response);

/**
 * 壓縮圖片
 */
function compressImage($source, $destination, $quality = 80)
{
    $info = getimagesize($source);

    if ($info === false) {
        throw new Exception('無法獲取圖片資訊');
    }

    $mime = $info['mime'];

    switch ($mime) {
        case 'image/jpeg':
            $image = imagecreatefromjpeg($source);
            break;
        case 'image/png':
            $image = imagecreatefrompng($source);
            break;
        case 'image/gif':
            $image = imagecreatefromgif($source);
            break;
        case 'image/webp':
            $image = imagecreatefromwebp($source);
            break;
        default:
            throw new Exception('不支援的圖片格式');
    }

    if ($image === false) {
        throw new Exception('無法處理圖片');
    }

    // 如果是PNG，保持透明度
    if ($mime === 'image/png') {
        imagealphablending($image, false);
        imagesavealpha($image, true);
        imagepng($image, $destination);
    } else {
        imagejpeg($image, $destination, $quality);
    }

    imagedestroy($image);
}
