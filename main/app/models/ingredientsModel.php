<?php

namespace App\Models\IngredientsModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT * 
            FROM ingredients;
            ORDER BY name ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllByRecipeId(\PDO $connexion, int $id): array
{
    $sql = "SELECT ingredients.name AS name, ROUND(dishes_has_ingredients.quantity, 0) AS quantity
    FROM dishes_has_ingredients
    INNER JOIN ingredients ON dishes_has_ingredients.ingredient_id = ingredients.id
    WHERE dishes_has_ingredients.dish_id = :id;";
   $rs = $connexion->prepare($sql);
   $rs->bindValue(':id', $id, \PDO::PARAM_INT);
   $rs->execute();
   return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
