<?php

namespace App\Models\CommentairesModel;

function findAllByRecipeId(\PDO $connexion, int $id): array
{
    $sql = "SELECT c.content AS content, u.name AS name, u.picture AS picture
    FROM comments AS c
    INNER JOIN users AS u ON c.user_id = u.id
    WHERE c.dish_id = :id;";
    $rs = $connexion->prepare($sql);
    $rs->bindValue(':id', $id, \PDO::PARAM_INT);
    $rs->execute();
    return $rs->fetchAll(\PDO::FETCH_ASSOC);
}
