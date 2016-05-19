<?php

class PacienteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('index','view','create','update','admin','delete','ProvinciaPorRegion','ComunaPorProvincia'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('index','view','create','update','admin','delete','ProvinciaPorRegion','ComunaPorProvincia'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$model=$this->loadModel($id);

		$var=explode("-", $model->FECHA_NACIMIENTO);
		$model->FECHA_NACIMIENTO=$var[2]."-".$var[1]."-".$var[0];
		$consulta = new ConsultasDB;

		$model->PREVISION=$consulta->traer_prevision($model->PREVISION);
		$model->SUB_PREVISION=$consulta->traer_subprevision($model->SUB_PREVISION);
		$model->REGION=$consulta->traer_region($model->REGION);
		$model->PROVINCIA=$consulta->traer_provincia($model->PROVINCIA);
		$model->COMUNA=$consulta->traer_comuna($model->COMUNA);		
		if($model->SEXO='M')$model->SEXO='MASCULINO';
		elseif($model->SEXO='F') $model->SEXO='FEMENINO';

		$this->render('view',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionProvinciaPorRegion()
	{
		
		$list=Provincias::model()->findAll("region_id=?",array($_POST["Paciente"]["REGION"]));
		echo "<option value=\"0\" >Seleccione </option>";
		foreach ($list as $data) 
			echo "<option value=\"{$data->provincia_id}\" > {$data->provincia_nombre} </option>";
		
	}
	public function actionComunaPorProvincia()
	{
		
		$list=Comunas::model()->findAll("provincia_id=?",array($_POST["Paciente"]["PROVINCIA"]));
		echo "<option value=\"0\" >Seleccione </option>";
		foreach ($list as $data) {
			echo "<option value=\"{$data->comuna_id}\" > {$data->comuna_nombre} </option>";
		}
	}
	public function actionCreate()
	{
		$model=new Paciente;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Paciente']))
		{
			// $var=explode("-", $_POST['Paciente']['FECHA_NACIMIENTO']);
			// $_POST['Paciente']['FECHA_NACIMIENTO']=$var[2]."-".$var[1]."-".$var[0];
			$model->attributes=$_POST['Paciente'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_PACIENTE));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
		$var=explode("-", $model->FECHA_NACIMIENTO);
		$model->FECHA_NACIMIENTO=$var[2]."-".$var[1]."-".$var[0];
		if(isset($_POST['Paciente']))
		{
			$var=explode("-", $_POST['Paciente']['FECHA_NACIMIENTO']);
			$_POST['Paciente']['FECHA_NACIMIENTO']=$var[2]."-".$var[1]."-".$var[0];
			$model->attributes=$_POST['Paciente'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->ID_PACIENTE));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		// $dataProvider=new CActiveDataProvider('Paciente');
		// $this->render('index',array(
		// 	'dataProvider'=>$dataProvider,
		// ));

		$model=new Paciente('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['Paciente'])){
			
					$model->attributes=$_GET['Paciente'];
				}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Paciente('search');
		$model->unsetAttributes();  // clear any default values

		if(isset($_GET['Paciente'])){
			
					$model->attributes=$_GET['Paciente'];
				}

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Paciente the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Paciente::model()->findByPk($id);
		// var_dump($PREVISION);
		// echo "<br>".$PREVISION;

		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Paciente $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='paciente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
