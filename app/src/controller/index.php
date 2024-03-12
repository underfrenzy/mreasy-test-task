<?php

require_once '../autoload.php';

use controller\login\Login;
use controller\user\User;

$request = $_SERVER['REQUEST_URI'];


switch ($request) {
    case '/api/login':
        $controller = new Login();
        $controller->run();
        break;
    case '/api/user/counter':
        $controller = new User();
        $controller->run();
        break;
}
