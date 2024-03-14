<?php

namespace App\Models\UsersModel;

function findOnePopular(\PDO $connexion): array
{
    $sql = "SELECT
    u.id AS user_id,
    u.name AS user_name,
    u.created_at AS user_created_at,
    u.picture AS picture,
    u.biography AS user_desc,
    COUNT(d.id) AS dish_count,
    MAX(avg_rating) AS max_avg_rating
    FROM users u
    LEFT JOIN (
        SELECT
            d.user_id,
            AVG(r.value) AS avg_rating
        FROM dishes d
        LEFT JOIN ratings r ON d.id = r.dish_id
        GROUP BY d.user_id
    ) AS user_ratings ON u.id = user_ratings.user_id
    LEFT JOIN dishes d ON u.id = d.user_id
    GROUP BY u.id, u.name, u.created_at, u.picture, u.biography
    ORDER BY max_avg_rating DESC 
    LIMIT 1;";
    $rs = $connexion->query($sql);
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
function findOneById(\PDO $connexion, int $id): array
{
    $sql = "SELECT u.name AS user_name,
    u.created_at AS user_created_at,
    u.id AS user_id,
    u.picture AS picture,
    u.biography as user_desc
    FROM users u WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
function findAll(\PDO $connexion): array
{
    $sql = "SELECT u.name AS user_name,
    u.created_at AS user_created_at,
    u.id AS user_id,
    u.picture AS picture,
    u.biography as user_desc,
    COUNT(d.id) AS dish_count
    FROM users u
    LEFT JOIN dishes d ON u.id = d.user_id
    GROUP BY u.id
    ORDER BY u.created_at DESC
    LIMIT 9;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function findOneByName(\PDO $connexion, array $data)
{
    $sql = "SELECT *
            FROM users
            WHERE name = :name;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
