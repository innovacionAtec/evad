<?php
$this->breadcrumbs=array(
	'Estatus Reactivos',
);

$this->menu=array(
	array('label'=>'Create EstatusReactivo', 'url'=>array('create')),
	array('label'=>'Manage EstatusReactivo', 'url'=>array('admin')),
);
?>

<h1>Estatus Reactivos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
