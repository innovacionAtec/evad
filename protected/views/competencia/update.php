<?php $this->pageTitle = CHtml::encode('EVAD | Modificar competencia'); ?>
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
                <a href="<?php echo CController::createUrl('competencia/index'); ?>">Competencias</a> <span class="divider">/</span>
            </li>
            <li class="active">Modificar</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span7">
        <h1>Actualizar competencia #<?php echo $model->id; ?></h1>
    </div>
</div>

<div class="row">
    <div class="span7 offset1">
        <?php echo $this->renderPartial('_form', array('model'=>$model, 'areas'=>$areas)); ?>
    </div>
</div>