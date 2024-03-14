<div class="page-header">
  <h1 class="text-3xl font-semibold">LISTE DES CATEGORIES</h1>
</div>

<table class="table-auto border-collapse border">
  <thead>
    <tr>
      <th class="px-4 py-2 border">id</th>
      <th class="px-4 py-2 border">Categorie Name</th>
      <th class="px-4 py-2 border">Categorie description</th>
      <th class="px-4 py-2 border">Created at</th>
      <th class="px-4 py-2 border">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($categories as $category){ ?>
    <tr>
      <td class="px-4 py-2 border"><?php echo $category['id'];?></td>
      <td class="px-4 py-2 border"><?php echo $category['name'];?></td>
      <td class="px-4 py-2 border"><?php echo $category['description'];?></td>
      <td class="px-4 py-2 border"><?php echo $category['created_at'];?></td>
      <td class="px-4 py-2 border">
        <a href="categories/edit/<?php echo $category['id'];?>" class="block m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Modifier</a>
        <a href="categories/delete/<?php echo $category['id'];?>" class="block m-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</a>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
