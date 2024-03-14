<?php

use \App\Controllers\IngredientsController;

include_once '../app/controllers/ingredientsController.php';

switch ($_GET['ingredients']):
    case 'add':
        IngredientsController\addAction();
        break;
    case 'addForm':
        IngredientsController\createAction($connexion, $_POST);
        break;
    case 'edit':
        IngredientsController\editAction($connexion, $_GET['id']);
        break;
    case 'editForm':
        IngredientsController\updateAction($connexion, $_POST);
        break;
    case 'delete':
        IngredientsController\deleteAction($connexion, $_GET['id']);
        break;
    default:
        IngredientsController\indexAction($connexion);
        break;
endswitch;
