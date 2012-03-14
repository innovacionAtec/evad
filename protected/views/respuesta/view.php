<?php
$this->breadcrumbs=array(
	'Respuestas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Respuesta', 'url'=>array('index')),
	array('label'=>'Create Respuesta', 'url'=>array('create')),
	array('label'=>'Update Respuesta', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Respuesta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Respuesta', 'url'=>array('admin')),
);
?>

<h1>View Respuesta #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_reactivo',
		'archivo',
		'argumento',
		'fecha_creacion',
		'fecha_edicion',
		'usuario_creador',
		'usuario_editor',
		'correcta',
	),
)); ?>
