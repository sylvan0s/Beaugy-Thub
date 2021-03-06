<?php
/* VARIABLES */
$titre = htmlspecialchars($_POST['titre']);
$url = htmlspecialchars($_POST['url']);
$choix = $_POST['choix'];

$page = file_get_contents($url);                                // Code PHP servant à récupérer toute la page github
$premier = "<article class=\"markdown-body entry-content\"";    // On définit la variable où commence la partie de la page que l'on veut (on veut seulement le readme)
$dernier = "<div class=\"site-footer\"";                        // On définit la variable où finit la partie de la page que l'on veut (ce code apparait après la partie readme)
$debutLien = strpos($page, $premier);                           // Donne la position de la variable de début
$finLien = strpos($page, $dernier);                             // Donne la position de la variable de fin
$content = substr($page, $debutLien, $finLien - $debutLien);    // Fonction filtrante

/* CODE */
if (isset($url) && isset($choix))
{
    echo "<!DOCTYPE html>";
    echo "<html lang=\"fr\">";
    echo "<head>";
        echo "<meta charset=\"utf-8\" />";
        echo "<title>" . $titre . " - Beaugy'Thub</title>";
        echo "<link href=\"css/bootstrap-theme.min.css\" rel=\"stylesheet\">";
        echo "<link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">";
        switch ($choix) {
            case 1:
                echo "<link href=\"css/mangas.css\" rel=\"stylesheet\">";
                break;
            case 2:
                echo "<link href=\"css/animaux.css\" rel=\"stylesheet\">";
                break;
            case 3:
                echo "<link href=\"css/sf.css\" rel=\"stylesheet\">";
                break;
            case 4:
                echo "<link href=\"css/3D.css\" rel=\"stylesheet\">";
                break;
            case 5:
                echo "<link href=\"css/jeux.css\" rel=\"stylesheet\">";
                break;
            case 6:
                echo "<link href=\"css/geek.css\" rel=\"stylesheet\">";
                break;
            case 7:
                echo "<link href=\"css/musique.css\" rel=\"stylesheet\">";
                break;
            case 8:
                echo "<link href=\"css/Fruits.css\" rel=\"stylesheet\">";
                break;
            default:
                echo "<link href=\"css/style.css\" rel=\"stylesheet\">";
                break;
        }
    echo "</head>";

    echo "<body>";
        include("header.php");
        echo "<div class=\"container\">";
            echo $content;
        echo "</div>";
        include("footer.php");
    echo "</body>";
    echo "</html>";
} else {
    echo "<!DOCTYPE html>";
    echo "<html lang=\"fr\">";
    echo "<head>";
        echo "<meta charset=\"utf-8\" />";
        echo "<title>Beaugy'Thub</title>";
        echo "<link href=\"css/bootstrap-theme.min.css\" rel=\"stylesheet\">";
        echo "<link href=\"css/bootstrap.min.css\" rel=\"stylesheet\">";
        echo "<link href=\"css/style.css\" rel=\"stylesheet\">";
    echo "</head>";

    echo "<body>";
        echo "<div class=\"container\">";
            echo "<article>";
                //  Formulaire qui disparait quand on entre une url
                echo "<form class=\"form-signin\" role=\"form\" action=\"index.php\" method=\"POST\">";
                echo "<h2 class=\"form-signin-heading\">Beaugy'Thub</h2><br>";
                echo "<div class=\"form-group\">";
                echo "<p><input class=\"form-control\" type=\"text\" name=\"titre\" placeholder=\"Entrez le titre du projet\"></p>";
                echo "<p><input class=\"form-control\" type=\"text\" name=\"url\" placeholder=\"Entrez l'url Github\"></p>";
                echo "<select name=\"choix\">";
                    echo "<option value=\"0\">Par défaut</option>";
                    echo "<option value=\"1\">Mangas</option>";
                    echo "<option value=\"2\">Animaux</option>";
                    echo "<option value=\"3\">Science-Fiction</option>";
                    echo "<option value=\"4\">3D</option>";
                    echo "<option value=\"5\">Jeux vidéo</option>";
                    echo "<option value=\"6\">Geek</option>";
                    echo "<option value=\"7\">Musique</option>";
                    echo "<option value=\"8\">Fruits</option>";
                echo "</select>";
                echo "</div>";
                echo "<button type=\"submit\" class=\"btn btn-lg btn-primary btn-block\">Valider</button>";
                echo "</form>";
            echo "</article>";
        echo "</div>";
    echo "</body>";
    echo "</html>";
}