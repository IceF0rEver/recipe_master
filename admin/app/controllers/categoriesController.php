<?php

namespace App\Controllers\CategoriesController;

use \App\Models\CategoriesModel;

include_once '../app/models/categoriesModel.php';


function indexAction(\PDO $connexion)
{
    $categories = CategoriesModel\findAll($connexion);

    global $title, $content;
    $title = "Liste des catégories";
    ob_start();
    include '../app/views/categories/index.php';
    $content = ob_get_clean();
}
function addAction()
{
    global $title, $content;
    $title = "Ajout d'une catégorie";
    ob_start();
    include '../app/views/categories/add.php';
    $content = ob_get_clean();
}

function createAction(\PDO $connexion, $data)
{
    CategoriesModel\insertOne($connexion, $data);
    header("Location: " . ADMIN_ROOT . "categories"); 

}
function editAction(\PDO $connexion, $id)
{
    $category = CategoriesModel\findOneById($connexion, $id);
    global $title, $content;
    $title = "Modification d'une catégorie";
    ob_start();
    include '../app/views/categories/edit.php';
    $content = ob_get_clean();
}
function updateAction($connexion, $data)
{
    CategoriesModel\updateOne($connexion, $data);
    header("Location: " . ADMIN_ROOT . "categories"); 
}
function deleteAction($connexion, $id)
{
    CategoriesModel\deleteOne($connexion, $id);
    CategoriesModel\deleteOneInDishe($connexion, $id);
    header("Location: " . ADMIN_ROOT . "categories"); 
}

