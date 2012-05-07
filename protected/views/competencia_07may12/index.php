<?php
$this->breadcrumbs=array(
	'Competencias',
);

$this->menu=array(
	array('label'=>'Create competencia', 'url'=>array('create')),
	array('label'=>'Manage competencia', 'url'=>array('admin')),
);
?>

<h1>Competencias</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
