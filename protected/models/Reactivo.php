<?php

/**
 * This is the model class for table "reactivo".
 *
 * The followings are the available columns in table 'reactivo':
 * @property string $id
 * @property string $planteamiento
 * @property string $id_estatus_reactivo
 * @property string $id_clasificacion_tematica
 * @property string $id_tipo_reactivo
 * @property string $id_padre
 * @property string $id_nivel_taxonomico
 * @property string $id_nivel_dificultad
 * @property string $id_evaluacion
 * @property string $base_pregunta
 * @property string $observaciones
 * @property string $archivo
 * @property string $fecha_creacion
 * @property string $fecha_edicion
 * @property string $usuario_creador
 * @property string $usuario_editor
 * @property string $contador_edicion
 * @property boolean $status
 */
class Reactivo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Reactivo the static model class
	 */
         public $error_respuestas_vacias;
         public $error_correcta_vacia;
         public $error_sin_correcta;
    
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'reactivo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
            if((!isset($_GET['tipo'])) || (isset($_GET['id_padre']))){
		return array(
			array('archivo', 'length', 'max'=>250),
                    
                        //array('archivo', 'file', 'message'=>'Debe ser archivo'),
                    
			array('planteamiento, id_area, id_tipo_reactivo, id_estado, id_competencia, id_desempeno, id_aprendizaje', 'required'),
			
                        array('id_estado, id_area, id_tipo_reactivo, id_padre, id_nivel_cognitivo, id_evaluacion, observaciones, fecha_creacion, fecha_edicion, usuario_creador, usuario_editor, contador_edicion, status', 'safe'),
                    
                        array('error_respuestas_vacias','compare','compareValue'=> 'error','operator'=>'!=','message'=>'No puede haber respuestas vacias.'),
                        
                        //array('error_correcta_vacia','compare','compareValue'=> 'error','operator'=>'!=','message'=>'La respuesta correcta no debe estar vacia.'),
                        
                        array('error_sin_correcta','compare','compareValue'=> 'error','operator'=>'!=','message'=>'Debes seleccionar una respuesta correcta.'),
                    
                        array('id_area, id_tipo_reactivo, id_nivel_cognitivo, id_estado,  id_competencia, id_desempeno, id_aprendizaje','compare','compareValue'=>'falso','operator'=>'!=','message'=>'Seleccione un {attribute}.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, planteamiento, id_estatus_reactivo, id_area, id_tipo_reactivo, id_padre, id_nivel_taxonomico, id_nivel_dificultad, id_evaluacion, base_pregunta, observaciones, archivo, fecha_creacion, fecha_edicion, usuario_creador, usuario_editor, contador_edicion, status', 'safe', 'on'=>'search'),
		);
            }
            else{
                return array(
			array('archivo', 'length', 'max'=>250),
                    
                        //array('archivo', 'file', 'message'=>'Debe ser archivo'),
                    
			array('planteamiento, id_area, id_estado, id_competencia, id_desempeno', 'required'),
			
                        array('id_estado, id_area, id_tipo_reactivo, id_padre, id_nivel_cognitivo, id_evaluacion, observaciones, fecha_creacion, fecha_edicion, usuario_creador, usuario_editor, contador_edicion, status', 'safe'),
                    
                        array('id_area, id_estado, id_competencia, id_desempeno','compare','compareValue'=>'falso','operator'=>'!=','message'=>'Seleccione un {attribute}.'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, planteamiento, id_estatus_reactivo, id_area, id_tipo_reactivo, id_padre, id_nivel_taxonomico, id_nivel_dificultad, id_evaluacion, base_pregunta, observaciones, archivo, fecha_creacion, fecha_edicion, usuario_creador, usuario_editor, contador_edicion, status', 'safe', 'on'=>'search'),
		);
            }
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
			'planteamiento' => 'Planteamiento',
			'id_estado' => 'Estado',
			'id_area' => 'Área',
			'id_tipo_reactivo' => 'Tipo de reactivo',
			'id_padre' => 'Id padre',
			'id_nivel_cognitivo' => 'Nivel cognitivo',
			'id_competencia' => 'Competencia',
			'id_desempeno' => 'Desempeño',
			'id_aprendizaje' => 'Aprendizaje',
			'id_evaluacion' => 'Evaluación',
			'observaciones' => 'Observaciones',
			'archivo' => 'Archivo',
			'fecha_creacion' => 'Fecha de creación',
			'fecha_edicion' => 'Fecha de edición',
			'usuario_creador' => 'Usuario creador',
			'usuario_editor' => 'Usuario editor',
			'contador_edicion' => 'Contador de edición',
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

		$criteria->compare('planteamiento',$this->planteamiento,true);

		$criteria->compare('id_estatus_reactivo',$this->id_estatus_reactivo,true);

		$criteria->compare('id_clasificacion_tematica',$this->id_clasificacion_tematica,true);

		$criteria->compare('id_tipo_reactivo',$this->id_tipo_reactivo,true);

		$criteria->compare('id_padre',$this->id_padre,true);

		$criteria->compare('id_nivel_taxonomico',$this->id_nivel_taxonomico,true);

		$criteria->compare('id_nivel_dificultad',$this->id_nivel_dificultad,true);

		$criteria->compare('id_evaluacion',$this->id_evaluacion,true);

		//$criteria->compare('base_pregunta',$this->base_pregunta,true);

		//$criteria->compare('observaciones',$this->observaciones,true);

		//$criteria->compare('archivo',$this->archivo,true);

		//$criteria->compare('fecha_creacion',$this->fecha_creacion,true);

		$criteria->compare('fecha_edicion',$this->fecha_edicion,true);

		//$criteria->compare('usuario_creador',$this->usuario_creador,true);

		$criteria->compare('usuario_editor',$this->usuario_editor,true);

		$criteria->compare('contador_edicion',$this->contador_edicion,true);

		//$criteria->compare('status',$this->status);

		return new CActiveDataProvider('Reactivo', array(
			'criteria'=>$criteria,
		));

	}
}
