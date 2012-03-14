<?php
$this->breadcrumbs=array(
	'Rols'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Rol', 'url'=>array('index')),
	array('label'=>'Create Rol', 'url'=>array('create')),
	array('label'=>'View Rol', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Rol', 'url'=>array('admin')),
);
?>

<h1>Update Rol <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>