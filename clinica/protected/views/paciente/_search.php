<?php
/* @var $this PacienteController */
/* @var $model Paciente */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); 
		?>

	<div class="row">
		<div class="span-4">
			<?php echo $form->label($model,'RUT'); ?>
			<?php echo $form->textField($model,'RUT',array('size'=>15,'maxlength'=>15)); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'NOMBRES'); ?>
			<?php echo $form->textField($model,'NOMBRES',array('size'=>60,'maxlength'=>100)); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'APELLIDO_PATERNO'); ?>
			<?php echo $form->textField($model,'APELLIDO_PATERNO',array('size'=>60,'maxlength'=>100)); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'APELLIDO_MATERNO'); ?>
			<?php echo $form->textField($model,'APELLIDO_MATERNO',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-4">
			<?php echo $form->label($model,'FECHA_NACIMIENTO'); ?>
			<?php echo $form->textField($model,'FECHA_NACIMIENTO'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'SEXO'); ?>
			<?php echo $form->textField($model,'SEXO',array('size'=>1,'maxlength'=>1)); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'ESTADO_CIVIL'); ?>
			<?php echo $form->textField($model,'ESTADO_CIVIL'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'DIRECCION'); ?>
			<?php echo $form->textField($model,'DIRECCION',array('size'=>60,'maxlength'=>100)); ?>
		</div>
	</div>


	<div class="row">
		<div class="span-4">
			<?php echo $form->label($model,'REGION'); ?>
			<?php echo $form->textField($model,'REGION'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'PROVINCIA'); ?>
			<?php echo $form->textField($model,'PROVINCIA'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'COMUNA'); ?>
			<?php echo $form->textField($model,'COMUNA'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'TELEFONO1'); ?>
			<?php echo $form->textField($model,'TELEFONO1',array('size'=>15,'maxlength'=>15)); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-4">
			<?php echo $form->label($model,'TELEFONO2'); ?>
			<?php echo $form->textField($model,'TELEFONO2',array('size'=>15,'maxlength'=>15)); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'PROFESION'); ?>
			<?php echo $form->textField($model,'PROFESION',array('size'=>50,'maxlength'=>50)); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'PREVISION'); ?>
			<?php echo $form->textField($model,'PREVISION'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->label($model,'SUB_PREVISION'); ?>
			<?php echo $form->textField($model,'SUB_PREVISION'); ?>
		</div>
	</div>

	<div class="column">
		<?php echo CHtml::submitButton('Search',  array("class" => "btn btn-default")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->