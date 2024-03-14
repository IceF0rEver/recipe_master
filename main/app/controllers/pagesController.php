<?php

namespace App\Controllers\PagesController;

include_once '../app/models/recipesModel.php';
include_once '../app/models/usersModel.php';

use \App\Models\RecipesModel;
use \App\Models\UsersModel;


function homeAction(\PDO $connexion)
{
    $random_recipe = RecipesModel\findRandomOne($connexion);
    $recipes = RecipesModel\findAllPopulars($connexion);
    $user = UsersModel\findOnePopular($connexion);
    $recipesByUser = RecipesModel\findLatestRecipes($connexion, $user['user_id']);

    global $title, $content;
    $title = "Featured Recipes - Popular Recipes - Random chief";
    ob_start();
    include '../app/views/pages/home.php';
    $content = ob_get_clean();
}
