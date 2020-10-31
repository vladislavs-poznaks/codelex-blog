<?php


namespace App\Controllers;


class HomeController
{
    public function __construct()
    {
        if (! isset($_SESSION['auth_id'])) {
            return header('Location: /login');
        }
    }

    public function logout()
    {
        session_destroy();

        return header('Location: /login');
    }

    public function refferal()
    {
        $email = query()
            ->select('email')
            ->from('users')
            ->where('id = :id')
            ->setParameter('id', $_SESSION['auth_id'])
            ->execute()
            ->fetchAssociative();

        $refferal = isset($email['email'])
            ? 'http://localhost:8888/register?r=' . md5($email['email'])
            : 'No email found.';

        return require_once __DIR__  . '/../Views/RefferalView.php';
    }

}