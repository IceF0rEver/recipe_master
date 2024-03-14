          <!-- User Main Content -->
          <!-- Main content -->
          <div class=" p-3">
            <!-- Hero User Profile -->
            <section class="relative mb-6">
              <img
                class="w-full h-96 object-cover"
                src="../documents/pictures/<?php echo $user['picture']?>"
                alt="User Profile Image"
              />
              <div
                class="absolute bottom-0 left-0 w-full p-6 bg-gradient-to-t from-gray-900 to-transparent"
              >
                <h1 class="text-3xl font-bold mb-2 text-white">
                  <?php echo $user['user_name']?>
                </h1>
                <p class="text-gray-300 mb-4">
                <?php echo $user['user_desc']?>
                </p>
              </div>
            </section>

            <!-- User's Recipes -->
            <section>
              <h2 class="text-2xl font-bold mb-4">Mes recettes</h2>
                <!-- Recipe Card -->
                <?php
                include_once '../app/models/recipesModel.php';
                $recipes = \App\Models\RecipesModel\findAllByUserId($connexion, $user['user_id']);
                include '../app/views/recipes/index.php';
                ?>
            </section>
          </div>
        </div>
