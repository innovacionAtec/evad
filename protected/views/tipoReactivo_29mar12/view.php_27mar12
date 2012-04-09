<?php
$this->breadcrumbs=array(
	'Tipo Reactivos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List TipoReactivo', 'url'=>array('index')),
	array('label'=>'Create TipoReactivo', 'url'=>array('create')),
	array('label'=>'Update TipoReactivo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete TipoReactivo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TipoReactivo', 'url'=>array('admin')),
);
?>

<h1>View TipoReactivo #<?php echo $model->id; ?></h1>

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
