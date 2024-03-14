<div class="page-header">
  <h1 class="text-3xl font-semibold">LISTE DES UTILISATEURS</h1>
</div>

<table class="table-auto border-collapse border">
  <thead>
    <tr>
      <th class="px-4 py-2 border">id</th>
      <th class="px-4 py-2 border">User Name</th>
      <th class="px-4 py-2 border">User Email</th>
      <th class="px-4 py-2 border">User Password</th>
      <th class="px-4 py-2 border">User Biography</th>
      <th class="px-4 py-2 border">User Picture</th>
      <th class="px-4 py-2 border">Created at</th>
      <th class="px-4 py-2 border">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($users as $user){ ?>
    <tr>
      <td class="px-4 py-2 border"><?php echo $user['id'];?></td>
      <td class="px-4 py-2 border"><?php echo $user['name'];?></td>
      <td class="px-4 py-2 border"><?php echo $user['email'];?></td>
      <td class="px-4 py-2 border"><?php echo $user['password'];?></td>
      <td class="px-4 py-2 border"><?php echo $user['biography'];?></td>
      <td class="px-4 py-2 border"><?php echo $user['picture'];?></td>
      <td class="px-4 py-2 border"><?php echo $user['created_at'];?></td>

      <td class="px-4 py-2 border">
        <a href="users/edit/<?php echo $user['id'];?>" class="block m-2 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-2">Modifier</a>
        <a href="users/delete/<?php echo $user['id'];?>" class="block m-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Supprimer</a>
      </td>
    </tr>
    <?php }?>
  </tbody>
</table>
