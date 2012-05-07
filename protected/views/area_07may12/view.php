<?php
$this->breadcrumbs=array(
	'Areas'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List area', 'url'=>array('index')),
	array('label'=>'Create area', 'url'=>array('create')),
	array('label'=>'Update area', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete area', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage area', 'url'=>array('admin')),
);
?>

<h1>View area #<?php echo $model->id; ?></h1>

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
