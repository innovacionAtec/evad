<?php
$this->breadcrumbs=array(
	'Evaluacions',
);

$this->menu=array(
	array('label'=>'Create Evaluacion', 'url'=>array('create')),
	array('label'=>'Manage Evaluacion', 'url'=>array('admin')),
);
?>

<h1>Evaluacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
