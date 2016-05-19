<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('campo1')); ?>:</b>
	<?php echo CHtml::encode($data->campo1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('campo2')); ?>:</b>
	<?php echo CHtml::encode($data->campo2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('campo3')); ?>:</b>
	<?php echo CHtml::encode($data->campo3); ?>
	<br />


</div>