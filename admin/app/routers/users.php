<?php

use \App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

switch ($_GET['users']):
    case 'logout':
        UsersController\logoutAction();
        break;
    case 'add':
        UsersController\addAction();
        break;
    case 'addForm':
        UsersController\createAction($connexion, $_POST);
        break;
    case 'edit':
        UsersController\editAction($connexion, $_GET['id']);
        break;
    case 'editForm':
        UsersController\updateAction($connexion, $_POST);
        break;
    case 'delete':
        UsersController\deleteAction($connexion, $_GET['id']);
        break;
    case 'index':
        UsersController\indexAction($connexion);
        break;
    default:
        UsersController\dashboardAction($connexion);
        break;
endswitch;
