<?php
include("./config.php");
include("./Parsedown.php");

if (isset($_GET['file'])) {
  $file = urldecode($_GET['file']);
  $basename = pathinfo($file, PATHINFO_FILENAME);

  $filePath = $problemsDir . '/' . $file;
  if (file_exists($filePath) && pathinfo($filePath, PATHINFO_EXTENSION) == 'md') {
    $markdownContent = file_get_contents($filePath);

    $Parsedown = new Parsedown();
    $htmlContent = $Parsedown->text($markdownContent);
  } else {
    $htmlContent = "File không tồn tại hoặc không phải là file Markdown.";
  }
} else {
  $htmlContent = "Không có file nào được chọn.";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Xem đề bài | <?php echo $basename ?></title>

  <!-- Thêm MathJax để hỗ trợ công thức toán học -->
  <script src="https://polyfill.io/v3/polyfill.min.js?features=es6"></script>
  <script id="MathJax-script" async src="https://cdn.jsdelivr.net/npm/mathjax@3/es5/tex-mml-chtml.js"></script>

  <link rel="stylesheet" href="./css/bootstrap.min.css">

  <!-- Custom CSS -->
  <style>
    body {
      font-size: 20px;
      padding-top: 20px;
      background-color: #f8f9fa;
    }

    .problem-content {
      padding: 20px;
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .problem-content h1,
    .problem-content h2,
    .problem-content h3 {
      margin-top: 20px;
    }

    .problem-content pre {
      background-color: #f1f1f1;
      padding: 10px;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <div class="container">
    <!-- Header -->
    <div class="row mb-4">
      <div class="col-md-12 text-center">
        <h1 class="display-4 alert alert-info"><?php echo htmlspecialchars($basename); ?></h1>
        <a href="index.php" class="btn btn-primary mt-3">Quay lại</a>
      </div>
    </div>

    <!-- Nội dung Markdown -->
    <div class="row" style="margin-top: 20px;">
      <div class="col-md-12">
        <div class="problem-content">
          <?php echo $htmlContent; // Hiển thị nội dung Markdown đã được chuyển đổi 
          ?>
        </div>
      </div>
    </div>


    <!-- Thêm Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76Aq9qORP2iRg1gWQIkF1JENe3RwpB6HY49yQf69dKfyPOmY1xX+nc9P+H7pFq5" crossorigin="anonymous"></script>
</body>

</html>