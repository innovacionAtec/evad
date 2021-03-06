<?php

/**
 * This is the model class for table "respuesta".
 *
 * The followings are the available columns in table 'respuesta':
 * @property string $id
 * @property string $id_reactivo
 * @property string $archivo
 * @property string $argumento
 * @property string $fecha_creacion
 * @property string $fecha_edicion
 * @property string $usuario_creador
 * @property string $usuario_editor
 * @property boolean $correcta
 */
class Respuesta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Respuesta the static model class
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
		return 'respuesta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id_reactivo', 'required'),
			array('archivo', 'length', 'max'=>250),
			array('argumento, fecha_creacion, fecha_edicion, usuario_creador, usuario_editor, correcta', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, id_reactivo, archivo, argumento, fecha_creacion, fecha_edicion, usuario_creador, usuario_editor, correcta', 'safe', 'on'=>'search'),
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
			'id_reactivo' => 'Id Reactivo',
			'archivo' => 'Archivo',
			'argumento' => 'Argumento',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_edicion' => 'Fecha Edicion',
			'usuario_creador' => 'Usuario Creador',
			'usuario_editor' => 'Usuario Editor',
			'correcta' => 'Correcta',
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

		$criteria->compare('id_reactivo',$this->id_reactivo,true);

		$criteria->compare('archivo',$this->archivo,true);

		$criteria->compare('argumento',$this->argumento,true);

		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		$criteria->compare('fecha_edicion',$this->fecha_edicion,true);

		$criteria->compare('usuario_creador',$this->usuario_creador,true);

		$criteria->compare('usuario_editor',$this->usuario_editor,true);

		$criteria->compare('correcta',$this->correcta);

		return new CActiveDataProvider('Respuesta', array(
			'criteria'=>$criteria,
		));
	}
}