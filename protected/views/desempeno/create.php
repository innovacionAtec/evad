<?php $this->pageTitle = CHtml::encode('EVAD | Nuevo desempeño'); ?>
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
                <a href="<?php echo CController::createUrl('desempeno/index'); ?>">Desempeño</a> <span class="divider">/</span>
            </li>
            <li class="active">Nueva</li>
        </ul>
    </div>
</div>


<div class="row">
    <div class="span7">
        <h1>Agregar nuevo desempeño</h1>
    </div>
</div>

<div class="row">
    <div class="span7 offset1">
        <?php echo $this->renderPartial('_form', array('model'=>$model, 'competencia'=>$competencia
			)); ?>
    </div>
</div>