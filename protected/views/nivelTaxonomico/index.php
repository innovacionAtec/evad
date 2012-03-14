<?php
$this->breadcrumbs=array(
	'Nivel Taxonomicos',
);

$this->menu=array(
	array('label'=>'Create NivelTaxonomico', 'url'=>array('create')),
	array('label'=>'Manage NivelTaxonomico', 'url'=>array('admin')),
);
?>

<h1>Nivel Taxonomicos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
