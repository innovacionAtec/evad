<?php
$this->breadcrumbs=array(
	'Areas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List area', 'url'=>array('index')),
	array('label'=>'Manage area', 'url'=>array('admin')),
);
?>

<h1>Create area</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>