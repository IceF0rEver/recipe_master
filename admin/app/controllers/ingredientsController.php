<?php

namespace App\Controllers\IngredientsController;

use \App\Models\IngredientsModel;

include_once '../app/models/ingredientsModel.php';


function indexAction(\PDO $connexion)
{
    $ingredients = IngredientsModel\findAll($connexion);

    global $title, $content;
    $title = "Liste des ingredients";
    ob_start();
    include '../app/views/ingredients/index.php';
    $content = ob_get_clean();
}
function addAction()
{
    global $title, $content;
    $title = "Ajout d'un ingrédient";
    ob_start();
    include '../app/views/ingredients/add.php';
    $content = ob_get_clean();
}

function createAction(\PDO $connexion, $data)
{
    IngredientsModel\insertOne($connexion, $data);
    header("Location: " . ADMIN_ROOT . "ingredients"); 

}
function editAction(\PDO $connexion, $id)
{
    $ingredient = IngredientsModel\findOneById($connexion, $id);
    global $title, $content;
    $title = "Modification d'un ingrédient";
    ob_start();
    include '../app/views/ingredients/edit.php';
    $content = ob_get_clean();
}
function updateAction($connexion, $data)
{
    IngredientsModel\updateOne($connexion, $data);
    header("Location: " . ADMIN_ROOT . "ingredients"); 
}
function deleteAction($connexion, $id)
{
    IngredientsModel\deleteOne($connexion, $id);
    IngredientsModel\deleteOneInDishe($connexion, $id);
    header("Location: " . ADMIN_ROOT . "ingredients"); 
}

