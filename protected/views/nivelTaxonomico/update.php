<?php
$this->breadcrumbs=array(
	'Nivel Taxonomicos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List NivelTaxonomico', 'url'=>array('index')),
	array('label'=>'Create NivelTaxonomico', 'url'=>array('create')),
	array('label'=>'View NivelTaxonomico', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage NivelTaxonomico', 'url'=>array('admin')),
);
?>

<h1>Update NivelTaxonomico <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>