<div class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
    <h1 class="text-2xl font-bold mb-4">Ajouter un utilisateur</h1>

    <form action="users/add/form" method="post" class="text-gray-800">
        <div class="mb-4">
            <label for="name" class="block text-sm font-medium text-gray-300">Nom de l'utilisateur</label>
            <input type="text" name="name" id="name" required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium text-gray-300">Mail</label>
            <input type="text" name="email" id="email" required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="password" class="block text-sm font-medium text-gray-300">Mot de passe</label>
            <input type="text" name="password" id="password" required class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="biography" class="block text-sm font-medium text-gray-300">Biographie</label>
            <input type="text" name="biography" id="biography" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <label for="picture" class="block text-sm font-medium text-gray-300">Nom de l'image de profil</label>
            <input type="text" name="picture" id="picture" class="mt-1 p-2 w-full border rounded-md">
        </div>

        <div class="mb-4">
            <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white p-2 rounded-md">Ajouter</button>
        </div>
    </form>
</div>