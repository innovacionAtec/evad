<?php
$this->breadcrumbs=array(
	'Nivel Taxonomicos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List NivelTaxonomico', 'url'=>array('index')),
	array('label'=>'Manage NivelTaxonomico', 'url'=>array('admin')),
);
?>

<h1>Create NivelTaxonomico</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>