<?php

require 'lib/functions.php';
?>
<?php require 'layout/header.php'; ?>
<div class="container">
<h1>
    Helping you find your new collectible guitar from over <?php echo count( get_guitars()); ?> guitars.
</h1>
</div>

<?php require 'layout/footer.php' ?>