<?php
class CambiarPassword extends CFormModel{

	public $password;
	public $repetir_password;
	public $repetir_nuevo_password;

	public function rules()
	{

		return array
		(
			array('password, repetir_password, repetir_nuevo_password','required','message' => 'Este campo es requerido'),			
			array('password, repetir_password, repetir_nuevo_password', 'match','pattern' =>'/^[a-z0-9]+$/i', 'message'=>'Solo letras y numeros'),
			array('repetir_nuevo_password','compare','compareAttribute'=>'repetir_password', 'message' => 'No coinciden las contraseñas'),
		);
	}
}



?>