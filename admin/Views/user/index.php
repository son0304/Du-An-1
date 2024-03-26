<!DOCTYPE html>
<html lang="vi">
<head>
<style>
  table {
    margin: 10px;
    width: 1600px;
    
  }
  th, td {
    border: 1px solid black;
    padding: 10px;
    text-align: left;
  }
  th {
    background-color: #f2f2f2;
  }
  h3{
    text-align: center;
  }
 
.button {
  padding: 10px 20px;
  font-size: 16px;
  text-align: center;
  cursor: pointer;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
 
}



.button:active {
  background-color: #3e8e41;
  box-shadow: 0 2px #666;
  transform: translateY(1px);
}

.deleteButton {
  background-color: #f44336;
}



.updateButton {
  background-color: #008CBA;
}

.thaotac{
  text-align: center;
  padding: 5px;
}
.chitiet{
  text-align: center;
}
</style>
</head>
<body>
<h3>Danh sách người dùng</h3>
<table>
  <tr>
    <th>ID</th>
    <th>Tên người dùng</th>
    <th>Email người dùng</th>
    <th>Địa chỉ</th>
    <th>Số điện thoại</th>
    <th>Chức vụ</th>
    <th class="thaotac">Thao tác</th>
  </tr>
  <?php foreach($users as $user): ?>
  <tr>
    <td><?= $user['id_nguoi_dung']  ?></td>
    <td><?= $user['ten_nguoi_dung']  ?></td>
    <td><?= $user['email_nguoi_dung']  ?></td>
    <td><?= $user['dia_chi']  ?></td>
    <td><?= $user['sdt']  ?></td>
    <th>Chức vụ</th>
    <td class="thaotac">
      
      <button class="button updateButton" onclick="updateData()">Update</button>
      <button class="button deleteButton" onclick="deleteData()">Delete</button>
    </td>
    <td class="chitiet"><button><a href="">Xem chi tiết</a></button></td>
  </tr>
  <?php endforeach; ?>
</table>

</body>
</html>
