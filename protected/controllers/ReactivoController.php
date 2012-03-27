<?php

class ReactivoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column1';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 */
	public function actionView()
	{
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Reactivo;
		$respuesta=new Respuesta;

                
                
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                $resultado = ClasificacionTematica::model()->findAll();

                $clasificacion_tematica = array();

                $clasificacion_tematica['falso'] = 'Selecciona estatus';
                foreach ($resultado as $key => $value) {
                    $clasificacion_tematica[$value->id] = $value->nombre;
                }

                $resultado = TipoReactivo::model()->findAll();

                $tipo_reactivo = array();

                $tipo_reactivo['falso'] = 'Selecciona estatus';
                foreach ($resultado as $key => $value) {
                    $tipo_reactivo[$value->id] = $value->nombre;
                }

                $resultado = NivelTaxonomico::model()->findAll();

                $nivel_taxonomico = array();

                $nivel_taxonomico['falso'] = 'Selecciona nivel';
                foreach ($resultado as $key => $value) {
                    $nivel_taxonomico[$value->id] = $value->nombre;
                }

                $resultado = NivelDificultad::model()->findAll();

                $nivel_dificultad = array();

                $nivel_dificultad['falso'] = 'Selecciona nivel';
                foreach ($resultado as $key => $value) {
                    $nivel_dificultad[$value->id] = $value->nombre;
                }

                $resultado = Evaluacion::model()->findAll();

                $evaluacion = array();

                $evaluacion['falso'] = 'Selecciona evaluación';
                foreach ($resultado as $key => $value) {
                    $evaluacion[$value->id] = $value->nombre;
                }
                
                $resultado = EstatusReactivo::model()->findAll();

                $estatus_reactivo = array();

                $estatus_reactivo['falso'] = 'Selecciona estatus';
                foreach ($resultado as $key => $value) {
                    $estatus_reactivo[$value->id] = $value->nombre;
                }
                
		if(isset($_POST['Reactivo']))
		{
			$model->attributes=$_POST['Reactivo'];
			$respuesta->attributes=$_POST['Respuesta'];
                        
                        /*var_dump($_POST['correcta']);
                        die;*/
                        
                        $model->id_padre= 0;
                        $model->usuario_creador= Yii::app()->user->id_usuario;
                        $model->usuario_editor= Yii::app()->user->id_usuario;
                        $model->fecha_creacion= time();
                        $model->fecha_edicion= time();
                        $model->contador_edicion= 1;
                        $model->id_tipo_reactivo= 3;
                        $model->status= true;
                        if(!file_exists(Yii::app()->basePath.'/../files/')){
                            mkdir(Yii::app()->basePath.'/../files/',0777,true);
                        }
                        $model->archivo = CUploadedFile::getInstance($model,'archivo');
                        
                        if($model->validate())
                        {
                            if(!empty($model->archivo)){
                                $posicion= strrpos($model->archivo->name,'.');
                                $nombre_arc= substr($model->archivo->name, 0, $posicion).'_'.time().substr($model->archivo->name, $posicion);
                                $model->archivo->saveAs(Yii::app()->basePath.'/../files/'.$nombre_arc);
                                $model->archivo=$nombre_arc;
                            }
                            if($model->save(false)){
                                    $respuestas= $respuesta->argumento;
                                    $i=1;
                                    foreach($respuestas as $respuesta1){
                                        $respuesta_guardar=new Respuesta;
                                        if($i==$_POST['correcta']){
                                            $respuesta_guardar->correcta=true;
                                        }
                                        else{
                                            $respuesta_guardar->correcta=false;
                                        }
                                        $respuesta_guardar->id_reactivo= $model->id;
                                        $respuesta_guardar->usuario_creador= Yii::app()->user->id_usuario;
                                        $respuesta_guardar->usuario_editor= Yii::app()->user->id_usuario;
                                        $respuesta_guardar->fecha_creacion= time();
                                        $respuesta_guardar->fecha_edicion= time();
                                        $respuesta_guardar->argumento=$respuesta1;
                                        if(!empty($respuesta_guardar->argumento)){
                                            $respuesta_guardar->save();
                                        }
                                        $i++;
                                    }
                                    
                                
                                $this->redirect(array('reactivo/view','id'=>$model->id));
                            }
                        }
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
			'respuesta'=>$respuesta,
			'clasificacion_tematica'=>$clasificacion_tematica,
			'tipo_reactivo'=>$tipo_reactivo,
			'nivel_taxonomico'=>$nivel_taxonomico,
			'nivel_dificultad'=>$nivel_dificultad,
			'evaluacion'=>$evaluacion,
			'estatus_reactivo'=>$estatus_reactivo,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionUpdate()
	{
		$model=$this->loadModel();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Reactivo']))
		{
			$model->attributes=$_POST['Reactivo'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 */
	public function actionDelete()
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel()->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(array('index'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Reactivo');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Reactivo('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Reactivo']))
			$model->attributes=$_GET['Reactivo'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
				$this->_model=Reactivo::model()->findbyPk($_GET['id']);
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='reactivo-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
