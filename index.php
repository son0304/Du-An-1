<?php 
session_start();
// Require file trong commons
require_once './Common/env.php';
require_once './Common/helper.php';
require_once './Common/connect-db.php';
require_once './Common/model.php';

// Require file trong controllers và models
require_file(PATH_CONTROLLER);
require_file(PATH_MODEL);

$act = $_GET['act'] ?? '/';

match ($act) {
    '/' => homeID(),
};


require_once './Common/disconnect-db.php';