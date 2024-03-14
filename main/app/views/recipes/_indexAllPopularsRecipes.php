<section>
          <h2 class="text-2xl font-bold mb-4">Recettes populaires</h2>
          <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Recipe Card -->
            <?php foreach ($recipes as $recipe) : ?>
            <article
              class="bg-white rounded-lg overflow-hidden shadow-lg relative"
            >
              <img
                class="w-full h-48 object-cover"
                src="<?php echo $recipe['recipe_picture']?>"
                alt="Recipe Image"
              />
              <div class="p-4">
                <h3 class="text-xl font-bold mb-2"><?php echo $recipe['recipe_name']?></h3>
                <div class="flex items-center mb-2">
                  <span class="text-yellow-500 mr-1"
                    ><i class="fas fa-star"></i
                  ></span>
                  <span><?php echo $recipe['rate']?></span>
                </div>
                <p class="text-gray-600">
                <?php echo Core\Tools\truncate($recipe['recipe_desc']); ?> 
                </p>
                <div class="flex items-center mt-4">
                  <span class="text-gray-700 mr-2">Par <?php echo $recipe['user_name']?></span>
                  <span class="text-gray-500"
                    ><i class="fas fa-comment"></i> <?php echo $recipe['comment_count']?> commentaires</span
                  >
                </div>
                <a
                  href="recipes/<?php echo $recipe['recipe_id']; ?>/<?php echo Core\Tools\slugify($recipe['recipe_name']); ?>"
                  class="inline-block mt-4 bg-red-500 hover:bg-red-800 rounded-full px-4 py-2 text-white"
                >
                  Voir la recette
                </a>
              </div>
            </article>
            <?php endforeach; ?>
          </div>
        </section>