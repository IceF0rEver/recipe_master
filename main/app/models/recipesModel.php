<?php

namespace App\Models\RecipesModel;

function findOneById(\PDO $connexion, int $id): array
{
    $sql = "SELECT
    d.id AS recipe_id,
    d.name AS recipe_name,
    ROUND(AVG(r.value), 1) AS rate,
    d.prep_time AS time,
    d.description AS recipe_desc,
    u.name AS creator_name,
    (SELECT COUNT(*) FROM comments WHERE dish_id = d.id) AS comment_count,
    d.picture AS recipe_picture
    FROM dishes AS d
    LEFT JOIN ratings AS r ON d.id = r.dish_id
    LEFT JOIN users AS u ON d.user_id = u.id
    LEFT JOIN comments AS c ON d.id = c.dish_id
    WHERE d.id = :id
    GROUP BY d.id, d.name, d.prep_time, d.description, u.name;";
   $rs = $connexion->prepare($sql);
   $rs->bindValue(':id', $id, \PDO::PARAM_INT);
   $rs->execute();
   return $rs->fetch(\PDO::FETCH_ASSOC);
}

function findAll(\PDO $connexion): array
{
    $sql = "SELECT d.name AS recipe_name,
    ROUND(AVG(r.value), 1) AS rate,
    d.description AS recipe_desc,
    d.id AS recipe_id,
    d.picture AS recipe_picture,
    d.created_at
    FROM dishes d
    LEFT JOIN ratings r ON d.id = r.dish_id
    GROUP BY d.id
    ORDER BY d.created_at DESC
    LIMIT 9;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function findRandomOne(\PDO $connexion): array
{
    $sql = "SELECT d.id, d.name AS recipe_name,
    ROUND(AVG(r.value), 1) AS rate,
    d.description AS recipe_desc,
    u.name AS user_name,
    (SELECT COUNT(*) FROM comments WHERE dish_id = d.id) AS comment_count,
    d.id AS recipe_id,
    d.picture AS recipe_picture
    FROM dishes d
    LEFT JOIN users u ON d.user_id = u.id
    LEFT JOIN ratings r ON d.id = r.dish_id
    GROUP BY d.id
    ORDER BY RAND()
    LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
function findAllPopulars(\PDO $connexion) : array
{
    $sql = "SELECT d.name AS recipe_name,
    ROUND(AVG(r.value), 1) AS rate,
    d.description AS recipe_desc,
    u.name AS user_name,
    (SELECT COUNT(*) FROM comments WHERE dish_id = d.id) AS comment_count,
    d.id AS recipe_id,
    d.picture AS recipe_picture
    FROM dishes d
    LEFT JOIN ratings r ON d.id = r.dish_id
    LEFT JOIN users u ON d.user_id = u.id
    LEFT JOIN comments c ON d.id = c.dish_id
    GROUP BY d.id
    ORDER BY rate DESC
    LIMIT 3;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function findLatestRecipes(\PDO $connexion, int $id) : array
{
    $sql = "SELECT d.name AS recipe_name,
    ROUND(AVG(r.value), 1) AS rate,
    d.description AS recipe_desc,
    d.id AS recipe_id,
    d.picture AS recipe_picture,
    d.created_at
    FROM dishes d
    LEFT JOIN ratings r ON d.id = r.dish_id
    WHERE d.user_id = :id
    GROUP BY d.id
    ORDER BY d.created_at DESC
    LIMIT 3;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function findAllByUserId(\PDO $connexion, int $id) : array
{
    $sql = "SELECT d.name AS recipe_name,
    ROUND(AVG(r.value), 1) AS rate,
    d.description AS recipe_desc,
    d.id AS recipe_id,
    d.picture AS recipe_picture,
    d.created_at
    FROM dishes d
    LEFT JOIN ratings r ON d.id = r.dish_id
    WHERE d.user_id = :id
    GROUP BY d.id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
