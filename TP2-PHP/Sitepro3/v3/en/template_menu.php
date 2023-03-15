        <?php
        function renderMenuToHTML($currentPageId, $lang) {
            echo '<nav class="menu rouge"><ul>';
            $langMenu = $lang == 'en' ? 'French' : 'English';
            $mymenu = array(
                // idPage titre
                'accueil' => array('Welcome'),
                'cv' => array('Resume'),
                'projets' => array('My Projects'),
                'hobbies' => array('My Hobbies'),
                'contact' => array('Contact Me'),
            );
        
            foreach($mymenu as $pageId => $pageParameters) {
                // Vérifie si la page en cours correspond à l'ID de la page en cours de la boucle.
                if ($pageId == $currentPageId) {
                    // Si c'est le cas, on ajoute l'identifiant "currentPage" à l'élément <a>.
                    echo '<li><a id="currentPage" href="index.php?page=' . $pageId . '&lang=en">' . $pageParameters[0] . '</a><br></li>';
                } else {
                    // Sinon, on génère un lien normal.
                    echo '<li><a href="index.php?page=' . $pageId . '&lang=en">' . $pageParameters[0] . '</a><br></li>';
                }
            }
            if($lang == 'fr'){
                echo'<li><a href="index.php?page=' . $currentPageId . '&lang=en">Switch in ' . $langMenu . '</a></li>';
            }
            else {
                echo'<li><a href="index.php?page=' . $currentPageId . '&lang=fr">Switch in ' . $langMenu . '</a></li>';
            }
            echo"</ul></nav>";
        } 
        ?>