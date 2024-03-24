<?php
include_once "connection.php";
if(isset($_POST["id_nguoi_dung"])){
    $id_nguoi_dung=$_POST["id_nguoi_dung"];

    $sql_delete="DELETE FROM tb_nguoi_dung WHERE id_nguoi_dung=$id_nguoi_dung";
    $result=$conn->prepare($sql_delete);
    if($result -> execute()){
        header('location: nguoi_dung.php');
    }
    else{
        echo"Xóa nguòi dùng không thành công";
    }


}
?>