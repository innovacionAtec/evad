<?php
$this->breadcrumbs=array(
	'Clasificacion Tematicas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List ClasificacionTematica', 'url'=>array('index')),
	array('label'=>'Create ClasificacionTematica', 'url'=>array('create')),
	array('label'=>'Update ClasificacionTematica', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete ClasificacionTematica', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage ClasificacionTematica', 'url'=>array('admin')),
);
?>

<h1>View ClasificacionTematica #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nombre',
		'descripcion',
		'fecha_creacion',
		'fecha_edicion',
		'usuario_creador',
		'usuario_editor',
		'status',
	),
)); ?>