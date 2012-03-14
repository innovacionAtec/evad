<?php
$this->breadcrumbs=array(
	'Reactivos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Reactivo', 'url'=>array('index')),
	array('label'=>'Manage Reactivo', 'url'=>array('admin')),
);
?>

<h1>Create Reactivo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>