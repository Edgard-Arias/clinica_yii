<?php

/**
 * This is the model class for table "paciente".
 *
 * The followings are the available columns in table 'paciente':
 * @property integer $ID_PACIENTE
 * @property string $RUT
 * @property string $NOMBRES
 * @property string $APELLIDO_PATERNO
 * @property string $APELLIDO_MATERNO
 * @property string $FECHA_NACIMIENTO
 * @property string $SEXO
 * @property integer $ESTADO_CIVIL
 * @property string $DIRECCION
 * @property integer $COMUNA
 * @property integer $CIUDAD
 * @property string $TELEFONO1
 * @property string $TELEFONO2
 * @property string $PROFESION
 * @property integer $PREVISION
 * @property integer $SUB_PREVISION
 * @property string $TEXTO1
 * @property string $TEXTO2
 * @property string $TEXTO3
 * @property string $TEXTO4
 * @property string $TEXTO5
 *
 * The followings are the available model relations:
 * @property Ficha[] $fichas
 */
class Paciente extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'paciente';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('RUT,REGION,PROVINCIA,COMUNA', 'required'),
			array('RUT', 'validateRut'),
			array('ESTADO_CIVIL, COMUNA, REGION, PROVINCIA, PREVISION, SUB_PREVISION', 'numerical', 'integerOnly'=>true),
			array('RUT, TELEFONO1, TELEFONO2', 'length', 'max'=>15),
			array('NOMBRES, APELLIDO_PATERNO, APELLIDO_MATERNO, DIRECCION', 'length', 'max'=>100),
			array('SEXO', 'length', 'max'=>1),
			array('PROFESION', 'length', 'max'=>50),
			array('TEXTO1, TEXTO2, TEXTO3, TEXTO4, TEXTO5', 'length', 'max'=>1500),
			array('FECHA_NACIMIENTO', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ID_PACIENTE, RUT, NOMBRES, APELLIDO_PATERNO, APELLIDO_MATERNO, FECHA_NACIMIENTO, SEXO, ESTADO_CIVIL, DIRECCION, REGION, PROVINCIA, COMUNA, TELEFONO1, TELEFONO2, PROFESION, PREVISION, SUB_PREVISION, TEXTO1, TEXTO2, TEXTO3, TEXTO4, TEXTO5', 'safe', 'on'=>'search'),
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
			'fichas' => array(self::HAS_MANY, 'Ficha', 'ID_PACIENTE'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ID_PACIENTE' => 'Id Paciente',
			'RUT' => 'Rut',
			'NOMBRES' => 'Nombres',
			'APELLIDO_PATERNO' => 'Apellido Paterno',
			'APELLIDO_MATERNO' => 'Apellido Materno',
			'FECHA_NACIMIENTO' => 'Fecha Nacimiento',
			'SEXO' => 'Sexo',
			'ESTADO_CIVIL' => 'Estado Civil',
			'DIRECCION' => 'Direccion',
			'REGION' => 'Región',
			'PROVINCIA' => 'Provincia',
			'COMUNA' => 'Comuna',
			'TELEFONO1' => 'Telefono 1',
			'TELEFONO2' => 'Telefono 2',
			'PROFESION' => 'Profesion',
			'PREVISION' => 'Prevision',
			'SUB_PREVISION' => 'Sub Prevision',
			'TEXTO1' => 'Texto1',
			'TEXTO2' => 'Texto2',
			'TEXTO3' => 'Texto3',
			'TEXTO4' => 'Texto4',
			'TEXTO5' => 'Texto5',
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
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('ID_PACIENTE',$this->ID_PACIENTE);
		$criteria->compare('RUT',$this->RUT,true);
		$criteria->compare('NOMBRES',$this->NOMBRES,true);
		$criteria->compare('APELLIDO_PATERNO',$this->APELLIDO_PATERNO,true);
		$criteria->compare('APELLIDO_MATERNO',$this->APELLIDO_MATERNO,true);
		$criteria->compare('FECHA_NACIMIENTO',$this->FECHA_NACIMIENTO,true);
		$criteria->compare('SEXO',$this->SEXO,true);
		$criteria->compare('ESTADO_CIVIL',$this->ESTADO_CIVIL);
		$criteria->compare('DIRECCION',$this->DIRECCION,true);
		$criteria->compare('REGION',$this->REGION);
		$criteria->compare('PROVINCIA',$this->PROVINCIA);
		$criteria->compare('COMUNA',$this->COMUNA);
		$criteria->compare('TELEFONO1',$this->TELEFONO1,true);
		$criteria->compare('TELEFONO2',$this->TELEFONO2,true);
		$criteria->compare('PROFESION',$this->PROFESION,true);
		$criteria->compare('PREVISION',$this->PREVISION);
		$criteria->compare('SUB_PREVISION',$this->SUB_PREVISION);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Paciente the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
	public function getMenuRegiones()
	{
		return CHtml::listData(Regiones::model()->findAll(),"region_id","region_nombre");
	}
	public function getMenuProvincias($defaultRegion=0)
	{
		return CHtml::listData(Provincias::model()->findAll("region_id=?",array($defaultRegion)),"provincia_id","provincia_nombre");
	}
	public function getMenuComunas($defaultProvincia=0)
	{
		return CHtml::listData(Comunas::model()->findAll("provincia_id=?",array($defaultProvincia)),"comuna_id","comuna_nombre");
	}
	public function getFechaOrdenada($fecha='0000-00-00')
	{
		$var=explode("-", $fecha);
		$fecha=$var[2]."-".$var[1]."-".$var[0];
		return $fecha;
	}

	public function validateRut($attribute, $params) {
	        $data = explode('-', $this->RUT);
	        $evaluate = strrev($data[0]);
	        $multiply = 2;
	        $store = 0;
	        for ($i = 0; $i < strlen($evaluate); $i++) {
	            $store += $evaluate[$i] * $multiply;
	            $multiply++;
	            if ($multiply > 7)
	                $multiply = 2;
	        }
	        isset($data[1]) ? $verifyCode = strtolower($data[1]) : $verifyCode = '';
	        $result = 11 - ($store % 11);
	        if ($result == 10)
	            $result = 'k';
	        if ($result == 11)
	            $result = 0;
	        if ($verifyCode != $result)
	            $this->addError('rut', 'Rut inválido.');
	    }
}
