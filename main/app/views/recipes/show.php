        <!-- Recipe Detail -->
        <section class="bg-white rounded-lg shadow-lg p-6 mb-6">
          <!-- Recipe Image -->
          <img
            class="w-full h-96 object-cover rounded-t-lg"
            src="<?php echo $recipe['recipe_picture']?>"
            alt="<?php echo $recipe['recipe_name']?>"
          />

          <!-- Recipe Info -->
          <div class="p-4">
            <h1 class="text-3xl font-bold mb-4"><?php echo $recipe['recipe_name']?></h1>
            <div class="flex items-center mb-4">
              <span class="text-yellow-500 mr-1"
                ><i class="fas fa-star"></i
              ></span>
              <span><?php echo $recipe['rate']?></span>
              <span class="ml-4 text-gray-700"
                ><i class="fas fa-clock"></i> <?php echo $recipe['time']?></span
              >
            </div>
            <p class="text-gray-700 mb-4">
            <?php echo $recipe['recipe_desc']?>
            </p>
            <div class="flex items-center mb-4">
              <span class="text-gray-700 mr-2">Par <?php echo $recipe['creator_name']?></span>
              <span class="text-gray-500"
                ><i class="fas fa-comment"></i> <?php echo $recipe['comment_count']?> commentaires</span
              >
            </div>
          </div>

          <!-- Ingredients -->
          <div class="p-4 border-t">
            <h2 class="text-2xl font-bold mb-4">Ingrédients</h2>
            <?php
            include_once '../app/models/ingredientsModel.php';
            $ingredients = \App\Models\IngredientsModel\findAllByRecipeId($connexion, $recipe['recipe_id']);
            include '../app/views/ingredients/show.php';
            ?>
          </div>

          <!-- Steps -->
          <div class="p-4 border-t">
            <h2 class="text-2xl font-bold mb-4">Étapes</h2>
            <?php echo $recipe['recipe_desc']?>
          </div>

          <!-- Comments -->
          <div class="p-4 border-t">
            <h2 class="text-2xl font-bold mb-4">Commentaires</h2>
            <!-- Comment -->
            <?php
            include_once '../app/models/commentairesModel.php';
            $comments = \App\Models\CommentairesModel\findAllByRecipeId($connexion, $recipe['recipe_id']);
            include '../app/views/commentaires/show.php';
            ?>
            <!-- ... (autres commentaires) ... -->
          </div>
        </section>
