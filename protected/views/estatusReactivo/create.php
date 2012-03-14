<?php
$this->breadcrumbs=array(
	'Estatus Reactivos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EstatusReactivo', 'url'=>array('index')),
	array('label'=>'Manage EstatusReactivo', 'url'=>array('admin')),
);
?>

<h1>Create EstatusReactivo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>