<?php


namespace App\Controllers;

use Respect\Validation\Validator as v;
use App\Models\User;

class RegistrationController
{
    public function show()
    {
        return require_once __DIR__  . '/../Views/RegisterView.php';
    }

    public function register()
    {
        $errors = [];
        $refferal = [];

        // Search for refferal if exists
        if (isset($_GET['r'])) {
            $refferal = query()
                ->select('id')
                ->from('users')
                ->where('MD5(email) = :email')
                ->setParameter('email', $_GET['r'])
                ->execute()
                ->fetchAssociative();
        }

        // Search for email in DB
        $emailQuery = query()
            ->select('email')
            ->from('users')
            ->where('email = :email')
            ->setParameter('email', $_POST['email'])
            ->execute()
            ->fetchAssociative();

        // Validation
        if ($_POST['password'] !== $_POST['password-confirm']) {
            $errors['passwordConfirm'] = 'Passwords do not match.';
        }

        if (! v::email()->validate($_POST['email'])) {
            $errors['email'] = 'Enter correct email.';
        } elseif ($emailQuery) {
            $errors['email'] = 'Email already exists.';
        }

        // TODO Back-end validation for required fields

        // Register or Fail
        if(count($errors) === 0) {

            $user = User::create($_POST, $refferal['id']);

            $query = query();
            $query
                ->insert('users')
                ->values([
                    'name' => ':name',
                    'email' => ':email',
                    'password' => ':password',
                    'refferal_id' => ':refferal'
                ])
                ->setParameters($user->toArray())
                ->execute();

            $_SESSION['auth_id'] = $query->getConnection()->lastInsertId();

            header('Location: /articles');
        } else {
            return require_once __DIR__  . '/../Views/RegisterView.php';
        }
    }

}