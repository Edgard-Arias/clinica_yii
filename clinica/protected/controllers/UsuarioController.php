<?php

class UsuarioController extends Controller
{
	// public function actionConfiguracion()
	// {
	// 	$this->render('configuracion');
	// }

	
	public function filters()
	{
		return array('accessControl');
	}

	public function accessRules()
	{
		// return external action classes, e.g.:
		return array(
			array(
			'deny',
			'actions'=> array('configuracion'),
			'users'=>array('?'),
			),
		);
	}
	public function actionConfiguracion()
	{
		$model= new CambiarPassword;
		$msg='';
		if(isset($_POST["CambiarPassword"]))
		{
			
			$model->attributes = $_POST["CambiarPassword"];
			if(!$model->validate())
			{
				$msg="<strong class='text-error'>Error al enviar el formulario.</strong> ";
			}
			else
			{
				$conexion = Yii::app()->db;
				$username = Yii::app()->user->name;

				$consulta="UPDATE USER SET PASSWORD='".$model->repetir_password."' WHERE USERNAME='".$username."' ";
				$resultado=$conexion->createCommand($consulta)->execute();
				// $resultado = $conexion->createCommand($consulta);
				// $resultado->execute();

				if($resultado)
				{
					$msg="<strong> Contraseña cambiada con éxito.</strong>";
				}
				else
				{
					$msg="<strong> La contraseña no fue cambiada.</strong>";
				}
				$model->unsetAttributes();
			}
		}

		$this->render('configuracion',array('model'=>$model,'msg'=>$msg));
	}
	
}