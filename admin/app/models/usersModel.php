<?php

namespace App\Models\UsersModel;


function findOneById(\PDO $connexion, int $id)
{
    $sql = "SELECT *
    FROM users WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetch(\PDO::FETCH_ASSOC);
}
function findAll(\PDO $connexion): array
{
    $sql = "SELECT * 
            FROM users;";
    $rs = $connexion->query($sql);
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
function insertOne(\PDO $connexion, $data)
{
    $sql = "INSERT INTO users
    SET name = :name,
    email = :email,
    password = :password,
    biography = :biography,
    picture = :picture,
    created_at = NOW();";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':email', $data['email'], \PDO::PARAM_STR);
    $rs->bindValue(':password', $data['password'], \PDO::PARAM_STR);
    $rs->bindValue(':biography', $data['biography'], \PDO::PARAM_STR);
    $rs->bindValue(':picture', $data['picture'], \PDO::PARAM_STR);
    return $rs->execute();
}
function updateOne(\PDO $connexion, $data)
{
    $sql = "UPDATE users
    SET name = :name,
    email = :email,
    password = :password,
    biography = :biography,
    picture = :picture
    WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':name', $data['name'], \PDO::PARAM_STR);
    $rs->bindValue(':email', $data['email'], \PDO::PARAM_STR);
    $rs->bindValue(':password', $data['password'], \PDO::PARAM_STR);
    $rs->bindValue(':biography', $data['biography'], \PDO::PARAM_STR);
    $rs->bindValue(':picture', $data['picture'], \PDO::PARAM_STR);
    $rs->bindValue(':id', $data['id'], \PDO::PARAM_INT);
    return $rs->execute();
}
function deleteOne(\PDO $connexion, $id)
{
    $sql = "DELETE FROM users
    WHERE id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    return $rs->execute();
}
function findAllInByRecipeId(\PDO $connexion, int $id): array
{
    $sql = "SELECT u.id, u.name AS name, 0 AS email
    FROM users u
    WHERE u.name NOT IN (
        SELECT u2.name
        FROM users u2
        JOIN dishes d ON u2.id = d.user_id
        WHERE d.id = :id
    )
    UNION
    SELECT u.id, u.name AS name, u.email
    FROM users u
    JOIN dishes d ON u.id = d.user_id
    WHERE d.id = :id;";
   $rs = $connexion->prepare($sql);
   $rs->bindValue(':id', $id, \PDO::PARAM_INT);
   $rs->execute();
   return $rs->fetchAll(\PDO::FETCH_ASSOC);
}


