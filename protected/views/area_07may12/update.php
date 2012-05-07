<?php
$this->breadcrumbs=array(
	'Areas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List area', 'url'=>array('index')),
	array('label'=>'Create area', 'url'=>array('create')),
	array('label'=>'View area', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage area', 'url'=>array('admin')),
);
?>

<h1>Update area <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>