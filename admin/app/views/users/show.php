<?php foreach ($users as $user) : ?>
    <option name="user_id" value="<?php echo $user['id']?>" <?php if ($user['email'] != 0) { echo "selected"; } ?>><?php echo $user['name']?></option>
<?php endforeach; ?>