<?php

$output_message = "";
$status_type = "";

if (isset($_POST['submit'])) {
    $target_dir = "/var/www/app/uploads/";
    
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    $original_name = $_FILES["product_img"]["name"];
    $target_file = $target_dir . basename($original_name);

    if (move_uploaded_file($_FILES["product_img"]["tmp_name"], $target_file)) {
        $output = shell_exec("file '" . $target_file . "'"); 
        $output_message = $output;
        $status_type = "success";
    } else {
        $output_message = "Lỗi khi tải ảnh sản phẩm lên hệ thống.";
        $status_type = "error";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload image - 48 Daklao</title>
    <style>
        body { font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif; background: #FAF3E0; color: #3E2723; margin: 0; display: flex; align-items: center; justify-content: center; min-height: 100vh; }
        .container { background: white; padding: 40px; border-radius: 12px; box-shadow: 0 4px 20px rgba(62, 39, 35, 0.1); width: 100%; max-width: 400px; }
        h1 { margin: 0 0 20px; font-size: 1.5rem; text-align: center; }
        form { display: flex; flex-direction: column; gap: 20px; }
        label { font-size: 0.9rem; font-weight: 600; opacity: 0.8; }
        input[type="file"] { padding: 10px; border: 1px solid #eee; border-radius: 8px; font-size: 0.8rem; }
        button { background: #3E2723; color: white; border: none; padding: 14px; border-radius: 8px; font-weight: bold; cursor: pointer; transition: background 0.2s; }
        button:hover { background: #D4AF37; }
        .footer { margin-top: 25px; text-align: center; font-size: 0.8rem; }
        .footer a { color: #D4AF37; text-decoration: none; font-weight: 600; }
        .message { padding: 15px; border-radius: 8px; margin-bottom: 20px; font-size: 0.85rem; line-height: 1.4; background: #f8f8f8; border-left: 4px solid #3E2723; }
    </style>
</head>
<body>

    <div class="container">
        <h1>Tải Ảnh Sản Phẩm</h1>

        <?php if ($output_message): ?>
            <div class="message">
                <strong>Kết quả:</strong><br>
                <?php echo htmlspecialchars($output_message); ?>
            </div>
        <?php endif; ?>

        <form action="" method="post" enctype="multipart/form-data">
            <label>Chọn file ảnh (JPG, PNG, GIF)</label>
            <input type="file" name="product_img" required>
            <button type="submit" name="submit">Tải ảnh lên</button>
        </form>

        <div class="footer">
            <a href="index.html">← Quay lại trang chủ</a>
        </div>
    </div>

</body>
</html>
