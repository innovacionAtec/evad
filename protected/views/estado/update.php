<?php
/*$this->breadcrumbs=array(
	'Estados'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);*/

/*$this->menu=array(
	array('label'=>'List estado', 'url'=>array('index')),
	array('label'=>'Create estado', 'url'=>array('create')),
	array('label'=>'View estado', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage estado', 'url'=>array('admin')),
);*/
?>

<?php $this->pageTitle = CHtml::encode('EVAD | Actualizar estado'); ?>
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
                <a href="<?php echo CController::createUrl('estado/index'); ?>">Estado</a> <span class="divider">/</span>
            </li>
            <li class="active">Actualización</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span7">
        <h1>Actualizar estado #<?php echo $model->id; ?></h1>
    </div>
</div>

<div class="row">
    <div class="span7 offset1">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>