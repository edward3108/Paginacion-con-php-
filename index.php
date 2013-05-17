<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once("clase/class.php");

?>
<html>
<head>
<meta charset="utf-8"/>
<title>Paginaci&oacute;n</title>
<link rel="stylesheet" type="text/css" href="css/estilo.css">
<script type="text/javascript" src="js/funcion.js"></script>
</head>



<body>
  <div>
	<?php
		$instancia = new listar();
		$total=$instancia->seleccionar();
			
		$numero=5;
		$pagina=$_GET['num'];
		if (is_numeric($pagina))
		{
			$inicio=(($pagina-1)*$numero);

		} 
		else{

			$inicio=0;
		}

		$resultado=$instancia->seleccionar_2($inicio,$numero);
		$numero_de_paginas= ceil( $total / $numero);
	?>
<ul>
<?php
for ($i=0; $i <count($resultado) ; $i++) { 
	

?>
<li><?php echo $resultado[$i]["REGISTRO"]; ?></li>
<?php
}
?>
</ul>
<hr>
<?php
if ($pagina>1)
{
	echo "<a href='paginas.php?num=".($pagina-1)."'>Anterior</a> ";
}

	for ($j=1; $j <=$numero_de_paginas ; $j++) { 

		//echo $j." ";
		if ($j==$pagina)
		{
			echo $j." ";

		}
		else
		{
			echo "<a href='paginas.php?num=$j'>$j</a> ";
		}
		
	}

	if($pagina<$numero_de_paginas){

	echo "<a href='paginas.php?num=".($pagina+1)."'>Siguiente</a> ";
}
?>
</div>
</body>

</html>
