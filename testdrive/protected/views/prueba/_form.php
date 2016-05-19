<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'prueba-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'campo1'); ?>
		<?php echo $form->textField($model,'campo1',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'campo1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'campo2'); ?>
		<?php echo $form->textField($model,'campo2',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'campo2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'campo3'); ?>
		<?php echo $form->textField($model,'campo3',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'campo3'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->