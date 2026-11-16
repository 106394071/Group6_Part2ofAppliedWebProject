<?php
$host = "localhost";
$user = "root";
$pwd = "";          // Mặc định XAMPP không có mật khẩu
$sql_db = "project2"; // Khớp với tên database vừa tạo

$conn = @mysqli_connect($host, $user, $pwd, $sql_db);

// Kiểm tra kết nối
if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>