<?php $this->pageTitle = CHtml::encode('EVAD | Nuevo aprendizaje'); ?>
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
                <a href="<?php echo CController::createUrl('aprendizaje/index'); ?>">Aprendizaje</a> <span class="divider">/</span>
            </li>
            <li class="active">Nueva</li>
        </ul>
    </div>
</div>


<div class="row">
    <div class="span7">
        <h1>Agregar nuevo aprendizaje</h1>
    </div>
</div>

<div class="row">
    <div class="span7 offset1">
        <?php echo $this->renderPartial('_form', array('model'=>$model, 'nivel_cognitivo'=>$nivel_cognitivo,
			'desempeno'=>$desempeno,)); ?>
    </div>
</div>