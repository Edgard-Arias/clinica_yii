<?php

 $this->widget('zii.widgets.grid.CGridView', array(
   'dataProvider'=>$dataProvider,
   'filter'=>$model,
    'columns'=>array(
        'id',
        'nombre',
        'apellidos',
         array(
             'name' => 'direccion',
             'filter' => false, // para que no se muestre el campo de filtrar para el atributo direccion
             ),
         array(
            'class' => 'CButtonColumn',
         ),
      ),
 ));
 
?>
