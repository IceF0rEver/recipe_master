<?php

if (isset($_GET[('users')])) {
    include_once '../app/routers/users.php';
}
else if (isset($_GET[('categories')])) {
    include_once '../app/routers/categories.php';
}
else if (isset($_GET[('ingredients')])) {
    include_once '../app/routers/ingredients.php';
}
else if (isset($_GET[('recipes')])) {
    include_once '../app/routers/recipes.php';
}
else {
    include_once '../app/controllers/usersController.php';
    \App\Controllers\UsersController\dashboardAction($connexion);
}