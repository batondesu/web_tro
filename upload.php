<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["file"])) {
    $uploadDir = "uploads/"; // Thư mục lưu trữ ảnh tải lên
    $uploadFile = $uploadDir . basename($_FILES["file"]["name"]);
    
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile)) {
        // Tải lên thành công, tạo liên kết đến ảnh
        $imageUrl = $_SERVER["HTTP_HOST"] . "/$uploadFile";
        echo "Hình ảnh đã được tải lên thành công. Liên kết ảnh: <a href='$imageUrl'>$imageUrl</a>";
    } else {
        echo "Có lỗi xảy ra khi tải lên.";
    }
}
?>
