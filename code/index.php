<!DOCTYPE html>
<html>
    <head>
        <title>Beaugy'Thub</title>
        <meta charset="utf-8" />
        <link href="dist/css/bootstrap.min.css" rel="stylesheet"> /* lien css Bootstrap */
        <style>
        
        /* CSS du formulaire */
        body{
        padding-top: 40px;
		padding-bottom: 40px;
		background-color: #eee;       
        }
        
       .form-control {
		display: block;
		width: 100%;
		}
		
		.container {
		width: 1170px;
		}
		
		.form-signin {
		max-width: 330px;
		padding: 15px;
		margin: 0 auto;
		}
		
		h2, .h2 {
		font-size: 30px;
		}
        </style>
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
        
        /*  Formulaire qui disparait quand on entre une url) */
        <form class="form-signin" role="form" action="test.php" method="POST">
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