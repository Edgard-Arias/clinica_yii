<?php 

echo "prueba usuario";

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'area-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'pk_area',
        'nombre',
        'orden',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); ?>
