<?php
$this->breadcrumbs=array(
	'Evaluacions'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Evaluacion', 'url'=>array('index')),
	array('label'=>'Manage Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Create Evaluacion</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>