<?php
$this->breadcrumbs=array(
	'Reactivos',
);

$this->menu=array(
	array('label'=>'Create Reactivo', 'url'=>array('create')),
	array('label'=>'Manage Reactivo', 'url'=>array('admin')),
);
?>

<h1>Reactivos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>