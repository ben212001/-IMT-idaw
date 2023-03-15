        <?php
        function renderMenuToHTML($currentPageId, $lang) {
            echo '<nav class="menu rouge"><ul>';
            $langMenu = $lang == 'fr' ? 'Anglais' : 'Français';
            $mymenu = array(
                // idPage titre
                'accueil' => array('Accueil'),
                'cv' => array('CV'),
                'projets' => array('Mes Projets'),
                'hobbies' => array('Mes Hobbies'),
                'contact' => array('Me Contacter'),
            );
        
            foreach($mymenu as $pageId => $pageParameters) {
                // Vérifie si la page en cours correspond à l'ID de la page en cours de la boucle.
                if ($pageId == $currentPageId) {
                    // Si c'est le cas, on ajoute l'identifiant "currentPage" à l'élément <a>.
                    echo '<li><a id="currentPage" href="index.php?page=' . $pageId . '">' . $pageParameters[0] . '</a><br></li>';
                } else {
                    // Sinon, on génère un lien normal.
                    echo '<li><a href="index.php?page=' . $pageId . '">' . $pageParameters[0] . '</a><br></li>';
                }
            }
            if($lang == 'fr'){
                echo'<li><a href="index.php?page=' . $currentPageId . '&lang=en">Passer en' . $langMenu . '</a></li>';
            }
            else {
                echo'<li><a href="index.php?page=' . $currentPageId . '&lang=' . $lang . '">Passer en' . $langMenu . '</a></li>';
            }
            echo"</ul></nav>";
        } 
        ?>