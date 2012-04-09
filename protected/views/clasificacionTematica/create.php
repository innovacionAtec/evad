<?php
/*$this->breadcrumbs=array(
	'Clasificacion Tematicas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClasificacionTematica', 'url'=>array('index')),
	array('label'=>'Manage ClasificacionTematica', 'url'=>array('admin')),
);*/
?>
<?php $this->pageTitle = CHtml::encode('EVAD | Nueva clasificación'); ?>
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
            <li class="active">Nueva</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span7">
        <h1>Agregar nueva clasificación temática</h1>
    </div>
</div>

<div class="row">
    <div class="span7 offset1">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>