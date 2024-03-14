<?php

use \App\Controllers\UsersController;

include_once '../app/controllers/usersController.php';

if (isset($_GET['chiefs'])){
    switch ($_GET['chiefs']):
        case 'show':
            UsersController\showAction($connexion, $_GET['id']);
            break;
        default:
            UsersController\indexAction($connexion);
            break;
    endswitch;
}elseif (isset($_GET['users'])){
    switch ($_GET['users']):
        case 'loginForm':
            UsersController\loginFormAction();
            break;
        
        case 'login':
            UsersController\loginAction($connexion, [
                'name' => $_POST['name'],
                'password' => $_POST['password']
            ]);
            break;
        default:
            UsersController\indexAction($connexion);
            break;
    endswitch;
}
