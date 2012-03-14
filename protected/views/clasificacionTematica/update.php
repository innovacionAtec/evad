<?php
$this->breadcrumbs=array(
	'Clasificacion Tematicas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClasificacionTematica', 'url'=>array('index')),
	array('label'=>'Create ClasificacionTematica', 'url'=>array('create')),
	array('label'=>'View ClasificacionTematica', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClasificacionTematica', 'url'=>array('admin')),
);
?>

<h1>Update ClasificacionTematica <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>