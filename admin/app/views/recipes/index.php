<div class="page-header">
  <h1 class="text-3xl font-semibold">LISTE DES RECETTES</h1>
</div>
<table class="table-auto border-collapse border">
  <thead>
    <tr>
      <th class="px-4 py-2 border">Id</th>
      <th class="px-4 py-2 border">Recipe Name</th>
      <th class="px-4 py-2 border">Recipe Description</th>
      <th class="px-4 py-2 border">Recipe Time</th>
      <th class="px-4 py-2 border">Recipe Portions</th>
      <th class="px-4 py-2 border">Recipe Picture</th>
      <th class="px-4 py-2 border">Created at</th>
      <th class="px-4 py-2 border">Recipe Catégory</th>
      <th class="px-4 py-2 border">Ingredients</th>
      <th class="px-4 py-2 border">User Id</th>
      <th class="px-4 py-2 border">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($recipes as $recipe){ ?>
    <tr>
      <td class="px-4 py-2 border"><?php echo $recipe['dish_id'];?></td>
      <td class="px-4 py-2 border"><?php echo $recipe['dish_name'];?></td>
      <td class="px-4 py-2 border"><?php echo Core\Tools\truncate($recipe['dish_description']); ?></td>
      <td class="px-4 py-2 border"><?php echo $recipe['dish_prep_time'];?></td>
      <td class="px-4 py-2 border"><?php echo $recipe['dish_portions'];?></td>
      <td class="px-4 py-2 border"><?php echo $recipe['dish_picture'];?></td>
      <td class="px-4 py-2 border"><?php echo $recipe['dish_created_at'];?></td>
      <td class="px-4 py-2 border"><?php echo $recipe['type_name'];?></td>
      <td class="px-4 py-2 border">
      <?php
        include_once '../app/models/ingredientsModel.php';
        $ingredients = \App\Models\IngredientsModel\findAllByRecipeId($connexion, $recipe['dish_id']);
        include '../app/views/ingredients/show.php';
      ?>
      </td>
      <td class="px-4 py-2 border"><?php echo $recipe['user_id'];?></td>


      <td class="px-4 py-2 border">
        <a href="recipes/edit/<?php echo $recipe['dish_id'];?>" class="block m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Modifier</a>
        <a href="recipes/delete/<?php echo $recipe['dish_id'];?>" class="block m-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</a>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
