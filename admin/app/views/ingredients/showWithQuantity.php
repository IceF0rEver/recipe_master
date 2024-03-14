<?php foreach ($ingredients as $ingredient) : ?>
    <li class="w-full sm:w-1/3 px-4 py-2 border-b border-gray-200 sm:border-b-0 sm:border-r dark:border-gray-600">
        <div class="flex items-center">
            <input name="ingredients_ids[]" id="ingredient_<?php echo $ingredient['id']?>" value="<?php echo $ingredient['id']?>" type="checkbox" <?php if (isset($ingredient['quantity']) && $ingredient['quantity'] != 0) { echo "checked"; } ?> class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500">
            <label for="ingredient_<?php echo $ingredient['id']?>" class="ml-2 text-gray-900 dark:text-gray-300"><?php echo $ingredient['name'] ?></label>
            <input type="text" placeholder="Quantité" name="quantities[<?php echo $ingredient['id']?>]" id="quantity-<?php echo $ingredient['id']?>" value="<?php if (isset($ingredient['quantity']) && $ingredient['quantity'] != 0) { echo $ingredient['quantity']; } ?>" class="mt-1 p-2 border rounded-md">
        </div>
    </li>
<?php endforeach; ?>

