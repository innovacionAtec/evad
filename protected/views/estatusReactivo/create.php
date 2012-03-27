<?php /*
$this->breadcrumbs=array(
	'Estatus Reactivos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List EstatusReactivo', 'url'=>array('index')),
	array('label'=>'Manage EstatusReactivo', 'url'=>array('admin')),
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
                <a href="<?php echo CController::createUrl('estatusReactivo/index'); ?>">Estatus</a> <span class="divider">/</span>
            </li>
            <li class="active">Nuevo</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span7">
        <h1>Agregar Nuevo Estatus</h1>
    </div>
</div>

<div class="row">
    <div class="span7 offset1">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>