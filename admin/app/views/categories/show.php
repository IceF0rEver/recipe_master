<?php foreach ($categories as $category) : ?>
    <option name="type_id" value="<?php echo $category['id']?>" <?php if ($category['description'] != 0) { echo "selected"; } ?>><?php echo $category['name']?></option>
<?php endforeach; ?>