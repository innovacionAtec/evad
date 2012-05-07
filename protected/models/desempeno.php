<?php

/**
 * This is the model class for table "desempeno".
 *
 * The followings are the available columns in table 'desempeno':
 * @property string $id
 * @property string $nombre
 * @property string $descripcion
 * @property string $fecha_creacion
 * @property string $fecha_edicion
 * @property string $usuario_creador
 * @property string $usuario_editor
 * @property boolean $status
 * @property string $id_competencia
 */
class desempeno extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return desempeno the static model class
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
		return 'desempeno';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombre', 'length', 'max'=>250),
			array('descripcion, fecha_creacion, fecha_edicion, usuario_creador, usuario_editor, status, id_competencia', 'safe'),
                        array('nombre, descripcion, id_competencia', 'required'),
                        array('id_competencia','compare','compareValue'=>'falso','operator'=>'!=','message'=>'Seleccione un {attribute}.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, nombre, descripcion, fecha_creacion, fecha_edicion, usuario_creador, usuario_editor, status, id_competencia', 'safe', 'on'=>'search'),
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
			'nombre' => 'Nombre',
			'descripcion' => 'Descripcion',
			'fecha_creacion' => 'Fecha Creacion',
			'fecha_edicion' => 'Fecha Edicion',
			'usuario_creador' => 'Usuario Creador',
			'usuario_editor' => 'Usuario Editor',
			'status' => 'Status',
			'id_competencia' => 'Competencia',
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

		$criteria->compare('nombre',$this->nombre,true);

		$criteria->compare('descripcion',$this->descripcion,true);

		$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		$criteria->compare('fecha_edicion',$this->fecha_edicion,true);

		$criteria->compare('usuario_creador',$this->usuario_creador,true);

		$criteria->compare('usuario_editor',$this->usuario_editor,true);

		$criteria->compare('status',$this->status);

		$criteria->compare('id_competencia',$this->id_competencia,true);

		return new CActiveDataProvider('desempeno', array(
			'criteria'=>$criteria,
		));
	}
}