<?php require_once('template_header.php'); ?>

        <h1>Mes Hobbies</h1>
        <h2>Menu</h2>
        <?php
            require_once('template_menu.php');
            renderMenuToHTML('hobbies');
        ?>
        <h2> Activités Extrascolaires </h2>
        <ul>
            <li>Handball<br>
                <p>Arrière titulaire de l'équipe de l'école</p>
            </li>
            <li>Musique<br>
                <p>MAO, maîtrise du logiciel FL Studio</p>
            </li>
        </ul>

<?php require_once('template_footer.php'); ?>