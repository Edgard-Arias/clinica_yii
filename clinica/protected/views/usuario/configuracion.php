<div class="text-info"><?php echo $msg ?></div>
<?php

$this->pageTitle=Yii::app()->name . 'Configuración';
$this->breadcrumbs=array(
	'Usuario'=>array('/usuario'),
	'Configuracion',
);
?>

<h2>Cambiar contraseña</h2>

<!-- style='border: 1px solid;' -->
<div class="form" >
	
	<?php
	$form=$this->beginWidget('CActiveForm',array(
		'method' => 'post',
		'action' => Yii::app()->createUrl('usuario/configuracion'),
		'id' => 'form',
		'enableClientValidation'=> true,
		'clientOptions' => array(
			'validateOnSubmit'=> true,
			'validateOnChange'=> true,
			'validateOnType'=> true,
		),

		));
	?>

<div class="column">
	<?php echo $form->labelEx($model,'password'); ?>
	<?php echo $form->passwordField($model,'password'); ?>
	<?php echo $form->error($model,'password', array("class" => "text-error")); ?>
</div>
<div class="column">
	<?php echo $form->labelEx($model,'repetir_password'); ?>
	<?php echo $form->passwordField($model,'repetir_password'); ?>
	<?php echo $form->error($model,'repetir_password', array("class" => "text-error")); ?>
</div>
<div class="column">
	<?php echo $form->labelEx($model,'repetir_nuevo_password'); ?>
	<?php echo $form->passwordField($model,'repetir_nuevo_password'); ?>
	<?php echo $form->error($model,'repetir_nuevo_password', array("class" => "text-error")); ?>
</div>

<div class="column buttons">
	<?php echo CHtml::submitButton('Guardar',array('class'=>'btn btn-default')); ?>
</div>

<?php $this->endWidget(); ?>

</div>