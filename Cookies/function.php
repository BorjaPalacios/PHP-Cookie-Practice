<?php 

	function pintarForm(){

		echo "<form action='coockies.php' method='post'>\n";
		echo "<input type='radio' name='idioma' value='español'>Español\n";
		echo "<input type='radio' name='idioma' value='aleman'>Aleman\n";
		echo "<input type='radio' name='idioma' value='japones'>Japones\n";
		echo "<input type='radio' name='idioma' value='ingles'>Ingles<br><br>\n";
		echo "<label>Color de la fuente:</label>\n";
		echo "<input type='color' name='colorFuente' value='#000000'><br><br>\n";
		echo "<label>Color del fondo:</label>\n";
		echo "<input type='color' name='colorFondo' value='#FFFFFF'><br><br>\n";
		echo "<input type='submit' value='Enviar'>\n";
		echo "</form>\n";

	}

	function json(){

		$data = file_get_contents('./idiomas.json');
		$palabras = json_decode($data,true);

		return $palabras;
	}

	function texto($idioma, $palabras){

		echo "<form action='coockies.php' method='post'>\n";
		echo "<label>".$palabras[$idioma]["nombre"]."</label>\n";
		echo "<input type='text' name='nombre'><br>\n";
		echo "<label>".$palabras[$idioma]["apellido"]."</label>\n";
		echo "<input type='text' name='apellido'><br>\n";
		echo "<label>".$palabras[$idioma]["edad"]."</label>\n";
		echo "<input type='number' name='edad' max='120' min='8'><br>\n";
		echo "<input type='submit' value='".$palabras[$idioma]['enviar']."'>\n";
		echo "</form>\n";
	}

	function validation(){

		return ((isset($_POST['nombre']) && !empty($_POST['nombre'])) && (isset($_POST['apellido']) && !empty($_POST['apellido'])) && (isset($_POST['edad']) && !empty($_POST['edad'])));
	}

	function ver_formulario($idioma,$palabras){

		echo "<p>".$palabras[$idioma]["nombre"].": ".$_POST['nombre']."</p>\n";
		echo "<p>".$palabras[$idioma]["apellido"].": ".$_POST['apellido']."</p>\n";
		echo "<p>".$palabras[$idioma]["edad"].": ".$_POST['edad'].$palabras[$idioma]["años"]."</p>\n";

		echo "<form action='coockies.php' method='post'>\n";
		echo "<input type='hidden' name='armaguedon'>\n";
		echo "<input type='submit' value='".$palabras[$idioma]['volver']."'>\n";
	}


 ?>