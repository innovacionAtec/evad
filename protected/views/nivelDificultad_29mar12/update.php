<?php
$this->breadcrumbs=array(
	'Nivel Dificultads'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NivelDificultad', 'url'=>array('index')),
	array('label'=>'Create NivelDificultad', 'url'=>array('create')),
	array('label'=>'View NivelDificultad', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NivelDificultad', 'url'=>array('admin')),
);
?>

<h1>Update NivelDificultad <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>