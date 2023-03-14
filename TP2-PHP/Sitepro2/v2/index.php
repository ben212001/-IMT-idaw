<?php require_once('template_header.php'); ?>

        <h1>Bienvenue sur mon premier site !</h1>
        <h2>Menu</h2>
        <?php
            require_once('template_menu.php');
            renderMenuToHTML('index');
        ?>
        <h2 id="center">Loading... </h2>

<?php require_once('template_footer.php'); ?>