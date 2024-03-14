<?php

namespace App\Models\recipesModel;

function findOneById(\PDO $connexion, int $id): array
{
    $sql = "SELECT
    d.id AS dish_id,
    d.name AS dish_name,
    d.description AS dish_description,
    d.prep_time AS dish_prep_time,
    d.portions AS dish_portions,
    d.picture AS dish_picture,
    d.created_at AS dish_created_at,
    t.name AS type_name,
    d.user_id AS user_id
    FROM dishes AS d
    INNER JOIN types_of_dishes AS t ON d.type_id = t.id
    WHERE d.id = :id;";
   $rs = $connexion->prepare($sql);
   $rs->bindValue(':id', $id, \PDO::PARAM_INT);
   $rs->execute();
   return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAll(\PDO $connexion): array
{
    $sql = "SELECT DISTINCT
    d.id AS dish_id,
    d.name AS dish_name,
    d.description AS dish_description,
    d.prep_time AS dish_prep_time,
    d.portions AS dish_portions,
    d.picture AS dish_picture,
    d.created_at AS dish_created_at,
    t.name AS type_name,
    d.user_id AS user_id
    FROM dishes AS d
    INNER JOIN types_of_dishes AS t ON d.type_id = t.id
    ORDER BY dish_id ASC;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function insertOne(\PDO $connexion, $data)
{
    $sql = "INSERT INTO dishes
    SET name = :name,
    description = :description,
    prep_time = :prep_time,
    portions = :portions,
    picture = :picture,
    created_at = NOW(),
    user_id = :user_id,
    type_id = :type_id";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':prep_time', $data['prep_time'], \PDO::PARAM_STR);
    $rs->bindValue(':portions', $data['portions'], \PDO::PARAM_INT);
    $rs->bindValue(':picture', $data['picture'], \PDO::PARAM_STR);
    $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_INT);
    $rs->bindValue(':type_id', $data['type_id'], \PDO::PARAM_INT);
    
    if ($rs->execute()) {
        $lastInsertedId = $connexion->lastInsertId();
        return $lastInsertedId;
    }
}

function updateOne(\PDO $connexion, $data)
{
    $sql = "UPDATE dishes
    SET name = :name,
    description = :description,
    prep_time = :prep_time,
    portions = :portions,
    picture = :picture,
    user_id = :user_id,
    type_id = :type_id
    WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':prep_time', $data['prep_time'], \PDO::PARAM_STR);
    $rs->bindValue(':portions', $data['portions'], \PDO::PARAM_INT);
    $rs->bindValue(':picture', $data['picture'], \PDO::PARAM_STR);
    $rs->bindValue(':user_id', $data['user_id'], \PDO::PARAM_INT);
    $rs->bindValue(':type_id', $data['type_id'], \PDO::PARAM_INT);
    $rs->bindValue(':id', $data['id'], \PDO::PARAM_INT);
    return $rs->execute();  
}
function insertAllIngredients(\PDO $connexion, $id, $ingredients)
{
    foreach ($ingredients as $ingredient) {
        $sql = "INSERT INTO dishes_has_ingredients
        SET dish_id = :dish_id,
        ingredient_id = :ingredient_id,
        quantity = :quantity";
        $rs = $connexion->prepare($sql);
        $rs->bindValue(':dish_id', $id, \PDO::PARAM_INT);
        $rs->bindValue(':ingredient_id', $ingredient['id'], \PDO::PARAM_INT);
        $rs->bindValue(':quantity', strval($ingredient['quantity']), \PDO::PARAM_STR);
        $return = $rs->execute();
    }
    return $return;
}
function deleteAll(\PDO $connexion, $id)
{
    $sql = "DELETE FROM dishes_has_ingredients
    WHERE dish_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}
function deleteOne(\PDO $connexion, $id)
{
    $sql = "DELETE FROM dishes
    WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}



