<?php 

echo "prueba usuario";

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'area-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        'campo1',
        'campo2',
        'campo3',
        array(
            'class'=>'CButtonColumn',
        ),
    ),
)); 

$this->widget('zii.widgets.grid.CGridView', array(
    'id'=>'area-grid',
    'dataProvider'=>$model->search(),
    'filter'=>$model,
    'columns'=>array(
        'id',
        'campo1',
        //'orden',
         array('class'=>'CButtonColumn',
                'template'=>' {ver}{editar} ',
                'buttons'=>array (
              
                    'ver'=>array(
                        'label'=>'',
                        'url'=>'Yii::app()->controller->createUrl("prueba/view",array("id"=>$data->id ))',
                        'options'=>array( 'class'=>'icon-search', 'title'=>'Ver prueba')
                    ),
                   'editar'=>array(
                        'label'=>'',
                        'url'=>'Yii::app()->controller->createUrl("prueba/update",array("id"=>$data->id))',
                        'options'=>array( 'class'=>'icon-pencil', 'title'=>'Actualizar')
                    ),
                ),
            ),
    ),
)); 

?>
<table border="1px">
<tr>
  <td><strong>Curso</strong></td>
  <td><strong>Horas</strong></td>
  <td><strong>Horario</strong></td>
</tr>
 
<tr>
  <td>CSS</td>
  <td>20</td>
  <td>16:00 - 20:00</td>
</tr>
 
<tr>
  <td>HTML</td>
  <td>20</td>
  <td>16:00 - 20:00</td>
</tr>
 
<tr>
  <td>Dreamweaver</td>
  <td>60</td>
  <td>16:00 - 20:00</td>
</tr>
</table>
