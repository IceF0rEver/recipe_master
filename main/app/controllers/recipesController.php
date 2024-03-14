<?php

namespace App\Controllers\RecipesController;

include_once '../app/models/recipesModel.php';

use \App\Models\RecipesModel;

function indexAction(\PDO $connexion)
{
    $recipes = RecipesModel\findAll($connexion);

    global $title, $content;
    $title = "Recipes";
    ob_start();
    include '../app/views/recipes/index.php';
    $content = ob_get_clean();
}

function showAction(\PDO $connexion, int $id)
{
    $recipe = RecipesModel\findOneById($connexion, $id);

    global $title, $content;
    $title = $recipe['recipe_name'];
    ob_start();
    include '../app/views/recipes/show.php';
    $content = ob_get_clean();
}