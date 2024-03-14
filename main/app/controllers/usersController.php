<?php

namespace App\Controllers\UsersController;

include_once '../app/models/usersModel.php';

use \App\Models\UsersModel;

function indexAction(\PDO $connexion)
{
    $users = UsersModel\findAll($connexion);

    global $title, $content;
    $title = "Chiefs";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, int $id)
{
    $user = UsersModel\findOneById($connexion, $id);

    global $title, $content;
    $title = $user['user_name'];
    ob_start();
    include '../app/views/users/show.php';
    $content = ob_get_clean();
}
function loginFormAction()
{
    global $title, $content;
    $title = "Connexion";
    ob_start();
    include '../app/views/users/loginForm.php';
    $content = ob_get_clean();
}
function loginAction(\PDO $connexion, $data)
{
    $user = UsersModel\findOneByName($connexion, $data);
    if ($user && password_verify($data['password'], $user['password'])) :
        $_SESSION['user'] = $user;
        header('location: ' . ADMIN_ROOT);
    else :
        header('location: ' . PUBLIC_ROOT . 'users/login/form');
    endif;
}