<?php
$this->breadcrumbs=array(
	'Clasificacion Tematicas',
);

$this->menu=array(
	array('label'=>'Create ClasificacionTematica', 'url'=>array('create')),
	array('label'=>'Manage ClasificacionTematica', 'url'=>array('admin')),
);
?>

<h1>Clasificacion Tematicas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
