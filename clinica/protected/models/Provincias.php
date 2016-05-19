<?php
class Provincias extends CActiveRecord
{
	public static function model($ClassName=__Class__)
	{
		return parent::model($ClassName);
	}
	public function tablename()
	{
		return "provincias";
	}
	// public function rules()
	// {
	// 	return array(
	// 		array("region_id, region_nombre","required"),
	// 		);
	// }

}


?>