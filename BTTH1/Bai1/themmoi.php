<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Hoa Mới</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            margin: 0;
        }

        .form-container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 25px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #555;
        }

        input[type="text"], 
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 6px;
            box-sizing: border-box; /* Để padding không làm vỡ layout */
            font-size: 16px;
        }

        textarea {
            resize: vertical; /* Cho phép kéo giãn chiều cao */
            height: 100px;
        }

        input[type="file"] {
            padding: 5px 0;
        }

        .btn-submit {
            width: 100%;
            padding: 12px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: background 0.3s;
        }

        .btn-submit:hover {
            background-color: #2980b9;
        }

        .btn-back {
            display: block;
            text-align: center;
            margin-top: 15px;
            color: #666;
            text-decoration: none;
        }

        .alert {
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 20px;
            text-align: center;
        }
        .success { background-color: #d4edda; color: #155724; }
        .error { background-color: #f8d7da; color: #721c24; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Thêm Mới Hoa</h2>
        
        <!-- <?php if($message): ?>
            <div class="alert success"><?php echo $message; ?></div>
        <?php endif; ?>
        <?php if($error): ?>
            <div class="alert error"><?php echo $error; ?></div>
        <?php endif; ?> -->


        <form action="" method="POST" enctype="multipart/form-data">
            
            <div class="form-group">
                <label for="name">Tên loài hoa:</label>
                <input type="text" id="name" name="name" required placeholder="Ví dụ: Hoa Hướng Dương">
            </div>

            <div class="form-group">
                <label for="image">Hình ảnh:</label>
                <input type="file" id="image" name="image" accept="image/*" required>
            </div>

            <div class="form-group">
                <label for="desc">Mô tả ngắn:</label>
                <textarea id="desc" name="desc" placeholder="Mô tả về loài hoa này..."></textarea>
            </div>

            <button type="submit" class="btn-submit">Lưu Lại</button>
        </form>

        <a href="hoa.php" class="btn-back">← Quay lại danh sách</a>
    </div>

</body>
</html>