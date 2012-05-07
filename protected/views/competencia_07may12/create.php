<?php
$this->breadcrumbs=array(
	'Competencias'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List competencia', 'url'=>array('index')),
	array('label'=>'Manage competencia', 'url'=>array('admin')),
);
?>

<h1>Create competencia</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>