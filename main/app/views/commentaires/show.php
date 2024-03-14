<?php foreach ($comments as $comment) : ?>
    <div class="mb-4">
        <div class="flex items-center mb-2">
            <img
            src="../documents/pictures/<?php echo $comment['picture']?>"
            alt="<?php echo $comment['name']?>"
            class="w-10 h-10 rounded-full mr-2"
            />
            <span class="font-bold"><?php echo $comment['name']?></span>
        </div>
        <p class="text-gray-700">
        <?php echo $comment['content']?>
        </p>
    </div>
<?php endforeach; ?>