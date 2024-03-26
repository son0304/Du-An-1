<?php
function user(){
    $title = 'Danh sách người dùng';
    $view = 'user/index';
    $users = listAll('tb_nguoi_dung');
 
    require_once PATH_VIEW_ADMIN . 'layout\master.php';
}
function show_user($id_nguoi_dung){
    $title = 'Xem chi tiết người dùng';
    $view = 'user/show';
}
function create_user(){
    $title = 'Thêm người dùng';
    $view = 'user/create';

    require_once PATH_VIEW_ADMIN . 'user/create.php';
}
function update_user($id_nguoi_dung){
    $title = 'Sửa người dùng';
    $view = 'user/update';

    require_once PATH_VIEW_ADMIN . 'user/update.php';
}
function delete_user($id_nguoi_dung){
    require_once PATH_VIEW_ADMIN . 'user/delete.php';
}



?>