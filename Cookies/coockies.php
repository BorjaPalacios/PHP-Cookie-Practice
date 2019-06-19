<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Cookies</title>
	<link rel="stylesheet" type="text/css" href="coockies.css">
</head>
<body>
	
	<?php 

		require_once './function.php';

		if (isset($_POST['armaguedon'])) {
			
			setcookie('Idioma',' ',time() + (-1));

			header("Refresh: 0; url= coockies.php");
		}

		if (isset($_COOKIE['Idioma'])) {

				echo "<style> 
					body { 	
						background-color: ".$_COOKIE['ColorFondo'].";
						color: ".$_COOKIE['ColorFuente'].";
						 }

				</style>\n";

		}

		if (validation()) {

			ver_formulario($_COOKIE['Idioma'], json());


		}else{

			if (isset($_COOKIE['Idioma'])) {

				texto($_COOKIE['Idioma'], json());		

			}else{

				if(isset($_POST['idioma'])){

					setcookie('Idioma',$_POST['idioma'],time()+(5*365*24*60*60));
					setcookie('ColorFuente',$_POST['colorFuente'],time()+(5*365*24*60*60));
					setcookie('ColorFondo',$_POST['colorFondo'],time()+(5*365*24*60*60));

					header("Refresh: 0; url= coockies.php");

				}else{

					pintarForm();

				}

			}
		}

	 ?>

</body>
</html>