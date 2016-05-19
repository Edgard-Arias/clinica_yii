<?php

class ValidarRegistro extends CFormModel{

	public $nombre;
	public $email;
	public $password;
	public $repetir_password;
	public $sexo;
	public $terminos;
	public $captcha;

	public function rules()
	{

		return array
		(
			array('nombre','required','message' => 'este campo es requerido'),
			array('nombre', 'match','pattern' =>'/^[a-záéíóúñ\s]+$/i', 'message'=>'caracter invalido'),
			array('nombre','length', 'min'=>5, 	'tooShort'=>'mas de 5','max'=>50,'tooLong'=>'max 50'),

			array('email','required','message' => 'este campo es requerido'),
			array('email','email','message'=> 'formato invalido'),
			array('email','comprobar_email'),

			array('password','required','message' => 'este campo es requerido'),
			array('password', 'match','pattern' =>'/^([a-z]+[0-9])|([0-9]+[a-z])/i', 'message'=>'letras y numeros'),
			array('password','length', 'min'=>8, 	'tooShort'=>'mas de 8','max'=>16,'tooLong'=>'max 16'),

			array('repetir_password','required','message' => 'este campo es requerido'),
			array('repetir_password','compare','compareAttribute'=>'password', 'message' => 'no coinciden las contraseñas'),

			array('sexo','required','message' => 'este campo es requerido'),
			array('sexo', 'match','pattern' =>'/^[0-9]/', 'message'=>'solo numeros'),

			array('terminos','required','message' => 'aceptar antes de continuar'),

			array('captcha','captcha','message' => 'No coincide'),

		);
	}
	public function attributeLabels()
	{
		return array(
			'terminos'=>'Aceptar los términos');
	}
	public function comprobar_email($attributes, $params)
	{
		//AJAX
		// $emails = array('algo@algo.com', 'admin@admin.com');
		// foreach ($emails as $e) 
		// {
		// 	if($this->email==$e)
		// 	{
		// 		$this->addError('email','email no disponible.');
		// 		break;
		// 	}
		// }
		$conexion=Yii::app()->db;
		$consulta="SELECT email FROM usuarios";
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