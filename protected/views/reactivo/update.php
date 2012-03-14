<?php
$this->breadcrumbs=array(
	'Reactivos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Reactivo', 'url'=>array('index')),
	array('label'=>'Create Reactivo', 'url'=>array('create')),
	array('label'=>'View Reactivo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Reactivo', 'url'=>array('admin')),
);
?>

<h1>Update Reactivo <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>