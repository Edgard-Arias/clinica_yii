<?php

/**
 * This is the model class for table "Prueba".
 *
 * The followings are the available columns in table 'Prueba':
 * @property integer $id
 * @property string $campo1
 * @property string $campo2
 * @property string $campo3
 */
class Prueba extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Prueba';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('campo1, campo2', 'required'),
			array('campo1, campo2, campo3', 'length', 'max'=>100),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, campo1, campo2, campo3', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'Id',
			'campo1' => 'Campo1',
			'campo2' => 'Campo2',
			'campo3' => 'Campo3',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('campo1',$this->campo1,true);

		$criteria->compare('campo2',$this->campo2,true);

		$criteria->compare('campo3',$this->campo3,true);

		return new CActiveDataProvider('Prueba', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return Prueba the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}