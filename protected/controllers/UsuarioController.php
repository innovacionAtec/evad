<?php

class UsuarioController extends Controller {

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
                'actions' => array('index', 'view'),
                /*'users' => array('*'),*/
		'users' => array('@'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('@'),
                'expression' => 'isset(Yii::app()->user->id_rol) && Yii::app()->user->id_rol==1',
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
        $this->render('view', array(
            'model' => $this->loadModel(),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Usuario;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $resultado = Rol::model()->findAll();
        $roles = array();
        if ($resultado == null) {
            $roles['falso'] = "Sin resultados";
        } else {
            $roles['falso'] = "Seleccione una opción";
            foreach ($resultado as $key => $value) {
                $roles[$value->id] = $value->nombre;
            }
        }
        
        $resultado = area::model()->findAll();
        if ($resultado == null) {
            $area['falso'] = "Sin resultados";
        } else {
            $area['falso'] = "Seleccione una opción";
            foreach ($resultado as $key => $value) {
                $area[$value->id] = $value->nombre;
            }
        }

        if (isset($_POST['Usuario'])) {
            $model->attributes = $_POST['Usuario'];
            $model->password = md5($model->password);
            $model->fecha_creacion = time();
            $model->fecha_edicion = time();
            $model->ultimo_login = time();
            $model->ultimo_logout = time();

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('create', array(
            'model' => $model,
            'roles' => $roles,
            'area' => $area,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     */
    public function actionUpdate() {
        $model = $this->loadModel();
        
        $password= $model->password;
        
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        $resultado = Rol::model()->findAll();
        $roles = array();
        if ($resultado == null) {
            $roles['falso'] = "Sin resultados";
        } else {
            $roles['falso'] = "Seleccione una opción";
            foreach ($resultado as $key => $value) {
                $roles[$value->id] = $value->nombre;
            }
        }
        
        $resultado = area::model()->findAll();
        if ($resultado == null) {
            $area['falso'] = "Sin resultados";
        } else {
            $area['falso'] = "Seleccione una opción";
            foreach ($resultado as $key => $value) {
                $area[$value->id] = $value->nombre;
            }
        }

        if (isset($_POST['Usuario'])) {

            $model->attributes = $_POST['Usuario'];
            if ($model->password == '') $model->password = $password;
            else $model->password = md5($model->password);

            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
            'roles' => $roles,
            'area' => $area,
        ));
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

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Usuario');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Usuario('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Usuario']))
            $model->attributes = $_GET['Usuario'];

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
                $this->_model = Usuario::model()->findbyPk($_GET['id']);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'usuario-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
