<?php
/* @var $this PacienteController */
/* @var $model Paciente */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'paciente-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'enableClientValidation'=> true,
	'clientOptions' => array(
		'validateOnSubmit'=> true,
		'validateOnChange'=> true,
		'validateOnType'=> true,
	),
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); 	?>

	<div class="row">
		<div class="span-4">
			<?php echo $form->labelEx($model,'RUT'); ?>
			<?php echo $form->textField($model,'RUT',array('size'=>15,'maxlength'=>15,'readonly'=>!$model->isNewRecord)); ?>
			<?php echo $form->error($model,'RUT'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->labelEx($model,'NOMBRES'); ?>
			<?php echo $form->textField($model,'NOMBRES',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'NOMBRES'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->labelEx($model,'APELLIDO_PATERNO'); ?>
			<?php echo $form->textField($model,'APELLIDO_PATERNO',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'APELLIDO_PATERNO'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->labelEx($model,'APELLIDO_MATERNO'); ?>
			<?php echo $form->textField($model,'APELLIDO_MATERNO',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'APELLIDO_MATERNO'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-4">
			<?php echo $form->labelEx($model,'FECHA_NACIMIENTO'); ?>
			<?php
			$this->widget("zii.widgets.jui.CJuiDatePicker",array(
				"attribute"=>"FECHA_NACIMIENTO",
				"model"=>$model,
				"language"=>"es",
				"options"=>array(
					"dateFormat"=>"dd-mm-yy",
					"showButtonPanel"=>true,
					"changeYear"=>true,
					"yearRange"=>"-80:-10",
					"minDate"=>"-80Y",
					"maxDate"=>"-10Y",
					)
				)); 
			?>
			<?php echo $form->error($model,'FECHA_NACIMIENTO'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->labelEx($model,'SEXO'); ?>
			<?php echo $form->dropDownList($model,'SEXO',array('M' => 'Masculino', 'F' => 'Femenino')); ?>
			<?php echo $form->error($model,'SEXO'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->labelEx($model,'ESTADO_CIVIL'); ?>
			<?php echo $form->dropDownList($model,'ESTADO_CIVIL',CHtml::listData(Catalogos::model()->findAll("nombre=?",array("ESTADO_CIVIL")),"CLAVE1","TEXTO1")); ?>
			<?php echo $form->error($model,'ESTADO_CIVIL'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->labelEx($model,'DIRECCION'); ?>
			<?php echo $form->textField($model,'DIRECCION',array('size'=>60,'maxlength'=>100)); ?>
			<?php echo $form->error($model,'DIRECCION'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-4">
		<?php $htmlOptions=array(
			"ajax"=>array(
				"url"=>$this->createUrl("ProvinciaPorRegion"),
				"type"=>"POST",
				"update"=>"#Paciente_PROVINCIA",
				),
			"empty"=>"Seleccione",
			);
			?>
			<?php echo $form->labelEx($model,'REGION'); ?>
			<?php echo $form->dropDownList($model,'REGION',$model->getMenuRegiones(),$htmlOptions); ?>
			<?php echo $form->error($model,'REGION'); ?>
		</div>


		<div class="span-4">
		<?php $htmlOptions2=array(
			"ajax"=>array(
				"url"=>$this->createUrl("ComunaPorProvincia"),
				"type"=>"POST",
				"update"=>"#Paciente_COMUNA",
				),
			);
			?>
			<?php echo $form->labelEx($model,'PROVINCIA'); ?>

			<?php //echo $form->dropDownList($model,'PROVINCIA'); ?>

			<?php 
			if(isset($model->REGION))
				echo $form->dropDownList($model,'PROVINCIA',$model->getMenuProvincias($model->REGION),$htmlOptions2); 
			else
				echo $form->dropDownList($model,'PROVINCIA',$model->getMenuProvincias(),$htmlOptions2); 
			?>
			<?php echo $form->error($model,'PROVINCIA'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->labelEx($model,'COMUNA'); ?>

			<?php 			
			if(isset($model->PROVINCIA))
				echo $form->dropDownList($model,'COMUNA',$model->getMenuComunas($model->PROVINCIA));
			else
				echo $form->dropDownList($model,'COMUNA',$model->getMenuComunas());
			 ?>
			<?php echo $form->error($model,'COMUNA'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->labelEx($model,'TELEFONO1'); ?>
			<?php echo $form->textField($model,'TELEFONO1',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'TELEFONO1'); ?>
		</div>
	</div>

	<div class="row">
		<div class="span-4">
			<?php echo $form->labelEx($model,'TELEFONO2'); ?>
			<?php echo $form->textField($model,'TELEFONO2',array('size'=>15,'maxlength'=>15)); ?>
			<?php echo $form->error($model,'TELEFONO2'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->labelEx($model,'PROFESION'); ?>
			<?php echo $form->textField($model,'PROFESION',array('size'=>50,'maxlength'=>50)); ?>
			<?php echo $form->error($model,'PROFESION'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->labelEx($model,'PREVISION'); ?>
			<?php echo $form->dropDownList($model,'PREVISION',CHtml::listData(Catalogos::model()->findAll("nombre=?",array("PREVISION")),"CLAVE1","TEXTO1")); ?>
			<?php echo $form->error($model,'PREVISION'); ?>
		</div>

		<div class="span-4">
			<?php echo $form->labelEx($model,'SUB_PREVISION'); ?>
			<?php echo $form->dropDownList($model,'SUB_PREVISION',CHtml::listData(Catalogos::model()->findAll("nombre=?",array("SUBPREVISION")),"CLAVE1","TEXTO1")); ?>
			<?php echo $form->error($model,'SUB_PREVISION'); ?>
		</div>		
	</div>
	<div class="column">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Ingresar' : 'Guardar', array("class" => "btn btn-default")); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->