<?php
/*$this->breadcrumbs=array(
	'Tipo Reactivos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List TipoReactivo', 'url'=>array('index')),
	array('label'=>'Manage TipoReactivo', 'url'=>array('admin')),
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
                <a href="<?php echo CController::createUrl('tipoReactivo/index'); ?>">Tipo de reactivo</a> <span class="divider">/</span>
            </li>
            <li class="active">Nuevo</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span7">
        <h1>Agregar nuevo tipo de reactivo</h1>
    </div>
</div>

<div class="row">
    <div class="span7 offset1">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>