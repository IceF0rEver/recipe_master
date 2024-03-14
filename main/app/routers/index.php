<?php
// ROUTER PRINCIPAL

// USERS: ROUTER DES RECETTES
// PATTERN: ?recipes=xxx
if (isset($_GET['recipes'])){
    include_once '../app/routers/recipes.php';
}
// BOOKS: ROUTER DES CHEFS
// PATTERN: ?chiefs=xxx
elseif (isset($_GET['chiefs']) || isset($_GET['users'])){
    include_once '../app/routers/users.php';
}
// PATTERN: /
// CTRL: pagesController
// ACTION: home
// VIEW: pages/home.php
else {
    include_once '../app/controllers/pagesController.php';
    \App\Controllers\PagesController\homeAction($connexion);
}