<div class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
    <h1 class="text-2xl font-bold mb-4">Ajouter une recette</h1>

    <form action="recipes/add/form" method="post" class="text-gray-800">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-300">Nom de la recette</label>
            <input type="text" name="name" id="name" required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-300">Description</label>
            <input type="text" name="description" id="description"  required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="prep_time" class="block text-sm font-medium text-gray-300">Temps de preparation</label>
            <input type="text" name="prep_time" id="prep_time"  class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="portions" class="block text-sm font-medium text-gray-300">Portions</label>
            <input type="text" name="portions" id="portions"  class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="picture" class="block text-sm font-medium text-gray-300">Nom de l'image de la recette</label>
            <input type="text" name="picture" id="picture"  class="mt-1 p-2 w-full border rounded-md">
        </div>
        <div class="m-4">
            <label for="" class="block text-sm font-medium text-gray-300">Liste des ingrédients</label>
            <ul class="flex flex-wrap -mx-4 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <?php
                include_once '../app/models/ingredientsModel.php';
                $ingredients = \App\Models\IngredientsModel\findAll($connexion);
                include '../app/views/ingredients/showWithQuantity.php';
            ?>
            </ul>
        </div>
        <div class="mb-4">
            <label for="default" class="block text-sm font-medium text-gray-300">Catégorie de la recette</label>
            <select id="default" name="type_id" required class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?php
                    include_once '../app/models/categoriesModel.php';
                    $categories = \App\Models\CategoriesModel\findAll($connexion);
                    include '../app/views/categories/show.php';
                ?>
            </select>
        </div> 
        <div class="mb-4">
            <label for="default" class="block text-sm font-medium text-gray-300">Chef de cette recette</label>
            <select id="default" name="user_id" required class="bg-gray-50 border border-gray-300 text-gray-900 mb-6 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <?php
                    include_once '../app/models/usersModel.php';
                    $users = \App\Models\UsersModel\findAll($connexion);
                    include '../app/views/users/show.php';
                ?>
            </select>
        </div>  


        <div class="mb-4">
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md">Ajouter</button>
        </div>
    </form>
</div>