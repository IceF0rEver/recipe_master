<ul class="list-disc pl-5">
    <?php foreach ($ingredients as $ingredient) : ?>
        <li><?php echo $ingredient['name']." ".$ingredient['quantity'] ?></li>
    <?php endforeach; ?>
</ul>