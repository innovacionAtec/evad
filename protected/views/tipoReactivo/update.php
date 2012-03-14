<?php
$this->breadcrumbs=array(
	'Tipo Reactivos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoReactivo', 'url'=>array('index')),
	array('label'=>'Create TipoReactivo', 'url'=>array('create')),
	array('label'=>'View TipoReactivo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TipoReactivo', 'url'=>array('admin')),
);
?>

<h1>Update TipoReactivo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>