<?php
    $lang = isset($_GET['lang']) ? $_GET['lang'] : 'fr'; // par défaut, la langue est "fr" (français)
    require_once("../$lang/template_header.php");
    $currentPageId = 'accueil';
    
    if(isset($_GET['page'])) {
        $currentPageId = $_GET['page'];
    } 
?>
<header class="bandeau_haut">
    <h1 class="titre">BenPuz</h1>
</header>
<?php
    require_once("../$lang/template_menu.php");
    RenderMenuToHTML($currentPageId, $lang);
?>
<section class="corps">
    <?php
        $pageToInclude = "../" . $lang . "/" . $currentPageId . ".php";
        if(is_readable($pageToInclude))
            require_once($pageToInclude);
        else
            require_once("../$lang/error.php");
    ?>
</section>
<?php
    require_once("../$lang/template_footer.php");
?> 