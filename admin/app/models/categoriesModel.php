<?php

namespace App\Models\CategoriesModel;

function findAll(\PDO $connexion): array
{
    $sql = "SELECT * 
            FROM types_of_dishes;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function findOneById(\PDO $connexion, $id)
{
    $sql = "SELECT * 
    FROM types_of_dishes
    WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
function insertOne(\PDO $connexion, $data)
{
    $sql = "INSERT INTO types_of_dishes
    SET name = :name,
    description = :description,
    created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    return $rs->execute();
}
function updateOne(\PDO $connexion, $data)
{
    $sql = "UPDATE types_of_dishes
    SET name = :name,
    description = :description 
    WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':description', $data['description'], \PDO::PARAM_STR);
    $rs->bindValue(':id', $data['id'], \PDO::PARAM_INT);
    return $rs->execute();
}
function deleteOne(\PDO $connexion, $id)
{
    $sql = "DELETE FROM types_of_dishes
    WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}
function deleteOneInDishe(\PDO $connexion, $id)
{
    $sql = "DELETE FROM dishes
    WHERE type_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}
function findAllInByRecipeId(\PDO $connexion, int $id): array
{
    $sql = "SELECT c.id, c.name AS name, 0 AS description
    FROM types_of_dishes c
    WHERE c.name NOT IN (
        SELECT c2.name
        FROM types_of_dishes c2
        JOIN dishes d ON c2.id = d.type_id
        WHERE d.id = :id
    )
    UNION
    SELECT c.id, c.name AS name, c.description
    FROM types_of_dishes c
    JOIN dishes d ON c.id = d.type_id
    WHERE d.id = :id;";
   $rs = $connexion->prepare($sql);
   $rs->bindValue(':id', $id, \PDO::PARAM_INT);
   $rs->execute();
   return $rs->fetchAll(\PDO::FETCH_ASSOC);
}

