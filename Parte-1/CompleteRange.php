<?php
	/*
		En la lista de enunciados dice que todo se trabaja en un solo archivo
		Por lo que todo el codigo estara mezclado tanto html como php
	*/
	header('Content-Type: text/html; charset=ISO-8859-1');
	
	class CompleteRange  {
		/*
			
		*/
		public function build($range){
			sort($range);
			
			//Obtener el primer elemento del arreglo
			$inicio = $range[0];
			//Obtener el ultimo elemento del arreglo
			$fin = end($range); 
			
			//Con el primer y ultimo elemento se genera un rango
			$nuevoRango = range($inicio, $fin);
			return $nuevoRango;
		}
	}
	
	$input1 = [1, 2, 4, 5];
	$input2 = [2, 4, 9];
	$input3 = [55, 58, 60];
	
	/*
		Instancio la clase y la asigno a una variable
	*/
	$completarRango = new CompleteRange();
	
	/*
		Uso de del metodo para procesar cada uno de los inputs
	*/
	$rango1 = $completarRango->build($input1);
	$rango2 = $completarRango->build($input2);
	$rango3 = $completarRango->build($input3);
	
	/*
		Imprimo los resultados de cada uno de los inputs
	*/
	
	echo "<h1>Prueba 2 Complete Range</h1>";
	
	echo "[1,2,4,5] = [".rtrim(implode(',', $rango1), ',')."]";
	echo "<hr>";
	
	echo "[2, 4, 9] = [".rtrim(implode(',', $rango2), ',')."]";
	echo "<hr>";
	
	echo "[55, 58, 60] = [".rtrim(implode(',', $rango3), ',')."]";
	echo "<hr>";
?>