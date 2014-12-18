<!DOCTYPE html>
<html>
    <head>
        <title>Beaugy'Thub</title>
        <meta charset="utf-8" />
        <link href="dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
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
      $page = file_get_contents( $_POST['url'] );
      $premier = '<div id="readme" ';
      $dernier = '<div class="site-footer"';
    $debutLien = strpos($page, $premier);
    //echo $debutLien;
    $finLien = strpos($page, $dernier); 
    //echo $finLien;
    $leLien = substr( $page, $debutLien, $finLien - $debutLien); 
    echo $leLien;
    }
    else {
        ?> 
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