<?php

/**
 * This is the model class for table "usuario".
 *
 * The followings are the available columns in table 'usuario':
 * @property string $id
 * @property string $email
 * @property string $password
 * @property string $id_rol
 * @property string $apellido_paterno
 * @property string $apellido_materno
 * @property string $nombres
 * @property string $fecha_creacion
 * @property string $fecha_edicion
 * @property string $ultimo_login
 * @property string $ultimo_logout
 * @property boolean $status
 */
class Usuario extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Usuario the static model class
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
		return 'usuario';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, id_rol', 'required'),
			array('email', 'length', 'max'=>100),
			array('password', 'length', 'max'=>32),
			array('apellido_paterno, apellido_materno, nombres', 'length', 'max'=>25),
			array('fecha_creacion, fecha_edicion, ultimo_login, ultimo_logout, status', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, email, password, id_rol, apellido_paterno, apellido_materno, nombres, fecha_creacion, fecha_edicion, ultimo_login, ultimo_logout, status', 'safe', 'on'=>'search'),
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
			'email' => 'Email',
			'password' => 'Password',
			'id_rol' => 'Id Rol',
			'apellido_paterno' => 'Apellido Paterno',
			'apellido_materno' => 'Apellido Materno',
			'nombres' => 'Nombres',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_edicion' => 'Fecha Edicion',
			'ultimo_login' => 'Ultimo Login',
			'ultimo_logout' => 'Ultimo Logout',
			'status' => 'Status',
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

		$criteria->compare('id',$this->id,true);

		$criteria->compare('email',$this->email,true);

		$criteria->compare('password',$this->password,true);

		$criteria->compare('id_rol',$this->id_rol,true);

		$criteria->compare('apellido_paterno',$this->apellido_paterno,true);

		$criteria->compare('apellido_materno',$this->apellido_materno,true);

		$criteria->compare('nombres',$this->nombres,true);

		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		$criteria->compare('fecha_edicion',$this->fecha_edicion,true);

		$criteria->compare('ultimo_login',$this->ultimo_login,true);

		$criteria->compare('ultimo_logout',$this->ultimo_logout,true);

		$criteria->compare('status',$this->status);

		return new CActiveDataProvider('Usuario', array(
			'criteria'=>$criteria,
		));
	}
}