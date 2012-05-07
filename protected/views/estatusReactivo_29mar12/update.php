<?php
$this->breadcrumbs=array(
	'Estatus Reactivos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List EstatusReactivo', 'url'=>array('index')),
	array('label'=>'Create EstatusReactivo', 'url'=>array('create')),
	array('label'=>'View EstatusReactivo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage EstatusReactivo', 'url'=>array('admin')),
);
?>

<h1>Update EstatusReactivo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>