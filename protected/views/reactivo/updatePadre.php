<?php $this->pageTitle = CHtml::encode('EVAD | Modificar reactivo padre'); ?>

<div class="row">
    <div class="span5">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="<?php echo CController::createUrl('reactivo/indexPadre'); ?>">Reactivos padres</a> <span class="divider">/</span>
            </li>
            <li>
                <?php echo CHtml::link("Reactivo padre #". $model->id, array('reactivo/view', 'id'=>$model->id)); ?><span class="divider"> /</span>
            </li>
            <li class="active">Modificar</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span5">
        <h1>Modificar reactivo padre #<?php echo $model->id; ?></h1>
    </div>
</div>
<br/>
<?php echo $this->renderPartial('_formPadre', array('model' => $model,
                'area' => $area,
                'estado' => $estado,
                'competencia' => $competencia,
                'desempeno' => $desempeno,
    )); ?>