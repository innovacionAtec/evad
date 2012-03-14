<?php
$this->breadcrumbs=array(
	'Nivel Taxonomicos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List NivelTaxonomico', 'url'=>array('index')),
	array('label'=>'Create NivelTaxonomico', 'url'=>array('create')),
	array('label'=>'Update NivelTaxonomico', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete NivelTaxonomico', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage NivelTaxonomico', 'url'=>array('admin')),
);
?>

<h1>View NivelTaxonomico #<?php echo $model->id; ?></h1>

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
