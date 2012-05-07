<?php
$this->breadcrumbs=array(
	'Competencias'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List competencia', 'url'=>array('index')),
	array('label'=>'Create competencia', 'url'=>array('create')),
	array('label'=>'View competencia', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage competencia', 'url'=>array('admin')),
);
?>

<h1>Update competencia <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>