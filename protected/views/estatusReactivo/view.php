<?php
$this->breadcrumbs=array(
	'Estatus Reactivos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List EstatusReactivo', 'url'=>array('index')),
	array('label'=>'Create EstatusReactivo', 'url'=>array('create')),
	array('label'=>'Update EstatusReactivo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete EstatusReactivo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage EstatusReactivo', 'url'=>array('admin')),
);
?>

<h1>View EstatusReactivo #<?php echo $model->id; ?></h1>

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
