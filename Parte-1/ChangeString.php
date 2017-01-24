<?php
	/*
		En la lista de enunciados dice que todo se trabaja en un solo archivo
	*/
	
	//Este header es para que se muestre con la letra ñ
	header('Content-Type: text/html; charset=ISO-8859-1');
	
	/**
		Esta clase es la que contiene el metodo build que incrementa la letra
	*/
    class ChangeString { 
		public function build ($input){
			$nuevaCadena = "";
			for($i=0;$i<strlen($input);$i++){ 
				$letra = $input[$i];
				if(!is_numeric($letra)){
					switch ($letra){
						case 'n':
							$nuevaCadena .= 'ñ';
						break;
						case 'N':
							$nuevaCadena .= 'Ñ';
						break;
						case 'ñ':
							$nuevaCadena .= 'o';
						break;
						case 'Ñ':
							$nuevaCadena .= 'O';
						break;
						case 'z':
							$nuevaCadena .= 'a';
						break;
						case 'Z':
							$nuevaCadena .= 'A';
						break;
						
						default:
							$nuevaCadena .= ++$letra;
					}
				}else{
					$nuevaCadena .= $letra;
				}
			} 
			return $nuevaCadena;
		}
	} 
    /*
		Obtengo los datos enviados por post
	*/
	
	$input = ($_POST && $_POST['entrada']) ? $_POST['entrada']:'';
	
	/*
		Instancio la clase y la asigno a una variable
	*/
	$cambiarCadena = new ChangeString();
	
	/*
		Invoco al metodo de la clase y le paso lo parametros
	*/
	$cadenaCambiada = $cambiarCadena->build($input);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Prueba 1 ChangeString</title>
    </head>
    <body>
		<h1>Prueba 1 ChangeString</h1>
		<h3>Introdusca los parametros a cambiar</h3>
		<form name="changeStringForm" action="ChangeString.php" method="post">
			<input type="text" name="entrada"/>
			<input type="submit" name="submit" value="¡Cambiar cadena!" />
		</form>
		<br/>
		<?php 
			if(strlen($cadenaCambiada)>0){
				echo 'El resultado es: '. $cadenaCambiada;
			}
		?>
    </body>
</html>
