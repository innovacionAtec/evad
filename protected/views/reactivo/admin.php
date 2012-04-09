<?php
$this->breadcrumbs=array(
	'Reactivos'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Reactivo', 'url'=>array('index')),
	array('label'=>'Create Reactivo', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('reactivo-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Reactivos</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'reactivo-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'planteamiento',
		'id_estatus_reactivo',
		'id_clasificacion_tematica',
		'id_tipo_reactivo',
		'id_padre',
		/*
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
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>