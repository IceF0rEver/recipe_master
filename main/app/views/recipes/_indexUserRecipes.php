<?php foreach ($recipesByUser as $recipeByUser) : ?>
    <article class="bg-gray-800 rounded-lg overflow-hidden shadow-lg relative">
        <img src="<?php echo $recipeByUser['recipe_picture']?>" alt="<?php echo $recipeByUser['recipe_name']?>" class="w-full h-48 object-cover"/>
        <div class="p-4">
            <h5 class="text-lg font-bold mb-2"><?php echo $recipeByUser['recipe_name']?></h5>
            <div class="flex items-center mb-2">
                <span class="text-yellow-500 mr-1">
                    <i class="fas fa-star"></i>
                </span>
                <span><?php echo $recipeByUser['rate']?></span>
            </div>
            <p class="text-gray-500">
            <?php echo Core\Tools\truncate($recipeByUser['recipe_desc']); ?> 
            </p>
            <a             
            href="recipes/<?php echo $recipeByUser['recipe_id']; ?>/<?php echo Core\Tools\slugify($recipeByUser['recipe_name']); ?>"
            class="text-yellow-500 hover:text-yellow-600 mt-2 inline-block">Voir la recette
            </a>
        </div>
    </article>
<?php endforeach; ?>
