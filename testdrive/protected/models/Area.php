<?php
class Area extends CActiveRecord{

	
	public function rules()
	{
		return array
		(
		array('pk_area, nombre, orden', 'safe', 'on'=>'search'),
				);
	}

	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('pk_area',$this->pk_area);

		$criteria->compare('nombre',$this->nombre,true);

		$criteria->compare('orden',$this->orden,true);

		return new CActiveDataProvider('Area', array(
			'criteria'=>$criteria,
		));
	}
}

?>