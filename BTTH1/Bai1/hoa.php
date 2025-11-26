<?php
$dataFile = 'data.json';
$flowers = [];

if (file_exists($dataFile)) {
    $jsonData = file_get_contents($dataFile);
    $flowers = json_decode($jsonData, true);
    if (!is_array($flowers)) {
        $flowers = [];
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Flower Shop Gallery</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #ff6b81; 
            --secondary-color: #2f3542; 
            --bg-color: #f7f1e3; 
            --white: #ffffff;
            --warning-color: #f39c12;
            --danger-color: #e74c3c;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-color);
            margin: 0;
            padding: 0;
            color: var(--secondary-color);
        }

        header {
            background-color: var(--white);
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
            position: sticky;
            top: 0;
            z-index: 1000;
        }

        .navbar {
            max-width: 1200px;
            margin: 0 auto;
            padding: 15px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-family: 'Dancing Script', cursive;
            font-size: 2rem;
            color: var(--primary-color);
            text-decoration: none;
        }

        .search-bar { display: none; }
        @media (min-width: 768px) {
            .search-bar { display: block; }
            .search-input {
                padding: 10px 20px;
                border-radius: 20px;
                border: 1px solid #ddd;
                width: 300px;
                outline: none;
                transition: border 0.3s;
            }
            .search-input:focus { border-color: var(--primary-color); }
        }

        .btn-add-new {
            background-color: var(--primary-color);
            color: white;
            padding: 10px 20px;
            border-radius: 30px;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.9rem;
            box-shadow: 0 4px 6px rgba(255, 107, 129, 0.3);
            transition: all 0.3s ease;
        }
        .btn-add-new:hover { background-color: #ff4757; transform: translateY(-2px); }

        .hero-section {
            text-align: center;
            padding: 40px 20px;
            background: linear-gradient(135deg, #fff0f3 0%, #fff 100%);
            margin-bottom: 30px;
        }
        .hero-title { font-family: 'Dancing Script', cursive; font-size: 3rem; margin: 0; }
        .hero-subtitle { color: #747d8c; margin-top: 10px; font-size: 1.1rem; }

        .gallery-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); 
            gap: 30px;
            max-width: 1200px;
            margin: 0 auto 50px; 
            padding: 0 20px;
        }

        .flower-card {
            background: white;
            border-radius: 16px;
            overflow: hidden; 
            box-shadow: 0 10px 20px rgba(0,0,0,0.03); 
            transition: transform 0.3s ease;
            display: flex;
            flex-direction: column;
        }
        .flower-card:hover { transform: translateY(-7px); box-shadow: 0 15px 30px rgba(0,0,0,0.1); }

        .flower-img { width: 100%; height: 220px; object-fit: cover; }

        .card-body {
            padding: 20px;
            flex-grow: 1; 
            display: flex;
            flex-direction: column;
            justify-content: space-between; 
        }

        .card-title { margin: 0 0 8px; font-size: 1.3em; font-weight: 600; }
        .card-text { color: #747d8c; font-size: 0.95em; line-height: 1.6; margin-bottom: 20px; }

        .action-group {
            display: flex;
            gap: 10px;
            margin-top: auto;
        }

        .btn-action {
            flex: 1;
            text-align: center;
            padding: 10px 0;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            color: white;
            transition: opacity 0.3s;
            font-size: 0.9rem;
        }

        .btn-action:hover { opacity: 0.85; }

        .btn-edit {
            background-color: var(--warning-color);
            box-shadow: 0 4px 6px rgba(243, 156, 18, 0.2);
        }

        .btn-delete {
            background-color: var(--danger-color);
            box-shadow: 0 4px 6px rgba(231, 76, 60, 0.2);
        }
    </style>
</head>
<body>

    <header>
        <div class="navbar">
            <a href="#" class="logo">🌸 FlowerStudio</a>

            <div class="search-bar">
                <input type="text" class="search-input" placeholder="Tìm kiếm loài hoa bạn thích...">
            </div>

            <a href="themmoi.php" class="btn-add-new">
                <span>+</span> Thêm mới
            </a>
        </div>
    </header>

    <div class="hero-section">
        <h1 class="hero-title">Bộ Sưu Tập Hương Sắc</h1>
        <p class="hero-subtitle">Quản lý danh sách các loài hoa của bạn</p>
    </div>

    <div class="gallery-container">
        <?php foreach ($flowers as $flower): ?>
            <div class="flower-card">
                <img src="<?php echo htmlspecialchars($flower['image']); ?>" 
                     alt="<?php echo htmlspecialchars($flower['name']); ?>" 
                     class="flower-img"
                     onerror="this.src='https://via.placeholder.com/400x300?text=No+Image'">
                
                <div class="card-body">
                    <div>
                        <h3 class="card-title"><?php echo htmlspecialchars($flower['name']); ?></h3>
                        <p class="card-text">
                            <?php echo !empty($flower['desc']) ? htmlspecialchars($flower['desc']) : 'Chưa có mô tả.'; ?>
                        </p>
                    </div>
                    
                    <div class="action-group">
                        <a href="sua.php?id=<?php echo $flower['id']; ?>" class="btn-action btn-edit">
                            ✏️ Sửa
                        </a>
                        <a href="delete.php?id=<?php echo $flower['id']; ?>" 
                           class="btn-action btn-delete"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa loài hoa này không?');">
                            🗑️ Xóa
                        </a>
                    </div>

                </div>
            </div>
        <?php endforeach; ?>
    </div>

</body>
</html>