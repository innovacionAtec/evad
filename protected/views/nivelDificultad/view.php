<?php
$this->breadcrumbs=array(
	'Nivel Dificultads'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List NivelDificultad', 'url'=>array('index')),
	array('label'=>'Create NivelDificultad', 'url'=>array('create')),
	array('label'=>'Update NivelDificultad', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NivelDificultad', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NivelDificultad', 'url'=>array('admin')),
);
?>

<h1>View NivelDificultad #<?php echo $model->id; ?></h1>

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
