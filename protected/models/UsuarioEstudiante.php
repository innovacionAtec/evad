<?php

/**
 * This is the model class for table "usuario_estudiante".
 *
 * The followings are the available columns in table 'usuario_estudiante':
 * @property string $matricula
 * @property string $apellidos
 * @property string $nombre
 * @property boolean $inscrito
 * @property string $situacion
 * @property string $plantel
 * @property string $description
 * @property string $email
 */
class UsuarioEstudiante extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return UsuarioEstudiante the static model class
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
			array('matricula', 'length', 'max'=>20),
			array('apellidos, nombre', 'length', 'max'=>50),
			array('situacion', 'length', 'max'=>32),
			array('plantel, description', 'length', 'max'=>40),
			array('email', 'length', 'max'=>128),
			array('inscrito', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('matricula, apellidos, nombre, inscrito, situacion, plantel, description, email', 'safe', 'on'=>'search'),
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
			'matricula' => 'Matricula',
			'apellidos' => 'Apellidos',
			'nombre' => 'Nombre',
			'inscrito' => 'Inscrito',
			'situacion' => 'Situacion',
			'plantel' => 'Plantel',
			'description' => 'Description',
			'email' => 'Email',
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

		$criteria->compare('matricula',$this->matricula,true);

		$criteria->compare('apellidos',$this->apellidos,true);

		$criteria->compare('nombre',$this->nombre,true);

		$criteria->compare('inscrito',$this->inscrito);

		$criteria->compare('situacion',$this->situacion,true);

		$criteria->compare('plantel',$this->plantel,true);

		$criteria->compare('description',$this->description,true);

		$criteria->compare('email',$this->email,true);

		return new CActiveDataProvider('UsuarioEstudiante', array(
			'criteria'=>$criteria,
		));
	}
}