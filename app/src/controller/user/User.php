<?php

namespace controller\user;

use controller\BaseController;
use module\user\UserService;

class User implements BaseController
{
    public function run()
    {
        $userId = $_POST['userId'];
        $userCounter = $_POST['userCounter'];

        UserService::updateUserCounter($userId, $userCounter);

        echo json_encode(UserService::findById($userId));
    }
}
