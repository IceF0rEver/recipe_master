<?php

namespace App\Controllers\UsersController;

use \App\Models\UsersModel;

include_once '../app/models/usersModel.php';

function indexAction($connexion)
{
    $users = UsersModel\findAll($connexion);
    global $title, $content;
    $title = "Liste des utilisateurs";
    ob_start();
    include '../app/views/users/index.php';
    $content = ob_get_clean();

}
function dashboardAction(\PDO $connexion)
{
    global $title, $content;
    $title = "Dashboard";
    ob_start();
    include '../app/views/users/dashboard.php';
    $content = ob_get_clean();
}
function logoutAction()
{
    unset($_SESSION['user']);
    header('Location: ' .  PUBLIC_ROOT);
}
function addAction()
{
    global $title, $content;
    $title = "Ajout d'un utilisateur";
    ob_start();
    include '../app/views/users/add.php';
    $content = ob_get_clean();
}

function createAction(\PDO $connexion, $data)
{
    UsersModel\insertOne($connexion, $data);
    header("Location: " . ADMIN_ROOT . "users"); 

}
function editAction(\PDO $connexion, $id)
{
    $user = UsersModel\findOneById($connexion, $id);
    global $title, $content;
    $title = "Modification d'un utilisateur";
    ob_start();
    include '../app/views/users/edit.php';
    $content = ob_get_clean();
}
function updateAction($connexion, $data)
{
    UsersModel\updateOne($connexion, $data);
    header("Location: " . ADMIN_ROOT . "users"); 
}
function deleteAction($connexion, $id)
{
    UsersModel\deleteOne($connexion, $id);
    header("Location: " . ADMIN_ROOT . "users"); 
}


