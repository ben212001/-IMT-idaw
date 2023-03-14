<?php require_once('template_header.php'); ?>


        <h1>Mon CV</h1>
        <h2>Menu</h2>
        <?php
            require_once('template_menu.php');
            renderMenuToHTML('cv');
        ?>
        <img src="CV.png">

<?php require_once('template_footer.php'); ?>