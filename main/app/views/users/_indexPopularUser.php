<section class="bg-gray-700 text-white rounded-lg shadow-2xl p-6 my-6">
          <!-- User Info -->
          <div class="flex items-center mb-6">
            <!-- User Avatar -->
            <img
              src="../documents/pictures/<?php echo $user['picture']?>"
              alt="Nom de l'utilisateur"
              class="w-24 h-24 rounded-full border-4 border-yellow-500 mr-4"
            />

            <!-- User Details -->
            <div>
              
              <h3 class="text-2xl font-bold"><?php echo $user['user_name']?></h3>
              <p class="text-gray-400">Membre depuis: <?php echo $user['user_created_at']?></p>
              <p class="text-gray-400">Nombre de recettes postées: <?php echo $user['dish_count']?></p>
            </div>
          </div>

          <!-- User Actions -->
          <div class="flex justify-between items-center mb-4">
            <a
            href="chiefs/<?php echo $user['user_id']; ?>/<?php echo Core\Tools\slugify($user['user_name']); ?>"
              class="bg-yellow-500 hover:bg-yellow-600 text-gray-900 rounded-full px-6 py-2"
              >Voir mes recettes</a
            >
          </div>

          <!-- User's Latest Recipes -->
          <div>
            <h4
              class="text-xl font-bold mb-4 border-b-2 border-yellow-500 pb-2"
            >
              Mes dernières recettes
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
              <!-- Recipe Card (Repeat for each recipe) -->
              <?php include '../app/views/recipes/_indexUserRecipes.php'; ?>
            </div>
          </div>
        </section>