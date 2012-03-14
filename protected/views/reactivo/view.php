<?php
$this->breadcrumbs=array(
	'Reactivos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Reactivo', 'url'=>array('index')),
	array('label'=>'Create Reactivo', 'url'=>array('create')),
	array('label'=>'Update Reactivo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Reactivo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reactivo', 'url'=>array('admin')),
);
?>

<h1>View Reactivo #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'planteamiento',
		'id_estatus_reactivo',
		'id_clasificacion_tematica',
		'id_tipo_reactivo',
		'id_padre',
		'id_nivel_taxonomico',
		'id_nivel_dificultad',
		'id_evaluacion',
		'base_pregunta',
		'observaciones',
		'archivo',
		'fecha_creacion',
		'fecha_edicion',
		'usuario_creador',
		'usuario_editor',
		'contador_edicion',
		'status',
	),
)); ?>
