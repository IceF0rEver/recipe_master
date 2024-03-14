<ul class="list-reset text-gray-100">
    <?php foreach ($categories as $categorie) : ?>
        <li>
            <a class="hover:text-white hover:bg-yellow-600 px-2 block" href="#"><?php echo $categorie['name']?> </a>
        </li>
    <?php endforeach; ?>
</ul>