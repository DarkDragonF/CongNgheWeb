<?php include 'question.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Kết Quả Bài Thi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f0f2f5; font-family: sans-serif; }
        .result-box {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .score-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: #0d6efd;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            font-weight: bold;
            margin: 0 auto 30px;
        }
        .correct { color: #198754; font-weight: bold; }
        .wrong { color: #dc3545; text-decoration: line-through; }
        .explanation { background-color: #f8f9fa; padding: 10px; border-radius: 5px; margin-top: 5px; font-size: 0.9rem;}
    </style>
</head>
<body>

<div class="container">
    <div class="result-box">
        <?php
            $score = 0;
            $total = count($questions);
            $userAnswers = isset($_POST['answers']) ? $_POST['answers'] : [];

            // Tính điểm
            foreach ($questions as $id => $q) {
                if (isset($userAnswers[$id]) && $userAnswers[$id] === $q['answer']) {
                    $score++;
                }
            }
            
            $percent = ($score / $total) * 100;
        ?>

        <div class="text-center">
            <h3>Kết Quả Của Bạn</h3>
            <div class="score-circle shadow">
                <?php echo $score; ?> / <?php echo $total; ?>
            </div>
            
            <?php if ($percent >= 80): ?>
                <div class="alert alert-success">Xuất sắc! Bạn nắm rất vững kiến thức.</div>
            <?php elseif ($percent >= 50): ?>
                <div class="alert alert-warning">Khá tốt, nhưng cần ôn tập thêm nhé.</div>
            <?php else: ?>
                <div class="alert alert-danger">Cần cố gắng nhiều hơn!</div>
            <?php endif; ?>
        </div>

        <hr>

        <h4 class="mb-3">Chi tiết đáp án:</h4>
        <?php foreach ($questions as $id => $q): ?>
            <?php 
                $userAns = isset($userAnswers[$id]) ? $userAnswers[$id] : 'Chưa chọn';
                $isCorrect = ($userAns === $q['answer']);
                $cardClass = $isCorrect ? 'border-success' : 'border-danger';
                $bgClass = $isCorrect ? 'bg-success-subtle' : 'bg-danger-subtle';
            ?>
            
            <div class="card mb-3 <?php echo $cardClass; ?>">
                <div class="card-body">
                    <h6 class="card-title">Câu <?php echo $id; ?>: <?php echo $q['question']; ?></h6>
                    
                    <p class="card-text mb-1">
                        Bạn chọn: <span class="<?php echo $isCorrect ? 'text-success fw-bold' : 'text-danger fw-bold'; ?>">
                            <?php echo $userAns; ?>
                        </span>
                    </p>

                    <?php if (!$isCorrect): ?>
                        <p class="card-text text-success">
                            Đáp án đúng: <strong><?php echo $q['answer']; ?>. <?php echo $q['options'][$q['answer']]; ?></strong>
                        </p>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>

        <div class="text-center mt-4">
            <a href="quiz.php" class="btn btn-dark">Làm Lại Bài Thi</a>
        </div>
    </div>
</div>

</body>
</html>