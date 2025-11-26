<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hiển thị danh sách điểm danh</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Danh sách sinh viên</h2>

    <?php

    $filename = '65HTTT_Danh_sach_diem_danh.csv';


    if (file_exists($filename)) {
        

        if (($handle = fopen($filename, "r")) !== FALSE) {
            
            echo '<table class="table table-bordered table-striped table-hover">';

            if (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                echo '<thead class="table-dark">';
                echo '<tr>';
                foreach ($data as $cell) {
                    echo '<th>' . htmlspecialchars($cell) . '</th>';
                }
                echo '</tr>';
                echo '</thead>';
            }


            echo '<tbody>';
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                echo '<tr>';
                foreach ($data as $cell) {
                    echo '<td>' . htmlspecialchars($cell) . '</td>';
                }
                echo '</tr>';
            }
            echo '</tbody>';
            echo '</table>';

            fclose($handle);
        } else {
            echo '<div class="alert alert-danger">Không thể mở file CSV.</div>';
        }
    } else {
        echo '<div class="alert alert-warning">File ' . $filename . ' không tồn tại. Hãy chắc chắn file nằm cùng thư mục với code PHP.</div>';
    }
    ?>
</div>

</body>
</html>