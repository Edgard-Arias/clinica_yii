<?php

class ConsultasDB
{

	public function guardar_usuario($nombre, $email, $password)
	{
		$conexion= Yii::app()->db;
		$password= $password;

		$consulta="INSERT INTO user ";
		$consulta.="(username, email, password) ";
		$consulta.="VALUES ";
		$consulta.="('$nombre','$email','$password') ";

		$resultado = $conexion->createCommand($consulta);
		$resultado->execute();
	}

	public function traer_prevision($codigo)
	{
		$conexion= Yii::app()->db;

		$consulta="SELECT TEXTO1 FROM CATALOGO WHERE NOMBRE='PREVISION' AND CLAVE1='".$codigo."' ";

		$resultado = $conexion->createCommand($consulta);
		$res = $resultado->queryRow();
		return $res["TEXTO1"];
	}

	public function traer_subprevision($codigo)
	{
		$conexion= Yii::app()->db;

		$consulta="SELECT TEXTO1 FROM CATALOGO WHERE NOMBRE='SUBPREVISION' AND CLAVE1='".$codigo."' ";

		$resultado = $conexion->createCommand($consulta);
		$res = $resultado->queryRow();
		return $res["TEXTO1"];
	}
	public function traer_region($codigo)
	{
		$conexion= Yii::app()->db;

		$consulta="SELECT region_nombre FROM regiones WHERE region_id='".$codigo."' ";

		$resultado = $conexion->createCommand($consulta);
		$res = $resultado->queryRow();
		return $res["region_nombre"];
	}
	public function traer_provincia($codigo)
	{
		$conexion= Yii::app()->db;

		$consulta="SELECT provincia_nombre FROM provincias WHERE provincia_id='".$codigo."' ";

		$resultado = $conexion->createCommand($consulta);
		$res = $resultado->queryRow();
		return $res["provincia_nombre"];
	}
	public function traer_comuna($codigo)
	{
		$conexion= Yii::app()->db;

		$consulta="SELECT comuna_nombre FROM comunas WHERE comuna_id='".$codigo."' ";

		$resultado = $conexion->createCommand($consulta);
		$res = $resultado->queryRow();
		return $res["comuna_nombre"];
	}
}


?>