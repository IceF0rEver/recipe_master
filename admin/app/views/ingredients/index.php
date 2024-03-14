<div class="page-header">
  <h1 class="text-3xl font-semibold">LISTE DES INGREDIENTS</h1>
</div>

<table class="table-auto border-collapse border">
  <thead>
    <tr>
      <th class="px-4 py-2 border">id</th>
      <th class="px-4 py-2 border">Ingredient Name</th>
      <th class="px-4 py-2 border">Ingredient Unit</th>
      <th class="px-4 py-2 border">Created at</th>
      <th class="px-4 py-2 border">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($ingredients as $ingredient){ ?>
    <tr>
      <td class="px-4 py-2 border"><?php echo $ingredient['id'];?></td>
      <td class="px-4 py-2 border"><?php echo $ingredient['name'];?></td>
      <td class="px-4 py-2 border"><?php echo $ingredient['unit'];?></td>
      <td class="px-4 py-2 border"><?php echo $ingredient['created_at'];?></td>
      <td class="px-4 py-2 border">
        <a href="ingredients/edit/<?php echo $ingredient['id'];?>" class="block m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Modifier</a>
        <a href="ingredients/delete/<?php echo $ingredient['id'];?>" class="block m-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</a>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
