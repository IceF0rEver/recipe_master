<?php

use \App\Controllers\CategoriesController;

include_once '../app/controllers/categoriesController.php';

switch ($_GET['categories']):
    case 'add':
        CategoriesController\addAction();
        break;
    case 'addForm':
        CategoriesController\createAction($connexion, $_POST);
        break;
    case 'edit':
        CategoriesController\editAction($connexion, $_GET['id']);
        break;
    case 'editForm':
        CategoriesController\updateAction($connexion, $_POST);
        break;
    case 'delete':
        CategoriesController\deleteAction($connexion, $_GET['id']);
        break;
    default:
        CategoriesController\indexAction($connexion);
        break;
endswitch;
