<?php $this->pageTitle = CHtml::encode('EVAD | Nuevo reactivo padre'); ?>

<div class="row">
    <div class="span5">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="<?php echo CController::createUrl('reactivo/indexPadre'); ?>">Reactivos padres</a> <span class="divider">/</span>
            </li>
            <li class="active">Nuevo</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span4">
        <h1>Nuevo reactivo padre</h1>
    </div>
</div>
<br/>
<?php echo $this->renderPartial('_formPadre', array('model' => $model,
                'area' => $area,
                'estado' => $estado,
                'competencia' => $competencia,
                'desempeno' => $desempeno,
    )); ?>
