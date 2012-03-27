<?php

/**
 * This is the model class for table "alumnos".
 *
 * The followings are the available columns in table 'alumnos':
 * @property string $id_alumno
 * @property string $matricula
 * @property string $id_plantel
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $nombres
 * @property string $tipo_de_alumno
 * @property string $situacion
 */
class Alumnos extends AltActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Alumnos the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuario_estudiante';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('apellido_paterno, apellido_materno, nombres', 'length', 'max'=>25),
			array('tipo_de_alumno', 'length', 'max'=>15),
			array('situacion', 'length', 'max'=>20),
			array('matricula, id_plantel', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_alumno, matricula, id_plantel, apellido_paterno, apellido_materno, nombres, tipo_de_alumno, situacion', 'safe', 'on'=>'search'),
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
			'id_alumno' => 'Id Alumno',
			'matricula' => 'Matricula',
			'id_plantel' => 'Id Plantel',
			'apellido_paterno' => 'Apellido Paterno',
			'apellido_materno' => 'Apellido Materno',
			'nombres' => 'Nombres',
			'tipo_de_alumno' => 'Tipo De Alumno',
			'situacion' => 'Situacion',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_alumno',$this->id_alumno,true);

		$criteria->compare('matricula',$this->matricula,true);

		$criteria->compare('id_plantel',$this->id_plantel,true);

		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);

		$criteria->compare('apellido_materno',$this->apellido_materno,true);

		$criteria->compare('nombres',$this->nombres,true);

		$criteria->compare('tipo_de_alumno',$this->tipo_de_alumno,true);

		$criteria->compare('situacion',$this->situacion,true);

		return new CActiveDataProvider('Alumnos', array(
			'criteria'=>$criteria,
		));
	}
}
