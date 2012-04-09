<?php
/*$this->breadcrumbs=array(
	'Tipo Reactivos'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List TipoReactivo', 'url'=>array('index')),
	array('label'=>'Create TipoReactivo', 'url'=>array('create')),
	array('label'=>'View TipoReactivo', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage TipoReactivo', 'url'=>array('admin')),
);*/
?>
<?php $this->pageTitle = CHtml::encode('EVAD | Actualizar tipo reactivo'); ?>
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
            <li class="active">Actualización</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span7">
        <h1>Actualizar tipo de reactivo #<?php echo $model->id; ?></h1>
    </div>
</div>

<div class="row">
    <div class="span7 offset1">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>