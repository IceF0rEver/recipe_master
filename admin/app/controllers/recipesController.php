<?php

namespace App\Controllers\RecipesController;

use \App\Models\RecipesModel;

include_once '../app/models/recipesModel.php';

function indexAction(\PDO $connexion)
{
    $recipes = RecipesModel\findAll($connexion);

    global $title, $content;
    $title = "Liste des recettes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}
function addAction(\PDO $connexion)
{
    global $title, $content;
    $title = "Ajout d'une recette";
    ob_start();
    include '../app/views/recipes/add.php';
    $content = ob_get_clean();
}

function createAction(\PDO $connexion, $data)
{
    foreach ($data["ingredients_ids"] as $ingredientId) {
        $ingredients[] = [
            'id' => $ingredientId,
            'quantity' => $data["quantities"][$ingredientId]
        ];
    }
    $id = RecipesModel\insertOne($connexion, $data);
    RecipesModel\insertAllIngredients($connexion, $id, $ingredients);
    header("Location: " . ADMIN_ROOT . "recipes"); 

}
function editAction(\PDO $connexion, $id)
{
    $recipe = RecipesModel\findOneById($connexion, $id);
    global $title, $content;
    $title = "Modification d'une recette";
    ob_start();
    include '../app/views/recipes/edit.php';
    $content = ob_get_clean();
}
function updateAction($connexion, $data)
{   
    RecipesModel\deleteAll($connexion, $data["id"]);
    foreach ($data["ingredients_ids"] as $ingredientId) {
        $ingredients[] = [
            'id' => $ingredientId,
            'quantity' => $data["quantities"][$ingredientId]
        ];
    }
    RecipesModel\updateOne($connexion, $data);
    RecipesModel\insertAllIngredients($connexion, $data["id"], $ingredients);
    header("Location: " . ADMIN_ROOT . "recipes");
}
function deleteAction($connexion, $id)
{
    RecipesModel\deleteAll($connexion, $id);
    RecipesModel\deleteOne($connexion, $id);
    header("Location: " . ADMIN_ROOT . "recipes"); 
}

