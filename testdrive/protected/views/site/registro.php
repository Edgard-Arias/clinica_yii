<div><?php echo $msg ?></div>

<div class='form'>

<?php
$form = $this->beginWidget('CActiveForm', array
		(
		'method' => 'POST',
		'action' => Yii::app()->createUrl('site/registro'),
		'id'=>'form',
		'enableAjaxValidation'=>true,
		'enableClientValidation'=> true,
		'clientOptions' => array(
			'validateOnSubmit'=> true,
			'validateOnChange'=> true,
			'validateOnType'=> true,
		),
		));
?>


<div class='column'>

<?php

echo $form->labelEx($model,'nombre');
echo $form->textField($model,'nombre');
echo $form->error($model,'nombre');
?>
</div>
<div class='row'>
<?php
echo $form->labelEx($model,'email');
echo $form->textField($model,'email');
echo $form->error($model,'email');
?>
</div>
<div class='column'>
<?php
echo $form->labelEx($model,'password');
echo $form->passwordField($model,'password');
echo $form->error($model,'password');
?>
</div>
<div class='row'>
<?php
echo $form->labelEx($model,'repetir_password');
echo $form->passwordField($model,'repetir_password');
echo $form->error($model,'repetir_password');
?>
</div>
<div class='row'>
<?php
echo $form->labelEx($model,'sexo');
echo $form->radioButtonList($model,'sexo', array('1'=>'Hombre', '2'=>'Mujer'),
											array('labelOptions'=>array('style'=>'display:inline'),
													'separator'=> ' ',
													'template'=>'{label}:{input}',
													)
											);
echo $form->error($model,'sexo');
?>
</div>
<div class='row'>
<?php
echo $form->labelEx($model,'terminos', array('style' =>'display:inline'));
echo $form->checkBox($model,'terminos');
echo $form->error($model,'terminos');
?>
</div>

<?php if(CCaptcha::checkRequirements()):	?>
<div class='row'>
<?php echo $form->labelEx($model,'captcha'); ?>
	<div>
		<?php $this->widget("CCaptcha", array(
										'buttonType' => 'button',
										'buttonOptions' => array(
											'type'=> 'image',
											'src' => 'images/update.png'
										)
										));
		?>
		<?php echo $form->textField($model,'captcha'); ?>
	</div>
	<div class='hint'>
		Por favor, introduzca el texto de la imagen.
	</div>
	<?php echo $form->error($model,'captcha'); ?>
</div>
<?php endif;	?>

<div class='row'>

<?php
	Echo CHtml::submitButton('Registrar');
?>
</div>

<?php $this->endWidget(); ?>
</div>