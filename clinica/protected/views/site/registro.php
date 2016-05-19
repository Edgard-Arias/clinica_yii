<div class="text-info"><?php echo $msg ?></div>
<?php

$this->pageTitle=Yii::app()->name . ' - Registro';
$this->breadcrumbs=array('Registro');
?>


<h2>Formulario de Registro</h2>

<div class="form">
	
	<?php
	$form=$this->beginWidget('CActiveForm',array(
		'method' => 'post',
		'action' => Yii::app()->createUrl('site/registro'),
		'id' => 'form',
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
echo $form->error($model,'nombre', array("class" => "text-error"));
?>
</div>
<div class='column'>
<?php
echo $form->labelEx($model,'email');
echo $form->textField($model,'email');
echo $form->error($model,'email', array("class" => "text-error"));
?>
</div>
<div class='column'>
<?php
echo $form->labelEx($model,'password');
echo $form->passwordField($model,'password');
echo $form->error($model,'password', array("class" => "text-error"));
?>
</div>
<div class='column'>
<?php
echo $form->labelEx($model,'repetir_password');
echo $form->passwordField($model,'repetir_password');
echo $form->error($model,'repetir_password', array("class" => "text-error"));
?>
</div>

<div class='column'>

<?php
	echo CHtml::submitButton('Registrar', array("class" => "btn btn-default"));
?>
</div>

<?php $this->endWidget(); ?>

</div>