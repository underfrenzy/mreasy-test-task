<?php

namespace controller\login;

use controller\BaseController;
use module\user\UserService;

class Login implements BaseController
{
    public function run()
    {
        if (!isset($_POST['username']) && !isset($_POST['password'])) {
            return false;
        }

        $username = $_POST['username'];
        $password = $_POST['password'];

        $user = UserService::findByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            $token = UserService::generateToken($user);
            UserService::setTokenToUser($user, $token);
        } else {
            $userId = UserService::createNew($username, $password);
            $user = UserService::findById($userId);
            $token = UserService::generateToken($user);
            UserService::setTokenToUser($user, $token);
        }

        if (!empty($token)) {
            setcookie('token', $token, time() + (86400 * 30), '/');
            http_response_code(200);
        } else {
            http_response_code(401);
        }
    }
}
