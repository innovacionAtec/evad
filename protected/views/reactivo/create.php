<?php if (isset($_GET['id_padre'])) {
        $this->pageTitle = CHtml::encode('EVAD | Nuevo reactivo hijo');
    }
      else {
          $this->pageTitle = CHtml::encode('EVAD | Nuevo reactivo independiente');
      }
?>

<!--13abr12_Cirenia-->
<div class="row">
    <div class="span5">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <?php if (isset($_GET['id_padre'])) { ?>
                <li>
                    <a href="<?php echo CController::createUrl('reactivo/indexPadre'); ?>">Reactivos padres</a> <span class="divider">/</span>
                </li>
                <li>
                    <?php echo CHtml::link("Reactivo padre #". $_GET['id_padre'], array('reactivo/view', 'id'=>$_GET['id_padre'])); ?><span class="divider"> /</span>
                </li>
                <li class="active">Nuevo reactivo hijo</li>
            <?php 
            }
            else {
            ?>
                <li>
                    <a href="<?php echo CController::createUrl('reactivo/index'); ?>">Reactivos independientes</a> <span class="divider">/</span>
                </li>
                <li class="active">Nuevo reactivo independiente</li>
            <?php } ?>
        </ul>
    </div>
</div>

<!--13abr12_Cirenia-->
<div class="row">
    <div class="span5">
        <?php if (isset($_GET['id_padre'])) { ?>
            <h1>Nuevo reactivo hijo</h1>
        <?php 
            }
            else {
        ?>
            <h1>Nuevo reactivo independiente</h1>
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
