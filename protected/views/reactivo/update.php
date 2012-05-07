<?php if ($model->id_padre!=0) {
        $this->pageTitle = CHtml::encode('EVAD | Modificar reactivo hijo');
    }
      else {
          $this->pageTitle = CHtml::encode('EVAD | Modificar reactivo independiente');
      }
?>

<div class="row">
    <div class="span6">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <?php if ($model->id_padre!=0) { ?>
                <li>
                    <a href="<?php echo CController::createUrl('reactivo/indexPadre'); ?>">Reactivos padres</a> <span class="divider">/</span>
                </li>
                <li>
                    <?php echo CHtml::link("Reactivo padre #". $model->id_padre, array('reactivo/view', 'id'=>$model->id_padre)); ?><span class="divider"> /</span>
                </li>
                <li>
                    <?php echo CHtml::link("Reactivo hijo #". $model->id, array('reactivo/view', 'id'=>$model->id)); ?><span class="divider"> /</span>
                </li>
                <li class="active">Modificar</li>
            <?php 
            }
            else {
            ?>
                <li>
                    <a href="<?php echo CController::createUrl('reactivo/index'); ?>">Reactivos independientes</a> <span class="divider">/</span>
                </li>
                <li>
                    <?php echo CHtml::link("Reactivo independiente #". $model->id, array('reactivo/view', 'id'=>$model->id_padre)); ?><span class="divider"> /</span>
                </li>
                <li class="active">Modificar</li>
            <?php } ?>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span6">
        <?php if ($model->id_padre!=0) { ?>
            <h1>Modificar reactivo hijo #<?php echo $model->id; ?></h1>
        <?php 
            }
            else {
        ?>
            <h1>Modificar reactivo independiente #<?php echo $model->id; ?></h1>
        <?php } ?>
    </div>
</div>

<br/>
<?php echo $this->renderPartial('_form', array('model' => $model,
                'respuesta' => $respuesta,
                'area' => $area,
                'tipo_reactivo' => $tipo_reactivo,
                //'nivel_cognitivo' => $nivel_cognitivo,
                //'evaluacion' => $evaluacion,
                'estado' => $estado,
                'competencia' => $competencia,
                'desempeno' => $desempeno,
                'aprendizaje' => $aprendizaje,
    )); ?>