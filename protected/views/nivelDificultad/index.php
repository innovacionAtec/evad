<?php
$this->breadcrumbs=array(
	'Nivel Dificultads',
);

$this->menu=array(
	array('label'=>'Create NivelDificultad', 'url'=>array('create')),
	array('label'=>'Manage NivelDificultad', 'url'=>array('admin')),
);
?>

<h1>Nivel Dificultads</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
