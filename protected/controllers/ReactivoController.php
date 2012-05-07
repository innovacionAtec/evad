<?php

class ReactivoController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column1';

    /**
     * @var CActiveRecord the currently loaded data model instance.
     */
    private $_model;

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'indexPadre', 'deshabilitar'),
                /* 'users'=>array('*'), */
                'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'getCompetencias', 'getDesempeno', 'getAprendizaje'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'users' => array('@'),
                'expression' => 'isset(Yii::app()->user->id_rol) && Yii::app()->user->id_rol<=2',
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     */
    public function actionView() {
        $model = $this->loadModel();

        if ($model->id_tipo_reactivo == 1) {
            $resultado = Reactivo::model()->findAll('id_padre=:id_padre', array(
                ':id_padre' => $model->id
                    ));
            $num_hijos = count($resultado);
            //echo $num_hijos;
            //die;
            $this->render('viewPadre', array(
                'model' => $model,
                'num_hijos' => $num_hijos,
            ));
            //13abr12_Cirenia
        } else {
            $resultado = Respuesta::model()->findAll('id_reactivo=:id_reactivo', array(
                ':id_reactivo' => $model->id
                    ));
            $num_respuestas = count($resultado);
            if ($model->id_tipo_reactivo == 2) {//hijo
                $this->render('view', array(
                    'model' => $model,
                    'num_respuestas' => $num_respuestas,
                ));
                //13abr12_Cirenia
            } else {//independiente
                $resultado = Respuesta::model()->findAll('id_reactivo=:id_reactivo', array(
                    ':id_reactivo' => $model->id
                        ));
                $num_respuestas = count($resultado);
                //echo $num_respuestas;
                //die;
                $this->render('view', array(
                    'model' => $model,
                    'num_respuestas' => $num_respuestas,
                ));
            }
        }
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {

        if (!isset($_GET['tipo']) || isset($_GET['id_padre'])) {

            $model = new Reactivo;
            $respuesta = new Respuesta;

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            $resultado = area::model()->findAll();

            $area = array();

            $area['falso'] = 'Selecciona area';
            foreach ($resultado as $key => $value) {
                $area[$value->id] = $value->nombre;
            }

            $resultado = TipoReactivo::model()->findAll();

            $tipo_reactivo = array();

            $tipo_reactivo['falso'] = 'Selecciona tipo';
            foreach ($resultado as $key => $value) {
                $tipo_reactivo[$value->id] = $value->nombre;
            }

            $resultado = estado::model()->findAll();

            $estado = array();

            if (isset(Yii::app()->user->id_rol) && Yii::app()->user->id_rol == 1) {
                $estado['falso'] = 'Selecciona estado';
                foreach ($resultado as $key => $value) {
                    if ($value->status == true) {
                        $estado[$value->id] = $value->nombre;
                    }
                }
            } else {
                $estado['1'] = "Revisión técnica";
            }

            $competencia = array();

            $competencia['falso'] = 'Selecciona competencia';
            /*  foreach ($resultado as $key => $value) {
              $competencia[$value->id] = $value->nombre;
              } */

            $desempeno = array();

            $desempeno['falso'] = 'Selecciona desempeño';
            /* foreach ($resultado as $key => $value) {
              $desempeno[$value->id] = $value->nombre;
              } */

            $aprendizaje = array();

            $aprendizaje['falso'] = 'Selecciona aprendizaje';
            if (isset($_GET['id_padre'])) {
                $padre_desempeno = Reactivo::model()->findByPk($_GET['id_padre'])->id_desempeno;
                $resultado = aprendizaje::model()->findAll('id_desempeno=:id_desempeno', array(':id_desempeno' => $padre_desempeno));
                foreach ($resultado as $key => $value) {
                    $aprendizaje[$value->id] = $value->nombre;
                }
            }

            /* $nivel_cognitivo = array();

              $nivel_cognitivo['falso'] = 'Selecciona nivel';
              foreach ($resultado as $key => $value) {
              $nivel_cognitivo[$value->id] = $value->nombre;
              } */

            $respuesta->correcta = 0;

            if (isset($_POST['Reactivo'])) {
                $model->attributes = $_POST['Reactivo'];
                $respuesta->attributes = $_POST['Respuesta'];

                /* var_dump($model['planteamiento']);
                  die; */
                if (isset($_GET['id_padre'])) {
                    $model->id_padre = $_GET['id_padre'];
                    $model->id_tipo_reactivo = 2;
                    $model->id_estado = Reactivo::model()->findByPk($_GET['id_padre'])->id_estado;
                    $model->id_area = Reactivo::model()->findByPk($_GET['id_padre'])->id_area;
                    $model->id_competencia = Reactivo::model()->findByPk($_GET['id_padre'])->id_competencia;
                    $model->id_desempeno = Reactivo::model()->findByPk($_GET['id_padre'])->id_desempeno;
                } else {
                    $model->id_padre = 0;
                    $model->id_tipo_reactivo = 3;
                }

                $model->usuario_creador = Yii::app()->user->id_usuario;
                $model->usuario_editor = Yii::app()->user->id_usuario;
                $model->fecha_creacion = time();
                $model->fecha_edicion = time();
                $model->contador_edicion = 1;
                $model->status = true;
                if (isset($model->id_aprendizaje) && $model->id_aprendizaje != 'falso')
                    $model->id_nivel_cognitivo = aprendizaje::model()->findByPk($model->id_aprendizaje)->id_nivel_cognitivo;
                if (!file_exists(Yii::app()->basePath . '/../files/')) {
                    mkdir(Yii::app()->basePath . '/../files/', 0777, true);
                }
                $model->archivo = CUploadedFile::getInstance($model, 'archivo');

                $i = 1;
                $model->error_respuestas_vacias = 'success';
                foreach ($respuesta->argumento as $respuesta_error) {
                    if (empty($respuesta_error[$i])) {
                        $model->error_respuestas_vacias = 'error';
                    }
                    $i++;
                }

                if ($respuesta['correcta'] == 0) {
                    $model->error_sin_correcta = 'error';
                }


                if ($model->validate()) {
                    if (!empty($model->archivo)) {
                        $posicion = strrpos($model->archivo->name, '.');
                        $nombre_arc = substr($model->archivo->name, 0, $posicion) . '_' . time() . substr($model->archivo->name, $posicion);
                        $model->archivo->saveAs(Yii::app()->basePath . '/../files/' . $nombre_arc);
                        $model->archivo = $nombre_arc;
                    }
                    if ($model->save(false)) {
                        $respuestas = $respuesta->argumento;
                        $i = 1;
                        foreach ($respuestas as $respuesta1) {
                            $respuesta_guardar = new Respuesta;
                            if ($i == $respuesta['correcta']) {
                                $respuesta_guardar->correcta = true;
                            } else {
                                $respuesta_guardar->correcta = false;
                            }
                            $respuesta_guardar->id_reactivo = $model->id;
                            $respuesta_guardar->usuario_creador = Yii::app()->user->id_usuario;
                            $respuesta_guardar->usuario_editor = Yii::app()->user->id_usuario;
                            $respuesta_guardar->fecha_creacion = time();
                            $respuesta_guardar->fecha_edicion = time();
                            $respuesta_guardar->argumento = $respuesta1;
                            if (!empty($respuesta_guardar->argumento)) {
                                $respuesta_guardar->save();
                            }
                            $i++;
                        }


                        $this->redirect(array('reactivo/view', 'id' => $model->id));
                    }
                }
                /* if ($model->save())
                  $this->redirect(array('view', 'id' => $model->id)); */

                if (!empty($model->id_area) && $model->id_area != 'falso') {
                    $resultado = competencia::model()->findAll('id_area=:id_area', array(':id_area' => $model->id_area));
                    foreach ($resultado as $key => $value) {
                        $competencia[$value->id] = $value->nombre;
                    }
                }
                if (!empty($model->id_competencia) && $model->id_competencia != 'falso') {
                    $resultado = desempeno::model()->findAll('id_competencia=:id_competencia', array(':id_competencia' => $model->id_competencia));
                    foreach ($resultado as $key => $value) {
                        $desempeno[$value->id] = $value->nombre;
                    }
                }
                if (!empty($model->id_desempeno) && $model->id_desempeno != 'falso') {
                    $resultado = aprendizaje::model()->findAll('id_desempeno=:id_desempeno', array(':id_desempeno' => $model->id_desempeno));
                    foreach ($resultado as $key => $value) {
                        $aprendizaje[$value->id] = $value->nombre;
                    }
                }
            }

            $this->render('create', array(
                'model' => $model,
                'respuesta' => $respuesta,
                'area' => $area,
                'tipo_reactivo' => $tipo_reactivo,
                //'nivel_cognitivo' => $nivel_cognitivo,
                //'evaluacion' => $evaluacion,
                'estado' => $estado,
                'competencia' => $competencia,
                'desempeno' => $desempeno,
                'aprendizaje' => $aprendizaje,
            ));
        } else {
            $model = new Reactivo;

            $resultado = area::model()->findAll();

            $area = array();

            $area['falso'] = 'Selecciona clasificación';
            foreach ($resultado as $key => $value) {
                $area[$value->id] = $value->nombre;
            }

            $resultado = estado::model()->findAll();

            $estado = array();

            if (isset(Yii::app()->user->id_rol) && Yii::app()->user->id_rol == 1) {
                $estado['falso'] = 'Selecciona estatus';
                foreach ($resultado as $key => $value) {
                    if ($value->status == true) {
                        $estado[$value->id] = $value->nombre;
                    }
                }
            } else {
                $estado['1'] = "Revisión técnica";
            }

            //$resultado = competencia::model()->findAll();

            $competencia = array();

            $competencia['falso'] = 'Selecciona competencia';
            /* foreach ($resultado as $key => $value) {
              $competencia[$value->id] = $value->nombre;
              } */

            //$resultado = desempeno::model()->findAll();

            $desempeno = array();

            $desempeno['falso'] = 'Selecciona desempeño';
            /* foreach ($resultado as $key => $value) {
              $desempeno[$value->id] = $value->nombre;
              } */

            if (isset($_POST['Reactivo'])) {
                $model->attributes = $_POST['Reactivo'];
                $model->id_padre = 0;
                $model->usuario_creador = Yii::app()->user->id_usuario;
                $model->usuario_editor = Yii::app()->user->id_usuario;
                $model->fecha_creacion = time();
                $model->fecha_edicion = time();
                $model->contador_edicion = 1;
                $model->id_tipo_reactivo = 1;
                $model->status = true;
                if (!file_exists(Yii::app()->basePath . '/../files/')) {
                    mkdir(Yii::app()->basePath . '/../files/', 0777, true);
                }
                $model->archivo = CUploadedFile::getInstance($model, 'archivo');

                if ($model->validate()) {
                    if (!empty($model->archivo)) {
                        $posicion = strrpos($model->archivo->name, '.');
                        $nombre_arc = substr($model->archivo->name, 0, $posicion) . '_' . time() . substr($model->archivo->name, $posicion);
                        $model->archivo->saveAs(Yii::app()->basePath . '/../files/' . $nombre_arc);
                        $model->archivo = $nombre_arc;
                    }
                    if ($model->save(false))
                        $this->redirect(array('view', 'id' => $model->id));
                }
                if (!empty($model->id_area) && $model->id_area != 'falso') {

                    $resultado = competencia::model()->findAll('id_area=:id_area', array(':id_area' => $model->id_area));
                    foreach ($resultado as $key => $value) {
                        $competencia[$value->id] = $value->nombre;
                    }
                }
                if (!empty($model->id_competencia) && $model->id_competencia != 'falso') {
                    $resultado = desempeno::model()->findAll('id_competencia=:id_competencia', array(':id_competencia' => $model->id_competencia));
                    foreach ($resultado as $key => $value) {
                        $desempeno[$value->id] = $value->nombre;
                    }
                }
            }
            $this->render('createPadre', array(
                'model' => $model,
                'area' => $area,
                'estado' => $estado,
                'competencia' => $competencia,
                'desempeno' => $desempeno,
            ));
        }
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model = $this->loadModel();

        if ($model->id_tipo_reactivo != 1) {

            // Uncomment the following line if AJAX validation is needed
            // $this->performAjaxValidation($model);

            $resultado = area::model()->findAll();

            $area = array();

            $area['falso'] = 'Selecciona area';
            foreach ($resultado as $key => $value) {
                $area[$value->id] = $value->nombre;
            }

            $resultado = TipoReactivo::model()->findAll();

            $tipo_reactivo = array();

            $tipo_reactivo['falso'] = 'Selecciona tipo';
            foreach ($resultado as $key => $value) {
                $tipo_reactivo[$value->id] = $value->nombre;
            }

            $resultado = estado::model()->findAll();

            $estado = array();

            if (isset(Yii::app()->user->id_rol) && Yii::app()->user->id_rol == 1) {
                $estado['falso'] = 'Selecciona estado';
                foreach ($resultado as $key => $value) {
                    if ($value->status == true) {
                        $estado[$value->id] = $value->nombre;
                    }
                }
            } else {
                $estado['1'] = "Revisión técnica";
            }

            $resultado = competencia::model()->findAll('id_area=:id_area', array(':id_area' => $model->id_area));
            foreach ($resultado as $key => $value) {
                $competencia[$value->id] = $value->nombre;
            }
            $resultado = desempeno::model()->findAll('id_competencia=:id_competencia', array(':id_competencia' => $model->id_competencia));
            foreach ($resultado as $key => $value) {
                $desempeno[$value->id] = $value->nombre;
            }
            
            if($model->id_tipo_reactivo==2){
                $desempeno_padre= Reactivo::model()->findByPk($model->id_padre)->id_desempeno;
                $resultado = aprendizaje::model()->findAll('id_desempeno=:id_desempeno', array(':id_desempeno' => $desempeno_padre));
            }
            else{
                $resultado = aprendizaje::model()->findAll('id_desempeno=:id_desempeno', array(':id_desempeno' => $model->id_desempeno));
            }
            foreach ($resultado as $key => $value) {
                $aprendizaje[$value->id] = $value->nombre;
            }

            $respuesta = new Respuesta;
            $array_respuestas = array();
            $respuestas = Respuesta::model()->findAll('id_reactivo=:id_reactivo', array(':id_reactivo' => $model->id));

            for ($i = 1; $i <= 7; $i++) {
                if (isset($respuestas[$i - 1])) {
                    $array_respuestas[$i] = $respuestas[$i - 1]->argumento;
                    $array_ids[$i] = $respuestas[$i - 1]->id;
                    if ($respuestas[$i - 1]->correcta == true) {
                        $respuesta->correcta = $i;
                    }
                } else {
                    $array_respuestas[$i] = '';
                }
            }
            $respuesta->argumento = $array_respuestas;
            //print_r ($array_ids); die;

            if (isset($_POST['Reactivo'])) {
                $archivo_old = $model->archivo;
                $model->attributes = $_POST['Reactivo'];
                $respuesta->attributes = $_POST['Respuesta'];

                /* var_dump($model['planteamiento']);
                  die; */
                /* if (isset($_GET['id_padre'])) {
                  $model->id_padre = $_GET['id_padre'];
                  $model->id_tipo_reactivo = 2;
                  $model->id_estatus_reactivo= Reactivo::model()->findByPk($_GET['id_padre'])->id_estatus_reactivo;
                  } else {
                  $model->id_padre = 0;
                  $model->id_tipo_reactivo = 3;
                  } */

                //$model->usuario_creador = Yii::app()->user->id_usuario;
                $model->usuario_editor = Yii::app()->user->id_usuario;
                //$model->fecha_creacion = time();
                $model->fecha_edicion = time();
                $model->contador_edicion+=1;
                //$model->status = true;
                if (isset($model->id_aprendizaje) && $model->id_aprendizaje != 'falso')
                    $model->id_nivel_cognitivo = aprendizaje::model()->findByPk($model->id_aprendizaje)->id_nivel_cognitivo;
                if (!file_exists(Yii::app()->basePath . '/../files/')) {
                    mkdir(Yii::app()->basePath . '/../files/', 0777, true);
                }
                $model->archivo = CUploadedFile::getInstance($model, 'archivo');

                $i = 1;
                $model->error_respuestas_vacias = 'success';
                foreach ($respuesta->argumento as $respuesta_error) {
                    if (empty($respuesta_error[$i])) {
                        $model->error_respuestas_vacias = 'error';
                    }
                    $i++;
                }

                if ($respuesta['correcta'] == 0) {
                    $model->error_sin_correcta = 'error';
                }


                if ($model->validate()) {
                    if (!empty($model->archivo)) {
                        $posicion = strrpos($model->archivo->name, '.');
                        $nombre_arc = substr($model->archivo->name, 0, $posicion) . '_' . time() . substr($model->archivo->name, $posicion);
                        $model->archivo->saveAs(Yii::app()->basePath . '/../files/' . $nombre_arc);
                        $model->archivo = $nombre_arc;
                    } else {
                        $model->archivo = $archivo_old;
                    }
                    if ($model->save(false)) {
                        Respuesta::model()->deleteAll('id_reactivo=:id_reactivo', array(':id_reactivo' => $model->id));
                        $respuestas = $respuesta->argumento;
                        $i = 1;
                        foreach ($respuestas as $respuesta1) {
                            $respuesta_guardar = new Respuesta;
                            if ($i == $respuesta['correcta']) {
                                $respuesta_guardar->correcta = true;
                            } else {
                                $respuesta_guardar->correcta = false;
                            }
                            $respuesta_guardar->id_reactivo = $model->id;
                            $respuesta_guardar->usuario_creador = Yii::app()->user->id_usuario;
                            $respuesta_guardar->usuario_editor = Yii::app()->user->id_usuario;
                            $respuesta_guardar->fecha_creacion = time();
                            $respuesta_guardar->fecha_edicion = time();
                            $respuesta_guardar->argumento = $respuesta1;
                            if (!empty($respuesta_guardar->argumento)) {
                                $respuesta_guardar->save();
                            }
                            $i++;
                        }


                        $this->redirect(array('reactivo/view', 'id' => $model->id));
                    }
                }

                if (!empty($model->id_area) && $model->id_area != 'falso') {
                    $resultado = competencia::model()->findAll('id_area=:id_area', array(':id_area' => $model->id_area));
                    foreach ($resultado as $key => $value) {
                        $competencia[$value->id] = $value->nombre;
                    }
                }
                if (!empty($model->id_competencia) && $model->id_competencia != 'falso') {
                    $resultado = desempeno::model()->findAll('id_competencia=:id_competencia', array(':id_competencia' => $model->id_competencia));
                    foreach ($resultado as $key => $value) {
                        $desempeno[$value->id] = $value->nombre;
                    }
                }
                if (!empty($model->id_desempeno) && $model->id_desempeno != 'falso') {
                    $resultado = aprendizaje::model()->findAll('id_desempeno=:id_desempeno', array(':id_desempeno' => $model->id_desempeno));
                    foreach ($resultado as $key => $value) {
                        $aprendizaje[$value->id] = $value->nombre;
                    }
                }
            }

            $this->render('update', array(
                'model' => $model,
                'respuesta' => $respuesta,
                'area' => $area,
                'tipo_reactivo' => $tipo_reactivo,
                //'nivel_cognitivo' => $nivel_cognitivo,
                //'evaluacion' => $evaluacion,
                'estado' => $estado,
                'competencia' => $competencia,
                'desempeno' => $desempeno,
                'aprendizaje' => $aprendizaje,
            ));
        } else {

            $resultado = area::model()->findAll();

            $area = array();

            $area['falso'] = 'Selecciona clasificación';
            foreach ($resultado as $key => $value) {
                $area[$value->id] = $value->nombre;
            }

            $resultado = estado::model()->findAll();

            $estado = array();

            if (isset(Yii::app()->user->id_rol) && Yii::app()->user->id_rol == 1) {
                $estado['falso'] = 'Selecciona estatus';
                foreach ($resultado as $key => $value) {
                    if ($value->status == true) {
                        $estado[$value->id] = $value->nombre;
                    }
                }
            } else {
                $estado['1'] = "Revisión técnica";
            }

            $resultado = competencia::model()->findAll();

            $competencia = array();

            $competencia['falso'] = 'Selecciona competencia';
            foreach ($resultado as $key => $value) {
              $competencia[$value->id] = $value->nombre;
              }

            $resultado = desempeno::model()->findAll();

            $desempeno = array();

            $desempeno['falso'] = 'Selecciona desempeño';
            foreach ($resultado as $key => $value) {
              $desempeno[$value->id] = $value->nombre;
            }

            if (isset($_POST['Reactivo'])) {
                $archivo_old = $model->archivo;
                $model->attributes = $_POST['Reactivo'];

                //$model->id_padre = 0;
                //$model->usuario_creador = Yii::app()->user->id_usuario;
                $model->usuario_editor = Yii::app()->user->id_usuario;
                //$model->fecha_creacion = time();
                $model->fecha_edicion = time();
                $model->contador_edicion += 1;
                //$model->id_tipo_reactivo = 1;
                //$model->status = true;
                $_GET['tipo'] = 'padre';

                if (!file_exists(Yii::app()->basePath . '/../files/')) {
                    mkdir(Yii::app()->basePath . '/../files/', 0777, true);
                }
                $model->archivo = CUploadedFile::getInstance($model, 'archivo');

                if ($model->validate()) {
                    if (!empty($model->archivo)) {
                        $posicion = strrpos($model->archivo->name, '.');
                        $nombre_arc = substr($model->archivo->name, 0, $posicion) . '_' . time() . substr($model->archivo->name, $posicion);
                        $model->archivo->saveAs(Yii::app()->basePath . '/../files/' . $nombre_arc);
                        $model->archivo = $nombre_arc;
                    } else {
                        $model->archivo = $archivo_old;
                    }
                    if ($model->save(false)) {
                            Reactivo::model()->updateAll(array('id_area' => $model->id_area), 'id_padre=:id_padre', array(':id_padre' => $model->id));
                            Reactivo::model()->updateAll(array('id_competencia' => $model->id_competencia), 'id_padre=:id_padre', array(':id_padre' => $model->id));
                            Reactivo::model()->updateAll(array('id_desempeno' => $model->id_desempeno), 'id_padre=:id_padre', array(':id_padre' => $model->id));
                            Reactivo::model()->updateAll(array('id_estado' => $model->id_estado), 'id_padre=:id_padre', array(':id_padre' => $model->id));
                            
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                }
                if (!empty($model->id_area) && $model->id_area != 'falso') {

                    $resultado = competencia::model()->findAll('id_area=:id_area', array(':id_area' => $model->id_area));
                    foreach ($resultado as $key => $value) {
                        $competencia[$value->id] = $value->nombre;
                    }
                }
                if (!empty($model->id_competencia) && $model->id_competencia != 'falso') {
                    $resultado = desempeno::model()->findAll('id_competencia=:id_competencia', array(':id_competencia' => $model->id_competencia));
                    foreach ($resultado as $key => $value) {
                        $desempeno[$value->id] = $value->nombre;
                    }
                }
            }
            $this->render('updatePadre', array(
                'model' => $model,
                'area' => $area,
                'estado' => $estado,
                'competencia' => $competencia,
                'desempeno' => $desempeno,
            ));
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     */
    public function actionDelete() {
        if (Yii::app()->request->isPostRequest) {
            // we only allow deletion via POST request
            $this->loadModel()->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if (!isset($_GET['ajax']))
                $this->redirect(array('index'));
        }
        else
            throw new CHttpException(400, 'Invalid request. Please do not repeat this request again.');
    }

    public function actionDeshabilitar() {
        //echo $_POST['justificacion_eliminar']; die;
        Reactivo::model()->updateByPk($_POST['id'], array('status' => 0, 'justificacion_eliminar' => $_POST['justificacion_eliminar']));
        $reactivo = Reactivo::model()->findByPk($_POST['id']);
        if ($reactivo->id_tipo_reactivo != 3) {
            $this->redirect('indexPadre');
        } else {
            $this->redirect('index');
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new Reactivo('search');

        /* CATÁLOGOS */
        $resultado = nivel_cognitivo::model()->findAll($model->id_nivel_cognitivo);
        $nivelcognitivo = array();
        foreach ($resultado as $key => $value) {
            $nivelcognitivo[$value->id] = $value->nombre;
        }
        $resultado = estado::model()->findAll($model->id_estado);
        $estado = array();
        foreach ($resultado as $key => $value) {
            $estado[$value->id] = $value->nombre;
        }

        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Reactivo']))
            $model->attributes = $_GET['Reactivo'];

        $criteria = new CDbCriteria;
        $criteria->addCondition('id_tipo_reactivo=3', 'AND');
        $criteria->addCondition('status=true', 'AND');
        $reactivos = $model->findAll($criteria, array('order' => 'id'));
        //$reactivos = $model->findAll($criteria);

        $this->layout = '//layouts/column1';
        $this->render('index', array(
            'model' => $model,
            'reactivos' => $reactivos,
            'nivelcognitivo' => $nivelcognitivo,
            'estado' => $estado,
        ));
    }

    /**
     * Lists all padre models.
     */
    public function actionIndexPadre() {
        $model = new Reactivo('search');

        /* CATÁLOGOS */
        $resultado = estado::model()->findAll($model->id_estado);
        $estado = array();
        foreach ($resultado as $key => $value) {
            $estado[$value->id] = $value->nombre;
        }

        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Reactivo']))
            $model->attributes = $_GET['Reactivo'];

        $criteria = new CDbCriteria;
        $criteria->addCondition('id_tipo_reactivo=1', 'AND');
        $criteria->addCondition('status=true', 'AND');
        $reactivos = $model->findAll($criteria, array('order' => 'id'));

        $this->layout = '//layouts/column1';
        $this->render('indexPadre', array(
            'model' => $model,
            'reactivos' => $reactivos,
            'estado' => $estado,
        ));
    }

    public function actionGetCompetencias() {
        /* var_dump($_POST);
          die; */
        //$_POST['id_clase']=1;
        if ($_POST['Reactivo']['id_area'] == 0) {
            echo CHtml::tag('option', array('value' => 0), CHtml::encode("Selecciona competencia"), true);
        } else {
            $data = competencia::model()->findAll('id_area=:id_area AND status=true', array(':id_area' => $_POST['Reactivo']['id_area']));
            if ($data == null) {
                echo CHtml::tag('option', array('value' => 'falso'), CHtml::encode("Sin competencias"), true);
            } else {
                $data2 = CHtml::listData($data, 'id', 'nombre');
                echo CHtml::tag('option', array('value' => 'falso'), CHtml::encode("Selecciona competencia"), true);
                $i = 0;
                foreach ($data2 as $value => $name) {
                    echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                    $i++;
                }
            }
        }
    }

    public function actionGetDesempeno() {
        /* var_dump($_POST);
          die; */
        //$_POST['id_clase']=1;
        if ($_POST['Reactivo']['id_competencia'] == 0) {
            echo CHtml::tag('option', array('value' => 0), CHtml::encode("Selecciona desempeño"), true);
        } else {
            $data = desempeno::model()->findAll('id_competencia=:id_competencia AND status=true', array(':id_competencia' => $_POST['Reactivo']['id_competencia']));
            if ($data == null) {
                echo CHtml::tag('option', array('value' => 'falso'), CHtml::encode("Sin desempeños"), true);
            } else {
                $data2 = CHtml::listData($data, 'id', 'nombre');
                echo CHtml::tag('option', array('value' => 'falso'), CHtml::encode("Selecciona desempeño"), true);
                $i = 0;
                foreach ($data2 as $value => $name) {
                    echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                    $i++;
                }
            }
        }
    }

    public function actionGetAprendizaje() {
        /* var_dump($_POST);
          die; */
        //$_POST['id_clase']=1;
        if ($_POST['Reactivo']['id_desempeno'] == 0) {
            echo CHtml::tag('option', array('value' => 0), CHtml::encode("Selecciona aprendizaje"), true);
        } else {
            $data = aprendizaje::model()->findAll('id_desempeno=:id_desempeno AND status=true', array(':id_desempeno' => $_POST['Reactivo']['id_desempeno']));
            if ($data == null) {
                echo CHtml::tag('option', array('value' => 'falso'), CHtml::encode("Sin desempeños"), true);
            } else {
                $data2 = CHtml::listData($data, 'id', 'nombre');
                echo CHtml::tag('option', array('value' => 'falso'), CHtml::encode("Selecciona desempeño"), true);
                $i = 0;
                foreach ($data2 as $value => $name) {
                    echo CHtml::tag('option', array('value' => $value), CHtml::encode($name), true);
                    $i++;
                }
            }
        }
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Reactivo('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Reactivo']))
            $model->attributes = $_GET['Reactivo'];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     */
    public function loadModel() {
        if ($this->_model === null) {
            if (isset($_GET['id']))
                $this->_model = Reactivo::model()->findbyPk($_GET['id']);
            if ($this->_model === null)
                throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $this->_model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'reactivo-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
