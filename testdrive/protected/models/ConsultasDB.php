<?php

class ConsultasDB
{

	public function guardar_usuario($nombre, $email, $password, $sexo)
	{
		$conexion= Yii::app()->db;
		$password= sha1($password);
		$codigo_verificacion=rand(10000,99999);

		$consulta="INSERT INTO usuarios ";
		$consulta.="(nombre, email, password, sexo, codigo_verificacion)";
		$consulta.="VALUES";
		$consulta.="('$nombre','$email','$password','$sexo','$codigo_verificacion')";

		$resultado = $conexion->createCommand($consulta);
		$resultado->execute();
	}
}


?>