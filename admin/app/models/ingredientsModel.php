<?php

namespace App\Models\IngredientsModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT * 
            FROM ingredients;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findOneById(\PDO $connexion, $id)
{
    $sql = "SELECT * 
    FROM ingredients
    WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
function insertOne(\PDO $connexion, $data)
{
    $sql = "INSERT INTO ingredients
    SET name = :name,
    unit = :description,
    created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    return $rs->execute();;
}
function updateOne(\PDO $connexion, $data)
{
    $sql = "UPDATE ingredients
    SET name = :name,
    unit = :description 
    WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':id', $data['id'], \PDO::PARAM_INT);
    return $rs->execute();
}
function deleteOne(\PDO $connexion, $id)
{
    $sql = "DELETE FROM ingredients
    WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}
function deleteOneInDishe(\PDO $connexion, $id)
{
    $sql = "DELETE FROM dishes_has_ingredients
    WHERE ingredient_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}
function findAllByRecipeId(\PDO $connexion, int $id): array
{
    $sql = "SELECT ingredients.name AS name, dishes_has_ingredients.quantity AS quantity
    FROM dishes_has_ingredients
    LEFT JOIN ingredients ON dishes_has_ingredients.ingredient_id = ingredients.id
    WHERE dishes_has_ingredients.dish_id = :id;";
   $rs = $connexion->prepare($sql);
   $rs->bindValue(':id', $id, \PDO::PARAM_INT);
   $rs->execute();
   return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

function findAllInByRecipeId(\PDO $connexion, int $id): array
{
    $sql = "SELECT i.id, i.name AS name, 0 AS quantity
    FROM ingredients AS i
    WHERE i.name NOT IN (
        SELECT i2.name
        FROM dishes_has_ingredients AS dhi
        JOIN ingredients AS i2 ON dhi.ingredient_id = i2.id
        WHERE dhi.dish_id = :id
    )
    UNION
    SELECT i.id, i.name AS name, dhi.quantity AS quantity
    FROM dishes_has_ingredients AS dhi
    JOIN ingredients AS i ON dhi.ingredient_id = i.id
    WHERE dhi.dish_id = :id;";
   $rs = $connexion->prepare($sql);
   $rs->bindValue(':id', $id, \PDO::PARAM_INT);
   $rs->execute();
   return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

