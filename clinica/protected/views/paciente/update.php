<?php
/* @var $this PacienteController */
/* @var $model Paciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->ID_PACIENTE=>array('view','id'=>$model->ID_PACIENTE),
	'Update',
);

$this->menu=array(
	// array('label'=>'Listar Pacientes', 'url'=>array('index')),
	array('label'=>'Ingresar Pacientes', 'url'=>array('create')),
	array('label'=>'Ver Pacientes', 'url'=>array('view', 'id'=>$model->ID_PACIENTE)),
	array('label'=>'Administrar Pacientes', 'url'=>array('admin')),
);
?>

<h1>Modificar Paciente <?php echo $model->ID_PACIENTE; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>