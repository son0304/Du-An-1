<?php
session_start();

// Thông tin kết nối cơ sở dữ liệu (giả định)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "du-an-1";

// Tạo kết nối
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

if (isset($_POST['dangnhap'])) {
    $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
    $mat_khau = $_POST['mat_khau']; // Sửa lại tên biến cho khớp với form

    // Câu truy vấn kiểm tra thông tin đăng nhập
    $sql = "SELECT * FROM tb_nguoi_dung WHERE ten_nguoi_dung = ? AND mat_khau = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $ten_nguoi_dung, $mat_khau);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $_SESSION['ten_nguoi_dung'] = $ten_nguoi_dung;
        header('Location: admin.php');
        exit();
    } else {
        echo '<script type="text/javascript">';
        echo 'alert("Đăng nhập thất bại");';
        echo '</script>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
</head>
<style>
    /* Thêm một số CSS để làm đẹp trang đăng nhập */
    body {
        font-family: Arial, sans-serif;
        background-color: beige;
        margin: 0;
        padding: 0;
    }

    .login-container {
        display: flex;
        margin: 100px auto;
        padding: 20px;
        height: 100%;
        width: 100%;
        background-color: #61985c;
    }

    input[type="text"],
    input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        box-sizing: border-box;
        /* Thêm vào để không bị lỗi kích thước */
    }

    img {
        width: 400px;
        height: 100%;
        margin: 100px;
        margin-left: 400px;
    }

    form {
        width: 300px;
        margin: 100px 50px;
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
    }

    input[type="submit"] {
        width: 100%;
        padding: 10px;
        background-color: #5cb85c;
        border: none;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #4cae4c;
    }
</style>

<body>
    <div class="login-container">
        <img src="images/fruit-collection-cakes.webp" alt="">
        <form action="" method="post">
            <h2>Đăng Nhập</h2>
            <input type="text" name="ten_nguoi_dung" placeholder="Tên đăng nhập" required>
            <input type="password" name="mat_khau" placeholder="Mật khẩu" required>
            <input type="submit" value="Đăng nhập" name="dangnhap">
            <p>Bạn có tài khoản? <a href="dangki.php">Đăng kí</a></p>
        </form>
    </div>

</body>

</html>