<?php
$this->breadcrumbs=array(
	'Nivel Dificultads'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NivelDificultad', 'url'=>array('index')),
	array('label'=>'Manage NivelDificultad', 'url'=>array('admin')),
);
?>

<h1>Create NivelDificultad</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>