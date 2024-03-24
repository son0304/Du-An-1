<?php
$error=[];
if(isset($_POST['dangki'])){
  $ten_nguoi_dung=$_POST['ten_nguoi_dung'];
  $email_nguoi_dung=$_POST['email_nguoi_dung'];
  $sdt=$_POST['sdt'];
  $mat_khau=$_POST['mat_khau'];
  $dia_chi=$_POST['dia_chi'];

  include_once "connection.php";
  if(empty($error)){
    $sql_insert="INSERT INTO tb_nguoi_dung(ten_nguoi_dung,email_nguoi_dung,sdt,mat_khau,dia_chi)
    VALUES ('$ten_nguoi_dung','$email_nguoi_dung','$sdt','$mat_khau','$dia_chi')";
    $result = $conn -> prepare($sql_insert);
    if($result -> execute()){
        echo '<script type="text/javascript">';
        echo 'alert("Đăng kí thành công");';
        echo '</script>';
        header('location: login.php');
        
    }
    else{
        echo"Đăng kí không thành công";
    }

  }

}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <div class="wrapper">
        <div class="form-dki">
            <img src="images/fruit-collection-cakes.webp" alt="">
            <form action="" method="post">
                <h1>Đăng kí</h1>
                <input type="text" name="ten_nguoi_dung" placeholder="Nhập Họ tên">
                <input type="email" name="email_nguoi_dung" placeholder="Nhập email">
                <input type="tel" name="sdt" placeholder="Nhập số điện thoại">
                <input type="password" name="mat_khau" placeholder="Nhập password">
                <input type="text" name="dia_chi" placeholder="Nhập địa chỉ">
                <input type="submit" value="Đăng Kí" name="dangki">
            </form>
        </div>
    </div>
    <style>
        body {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: beige;
        }
      
        .form-dki{
            display: flex;
            margin: 100px auto;
            padding: 20px;
            height: 100%;
            width: 100%;
            background-color:#61985c;
        }
        img{
            width: 400px;
            height: 100%;
            margin: 100px ;
            margin-left: 400px;
        }
        form{ 
        width: 300px;
        margin: 100px 50px;
        padding: 20px;
        background: #fff;
        box-shadow: 0 0 3px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
        }

        input[type="text"],
        input[type="email"],
        input[type="tel"],
        input[type="password"] {
        width: 100%;
        padding: 10px;
        margin: 10px 0;
        border: 1px solid #ddd;
        box-sizing: border-box;
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
</body>

</html>