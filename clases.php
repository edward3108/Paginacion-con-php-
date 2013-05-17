<?php

 class conectar 
{
  
	public static function conexion()
	{	
		$server="localhost";
		$usuario="root";
		$password="";
		$db="libreria";
		$con=mysql_connect($server,$usuario,$password);
		mysql_query("set names 'utf8'");
		mysql_select_db($db);
		return $con;
	}
}


//fin clase conectar..............................................................
class listar
{	
	private $lista;

	public function __listado()
	{
		$this->lista= array();
	}
	public function seleccionar()
	{
		$sql="SELECT count(*) AS CUANTO FROM PAGINACION";
		$ejecutar=mysql_query($sql,conectar::conexion());
		if ($reg=mysql_fetch_array($ejecutar))
		{

			$total=$reg["CUANTO"];
		}
			return $total;

	}
	public function seleccionar_2($inicio,$numero)
	{
		$sql="SELECT *FROM PAGINACION LIMIT $inicio,$numero";
		$ejecutar=mysql_query($sql,conectar::conexion());
		while ($reg=mysql_fetch_assoc($ejecutar))
		{
			$this->lista[]=$reg;
		}
		return $this->lista;
	}

}

?>
