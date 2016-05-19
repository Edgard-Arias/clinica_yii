<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
'id'=>'prueba-form',
'enableAjaxValidation'=>false,
)); ?>


<p class="note">Tu formulario</p>

<div class='row'>
<LABEL for="Campo1">Campo1: </LABEL>
          <INPUT type="text" id="Campo1"><BR>
<LABEL for="Campo2">Campo2: </LABEL>
          <INPUT type="text" id="Campo2"><BR>
<LABEL for="Campo3">Campo3: </LABEL>
          <INPUT type="text" id="Campo3"><BR>
</div>
<div class="row buttons">
<?php echo CHtml::submitButton('Guardar'); ?>
</div>

<?php $this->endWidget(); ?>

</div><!-- form -->