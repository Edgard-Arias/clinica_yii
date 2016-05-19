<?php
/* @var $this PacienteController */
/* @var $model Paciente */

$this->breadcrumbs=array(
	'Pacientes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	// array('label'=>'Listar Pacientes', 'url'=>array('index')),
	array('label'=>'Ingresar Pacientes', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#paciente-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Pacientes</h1>

<!-- <p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p> -->

<?php echo CHtml::link('Busqueda avanzada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none; border-radius:1px;">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php 

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'paciente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		// 'ID_PACIENTE',
		'RUT',
		'NOMBRES',
		'APELLIDO_PATERNO',
		'APELLIDO_MATERNO',
		// 'FECHA_NACIMIENTO',
		array(      
                     'name'=>'FECHA_NACIMIENTO',
                    'value'=>'date("d-m-Y",strtotime( $data->FECHA_NACIMIENTO ))', 
               ),
		/*
		'SEXO',
		'ESTADO_CIVIL',
		'DIRECCION',
		'COMUNA',
		'CIUDAD',
		'TELEFONO1',
		'TELEFONO2',
		'PROFESION',
		'PREVISION',
		'SUB_PREVISION',
		'TEXTO1',
		'TEXTO2',
		'TEXTO3',
		'TEXTO4',
		'TEXTO5',
		*/
		array(
			'class'=>'CButtonColumn',
    		'template'=>'{view}{update}{delete}',
		),

	),
)); ?>
