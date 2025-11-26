<?php include 'question.php'; ?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Test</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Poppins', sans-serif;
        }
        .quiz-container {
            max-width: 800px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        }
        .question-card {
            margin-bottom: 25px;
            border-bottom: 1px solid #eee;
            padding-bottom: 20px;
        }
        .question-title {
            font-weight: 600;
            color: #2c3e50;
            margin-bottom: 15px;
        }
        .option-label {
            display: block;
            padding: 10px 15px;
            border: 2px solid #e9ecef;
            border-radius: 8px;
            margin-bottom: 10px;
            cursor: pointer;
            transition: all 0.2s;
        }
        .option-label:hover {
            background-color: #f8f9fa;
            border-color: #adb5bd;
        }
        input[type="radio"] {
            display: none;
        }
        input[type="radio"]:checked + .option-label {
            background-color: #e7f1ff;
            border-color: #0d6efd;
            color: #0d6efd;
            font-weight: 500;
        }
        .btn-submit {
            padding: 12px 40px;
            font-size: 1.1rem;
            border-radius: 50px;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="quiz-container">
        <h2 class="text-center mb-4 text-primary fw-bold">KNOWLEDGE TEST</h2>
        <p class="text-center text-muted mb-5">Hãy chọn đáp án đúng nhất cho các câu hỏi dưới đây.</p>

        <form action="result.php" method="POST">
            <?php foreach ($questions as $id => $q): ?>
                <div class="question-card">
                    <h5 class="question-title">Câu <?php echo $id; ?>: <?php echo $q['question']; ?></h5>
                    
                    <?php foreach ($q['options'] as $key => $value): ?>
                        <div>
                            <input type="radio" 
                                   id="q<?php echo $id . $key; ?>" 
                                   name="answers[<?php echo $id; ?>]" 
                                   value="<?php echo $key; ?>" required>
                            <label class="option-label" for="q<?php echo $id . $key; ?>">
                                <strong><?php echo $key; ?>.</strong> <?php echo $value; ?>
                            </label>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>

            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-submit shadow">Nộp Bài</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>