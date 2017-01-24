<?php
	/*
		En la lista de enunciados dice que todo se trabaja en un solo archivo
	*/

	//Este header es para que se muestre con la letra 
	header('Content-Type: text/html; charset=ISO-8859-1');
	
	/**
		Esta clase es la que contiene el metodo build que limpia las parentesis sobrantes
	*/
    class ClearPar { 
		public function build ($input){

			/*
				Contamos la cantidad de veces que aparece "()"
			*/
			$repite = substr_count($input, '()');

			/*
				Generamos una cadena con la cantidad de veces encontrada.
				Como son 2 caracteres "(" y ")" lo multiplicamos por 2 
				para la generacion del tamaño de la cadena
			*/
			$nuevaCadena = str_pad("", $repite*2, "()");
			
			return $nuevaCadena;
		
		}
	} 
	//instanciación de la clase
	$objClearPar = new ClearPar();
	
	//parametros brindados en la prueba
	$input1 = "()())()";
	$input2 = "()(()";
	$input3 = ")(";
	$input4 = "((()";
	
	//asignacion de las salidas
	$salida01 = $objClearPar->build($input1);
	$salida02 = $objClearPar->build($input2);
	$salida03 = $objClearPar->build($input3);
	$salida04 = $objClearPar->build($input4);
	
	echo "<h2>Problema 03</h2>";
	echo $input1 . " = ".$salida01;
	echo "<hr>";//el hr es para la linea 
	echo $input2 . " = ".$salida02;
	echo "<hr>";
	echo $input3 . " = ".$salida03;
	echo "<hr>";
	echo $input4 . " = ".$salida04;
	echo "<hr>";
	
?>
