<?php
    session_start();
    // kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng tới trang login

    if (!isset($_SESSION['ten_nguoi_dung']) && !isset($_SESSION['mat_khau'])) {
        header('location: login.php');
        exit();
    }
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị ngưởi dùng</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background: #f4f4f4;
        }
        .navbar {
            height: 60px;
            background-color: #e0d9d9;
            color: white;
            padding: 10px;
            text-align: center;
        }
        .sidebar {
            width: 200px;
            height: 100vh;
            background: #555;
            padding: 30px;
            position: fixed;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 10px;
            margin-bottom: 50px;

        }
        .sidebar a:hover {
            background: #444;
        }
        .main-content {
            margin-left: 300px;
            padding: 20px;
        }
        tr {
            margin-bottom: 40px; /* Khoảng cách dưới mỗi dòng */
}
        th {
            padding: 50px;
            border: 1px solid black;
        }
        td a {
            padding: 50px;
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="navbar">
        <h1>Trang Quản Trị</h1>
    </div>
    <div class="sidebar">
        <a href="#">Tài khoản</a>
        <a href="#">Quản lý chức vụ</a>
        <a href="#">Quản Lý Người Dùng</a>
        <a href="#">Quản lý danh mục</a>
        <a href="#">Quản lý sản phẩm</a>
        <a href="#">Quản lý bình luận</a>
        <a href="#">Quản lý đánh giá</a>
        <a href="#">Quản lý nội dung website</a>
    </div>
    <div class="main-content">
        <h2>Quản lý ngươi dùng</h2>
        <table border-bottom="1">
            <tr>
                <th>ID</th>
                <th>Tên người dùng</th>
                <th>Email người dùng</th>
                <th>Địa chỉ</th>
                <th>Số điện thoại</th>
                <th>Chức vụ</th>
            </tr>
            <?php
            include_once "connection.php";
            $sql= "SELECT*FROM tb_nguoi_dung";
            $kq= $conn -> query($sql);
            foreach($kq as $row){
             ?>
             <tr>
                <th><?php echo $row["id_nguoi_dung"] ?></th>
                <th><?php echo $row["ten_nguoi_dung"] ?></th>
                <th><?php echo $row["email_nguoi_dung"] ?></th>
                <th><?php echo $row["dia_chi"] ?></th>
                <th><?php echo $row["sdt"] ?></th>
                <th></th>
                <td>
                <a onclick="return confirm('Bạn có muốn xóa không?')" href="xoa_nguoi_dung.php?id=<?php echo $row['id_nguoi_dung'] ?>">Xóa</a>
                </td>
             </tr>   
            <?php } ?>


            
        </table>
    </div>
</body>
</html>
