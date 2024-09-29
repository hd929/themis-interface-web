<?php
include("./config.php");
session_start();
if (!isset($_SESSION['tuser'])) header("Location: /login.php");
else {
  $user['id'] = $_SESSION['tid'];
  $user['username'] = $_SESSION['tuser'];
  $user['password'] = $_SESSION['tpass'];
}

if (!is_dir("./contests/submit/Logs")) {
  if (mkdir("./contests/submit/Logs", 0755, true)) {
  }
}

if (!is_dir("./contests/submit/Penalty")) {
  if (mkdir("./contests/submit/Penalty", 0755, true)) {
  }
}

if (!is_dir("./contests/submit/History")) {
  if (mkdir("./contests/submit/History", 0755, true)) {
  }
}

$sourceFile = 'account.def.xml'; // File nguồn
$destinationFile = 'account.xml'; // File đích

// Kiểm tra nếu file account.xml không tồn tại
if (!file_exists($destinationFile)) {
  // Sao chép file account.def.xml thành account.xml
  if (copy($sourceFile, $destinationFile)) {
    echo "File account.xml đã được tạo từ account.def.xml.";
  } else {
    echo "Không thể sao chép file.";
  }
} else {
  echo "File account.xml đã tồn tại.";
}
