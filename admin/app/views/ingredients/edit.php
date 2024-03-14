<div class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
    <h1 class="text-2xl font-bold mb-4">modifier un ingrédient</h1>

    <form action="ingredients/edit/form" method="post" class="text-gray-800">
        <input type="hidden" name="id" value="<?php echo $ingredient['id'];?>">
        
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-300">Nom de l'ingrédient</label>
            <input type="text" name="name" id="name" value="<?php echo $ingredient['name'];?>" required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-300">Unit de l'ingrédient</label>
            <input type="text" name="description" id="description" value="<?php echo $ingredient['unit'];?>" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md">Modifier</button>
        </div>
    </form>
</div>
