<?php
require "lib/data.php";
require "inc/header.php";
?>

<div id="content">
    Home
    <?php 
    $info_user = array(
        'username' => 'dungken2112',
        'password' => 'dungken@!!@'
    );
    show_array($info_user);
    ?>
</div>

<?php
require "inc/footer.php";
?>