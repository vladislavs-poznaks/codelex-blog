<?php

namespace App\Controllers;


use App\Models\User;

class LoginController
{
    public function __construct()
    {
        if (isset($_SESSION['auth_id'])) {

            return header('Location: /');
        }
    }

    public function show()
    {
        return require_once __DIR__  . '/../Views/LoginView.php';
    }

    public function login()
    {
        $errors = [];

        $user = query()
            ->select('*')
            ->from('users')
            ->where('email = :email')
            ->setParameter('email', $_POST['email'])
            ->execute()
            ->fetchAssociative();

        if (!$user) {
            $errors['email'] = 'Email incorrect.';
        }

        if (password_verify($_POST['password'] ?? '', $user['password'])) {

            $_SESSION['auth_id'] = $user['id'];
            $_SESSION['refferal'] = md5($user['email']);

            return header('Location: /articles');
        }

        $errors['password'] = 'Password incorrect.';
        return require_once __DIR__  . '/../Views/LoginView.php';
    }
}