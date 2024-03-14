<div class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
    <h1 class="text-2xl font-bold mb-4">Ajouter un ingrédient</h1>

    <form action="ingredients/add/form" method="post" class="text-gray-800">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-300">Nom de l'ingrédient</label>
            <input type="text" name="name" id="name" required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="description" class="block text-sm font-medium text-gray-300">Unit de l'ingrédient</label>
            <input type="text" name="description" id="description" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md">Ajouter</button>
        </div>
    </form>
</div>