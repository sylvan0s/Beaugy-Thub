<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Beaugy'Thub</title>
        <link href="dist/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="dist/css/bootstrap.min.css" rel="stylesheet"> <!-- lien css Bootstrap -->
        <link href="dist/css/style.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php
            if (isset($_POST['url']))
            {
                $page = file_get_contents( $_POST['url'] );    /* Code PHP servant à récupérer toute la page github */
                $premier = '<div id="readme" ';                /* On définit la variable où commence la partie de la page que l'on veut (on veut seulement le readme)*/
                $dernier = '<div class="site-footer"';         /* On définit la variable où finit la partie de la page que l'on veut (ce code apparait après la partie readme)*/
                $debutLien = strpos($page, $premier);            /* Donne la position de la variable de début*/
                $finLien = strpos($page, $dernier); 			 /* Donne la position de la variable de fin */
                $leLien = substr( $page, $debutLien, $finLien - $debutLien); /* Fonction filtrante */
                echo $leLien;
            }
            else {
            ?> 
                <!--  Formulaire qui disparait quand on entre une url -->
                <form class="form-signin" role="form" action="index.php" method="POST">
                    <h2 class="form-signin-heading">Beaugy'Thub</h2>
                    <div class="form-group"> 
                        <input class="form-control" type="text" name="url" placeholder="Entrez l'url Github">
                    </div>
                    <button type="submit" class="btn btn-lg btn-primary btn-block">Valider</button>
                </form>
                <?php
                }
                ?>
         </div>
    </body>
</html>