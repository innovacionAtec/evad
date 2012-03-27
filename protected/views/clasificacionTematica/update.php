<?php
/*$this->breadcrumbs=array(
	'Clasificacion Tematicas'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClasificacionTematica', 'url'=>array('index')),
	array('label'=>'Create ClasificacionTematica', 'url'=>array('create')),
	array('label'=>'View ClasificacionTematica', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage ClasificacionTematica', 'url'=>array('admin')),
);*/
?>

<div class="row">
    <div class="span5">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="<?php echo CController::createUrl('site/catalogos'); ?>">Catálogos</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="<?php echo CController::createUrl('clasificacionTematica/index'); ?>">Clasificación temática</a> <span class="divider">/</span>
            </li>
            <li class="active">Actualización</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span7">
        <h1>Actualizar Clasificacion Tematica #<?php echo $model->id; ?></h1>
    </div>
</div>

<div class="row">
    <div class="span7 offset1">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>