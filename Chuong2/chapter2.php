<!DOCTYPE html> 
<html lang="vi"> 
<head> 
    <meta charset="UTF-8"> 
    <title>PHT Chương 2 - PHP Căn Bản</title> 
    <style>
        body{
            font-family: Arial, sans-serif; 
            line-height: 1.6; 
            margin: 20px;
        }
        .box{
            border: 1px solid #ddd; 
            padding: 15px; 
            border-radius: 5px; 
            background-color: #f9f9f9;
        }
        .h1{
            color: #2c3e50;
        }
        .success{
            color: green; 
            font-weight: bold;
        }
        .warning{
            color: orange; 
            font-weight: bold;
        }
        .danger{
            color: red; 
            font-weight: bold;
        }
        
    </style>
</head> 
<body> 
    <h1>Kết quả PHP Căn Bản</h1> 
    <div class = 'box'> 
        <?php 
        // BẮT ĐẦU CODE PHP CỦA BẠN TẠI ĐÂY 
        // TODO 1: Khai báo 3 biến 
            $ho_ten = "Nguyễn Thái Anh"; 
            $diem_tb = 10; 
            $co_di_hoc_chuyen_can = true; 
        // TODO 2: In ra thông tin sinh viên 
            echo "Họ Tên: $ho_ten <br>";
            echo "Điểm: $diem_tb <br>"; 
 
        // TODO 3: Viết cấu trúc IF/ELSE IF/ELSE (2.2) 
            if($diem_tb >= 8.5 && $co_di_hoc_chuyen_can == true){
                echo "<span class='success'> Xếp loại: Giỏi </span>";
            }
            else if($diem_tb >= 6.5 && $co_di_hoc_chuyen_can == true){
                echo "<span class='success'> Xếp loại: Khá </span>";
            }
            else if($diem_tb >= 5.00 && $co_di_hoc_chuyen_can == true){
                echo "<span class='warning'> Xếp loại: Trung bình </span>";
            }
            else{
                echo "<span class='danger'> Xếp loại: Yếu (Cần cố gắng thêm!) </span>";
            }
            echo "<br>";
        // TODO 4: Viết 1 hàm đơn giản (2.3) 
            function chaoMung(){
                echo "Chúc mừng bạn đã hoàn thành PHT Chương 2!" ;
            }
        // TODO 5: Gọi hàm bạn vừa tạo 
            chaoMung();
        // KẾT THÚC CODE PHP CỦA BẠN TẠI ĐÂY 
        ?> 
    </div>
 
</body> 
</html> 