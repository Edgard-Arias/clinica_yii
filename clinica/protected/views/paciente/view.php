<?php
/* @var $this PacienteController */
/* @var $model Paciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	$model->ID_PACIENTE,
);

$this->menu=array(
	// array('label'=>'Listar Pacientes', 'url'=>array('index')),
	array('label'=>'Ingresar Pacientes', 'url'=>array('create')),
	array('label'=>'Modificar Paciente', 'url'=>array('update', 'id'=>$model->ID_PACIENTE)),
	array('label'=>'Eliminar Paciente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->ID_PACIENTE),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Pacientes', 'url'=>array('admin')),
);
?>

<h1>Ver Paciente #<?php echo $model->ID_PACIENTE; ?></h1>


<table class="table table-striped">
	<tr>
		<td><strong>RUT</strong></td>
		<td><?php echo $model->RUT; ?></td>
	</tr>
	<tr>
		<td><strong>NOMBRES</strong></td>
		<td><?php echo $model->NOMBRES; ?></td>
	</tr>
	<tr>
		<td><strong>APELLIDO PATERNO</strong></td>
		<td><?php echo $model->APELLIDO_PATERNO; ?></td>
	</tr>
	<tr>
		<td><strong>APELLIDO MATERNO</strong></td>
		<td><?php echo $model->APELLIDO_MATERNO; ?></td>
	</tr>
	<tr>
		<td><strong>FECHA NACIMIENTO</strong></td>
		<td><?php echo $model->FECHA_NACIMIENTO; ?></td>
	</tr>
	<tr>
		<td><strong>SEXO</strong></td>
		<td><?php echo $model->SEXO; ?></td>
	</tr>
	<tr>
		<td><strong>ESTADO CIVIL</strong></td>
		<td><?php echo $model->ESTADO_CIVIL; ?></td>
	</tr>
	<tr>
		<td><strong>DIRECCION</strong></td>
		<td><?php echo $model->DIRECCION; ?></td>
	</tr>
	<tr>
		<td><strong>REGION</strong></td>
		<td><?php echo $model->REGION; ?></td>
	</tr>
	<tr>
		<td><strong>PROVINCIA</strong></td>
		<td><?php echo $model->PROVINCIA; ?></td>
	</tr>
	<tr>
		<td><strong>COMUNA</strong></td>
		<td><?php echo $model->COMUNA; ?></td>
	</tr>
	<tr>
		<td><strong>PROFESION</strong></td>
		<td><?php echo $model->PROFESION; ?></td>
	</tr>
	<tr>
		<td><strong>PREVISION</strong></td>
		<td><?php echo $model->PREVISION; ?></td>
	</tr>
	<tr>
		<td><strong>SUBPREVISION</strong></td>
		<td><?php echo $model->SUB_PREVISION; ?></td>
	</tr>
</table>

<?php 

// $this->widget('zii.widgets.CDetailView', array(
// 	'data'=>$model,
// 	'attributes'=>array(
// 		'ID_PACIENTE',
// 		'RUT',
// 		'NOMBRES',
// 		'APELLIDO_PATERNO',
// 		'APELLIDO_MATERNO',
// 		'FECHA_NACIMIENTO',
// 		'SEXO',
// 		'ESTADO_CIVIL',
// 		'DIRECCION',
// 		'REGION',
// 		'PROVINCIA',
// 		'COMUNA',
// 		'TELEFONO1',
// 		'TELEFONO2',
// 		'PROFESION',
// 		'PREVISION',
// 		'SUB_PREVISION',
// 	),
// )); 
?>
