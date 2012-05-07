<?php
$this->breadcrumbs=array(
	'Competencias'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List competencia', 'url'=>array('index')),
	array('label'=>'Create competencia', 'url'=>array('create')),
	array('label'=>'Update competencia', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete competencia', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage competencia', 'url'=>array('admin')),
);
?>

<h1>View competencia #<?php echo $model->id; ?></h1>

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
		'id_area',
	),
)); ?>
