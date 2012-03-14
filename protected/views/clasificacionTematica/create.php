<?php
$this->breadcrumbs=array(
	'Clasificacion Tematicas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClasificacionTematica', 'url'=>array('index')),
	array('label'=>'Manage ClasificacionTematica', 'url'=>array('admin')),
);
?>

<h1>Create ClasificacionTematica</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>