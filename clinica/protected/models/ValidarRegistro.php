<?php

class ValidarRegistro extends CFormModel{

	public $nombre;
	public $email;
	public $password;
	public $repetir_password;

	public function rules()
	{

		return array
		(
			array('nombre','required','message' => 'este campo es requerido'),
			array('nombre', 'match','pattern' =>'/^[a-z0-9]+$/i', 'message'=>'Solo letras y numeros'),
			array('nombre','length', 'min'=>3, 	'tooShort'=>'Más de 3','max'=>50,'tooLong'=>'max 50'),
			array('nombre','comprobar_nombre'),

			array('email','required','message' => 'este campo es requerido'),
			array('email','email','message'=> 'formato invalido'),
			array('email','comprobar_email'),

			array('password','required','message' => 'este campo es requerido'),
			array('password', 'match','pattern' =>'/^[a-z0-9]+$/i', 'message'=>'Solo letras y numeros'),
			array('password','length', 'min'=>3, 	'tooShort'=>'mas de 8','max'=>16,'tooLong'=>'max 16'),

			array('repetir_password','required','message' => 'este campo es requerido'),
			array('repetir_password','compare','compareAttribute'=>'password', 'message' => 'no coinciden las contraseñas'),

		);
	}
	public function comprobar_nombre($attributes, $params)
	{
		$conexion=Yii::app()->db;
		$consulta="SELECT username FROM user ";
		$consulta.="WHERE UPPER(username)='".strtoupper($this->nombre)."' ";
		$resultado=$conexion->createCommand($consulta);
		$filas=$resultado->query();
		foreach ($filas as $fila) 
		{
			if(strtoupper($this->nombre)===strtoupper($fila['username']))
			{
				$this->addError('nombre', ' Usuario no disponible.');
				break;
			}
			
		}
	}
	public function comprobar_email($attributes, $params)
	{
		$conexion=Yii::app()->db;
		$consulta="SELECT email FROM user ";
		$consulta .="WHERE email='".$this->email."' ";
		$resultado=$conexion->createCommand($consulta);
		$filas=$resultado->query();
		foreach ($filas as $fila) 
		{
			if($this->email===$fila['email'])
			{
				$this->addError('email','email no disponible.');
				break;
			}
			
		}
	}

}
?>