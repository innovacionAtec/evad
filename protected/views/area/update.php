<?php $this->pageTitle = CHtml::encode('EVAD | Modificar área'); ?>
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
                <a href="<?php echo CController::createUrl('area/index'); ?>">Áreas</a> <span class="divider">/</span>
            </li>
            <li class="active">Modificar</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span7">
        <h1>Actualizar área #<?php echo $model->id; ?></h1>
    </div>
</div>

<div class="row">
    <div class="span7 offset1">
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </div>
</div>