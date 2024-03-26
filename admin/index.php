<?php 
session_start();
// Require file trong commons
require_once '../Common/env.php';
require_once '../Common/helper.php';
require_once '../Common/connect-db.php';
require_once '../Common/model.php';

// Require file trong controllers và models
require_file(PATH_CONTROLLER_ADMIN);
require_file(PATH_MODEL_ADMIN);

$act = $_GET['act'] ?? '/';

match ($act) {
     '/' => homeAdmin(),
     'user' => user(),
     'show-user' => show_user($_GET['id_nguoi_dung']),
     'create-user' => create_user(),
     'update-use' => update_user($_GET['id_nguoi_dung']),
     'delete-use' => delete_user($_GET['id_nguoi_dung']),
   
};


require_once '../Common/disconnect-db.php';