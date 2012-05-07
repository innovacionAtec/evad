<?php
    $model->id_area= area::model()->findByPk($model->id_area)->nombre;
    $model->id_competencia= competencia::model()->findByPk($model->id_competencia)->nombre;
    $model->id_desempeno= desempeno::model()->findByPk($model->id_desempeno)->nombre;
    $model->id_aprendizaje= aprendizaje::model()->findByPk($model->id_aprendizaje)->nombre;
    $tipo_reactivo= TipoReactivo::model()->findByPk($model->id_tipo_reactivo)->nombre;
    $model->id_nivel_cognitivo= nivel_cognitivo::model()->findByPk($model->id_nivel_cognitivo)->nombre;
    $model->id_estado= estado::model()->findByPk($model->id_estado)->nombre;
    $usuario= Usuario::model()->findByPk($model->usuario_creador);
    $nombre_usuario_creador= $usuario->nombres . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno;
    $usuario= Usuario::model()->findByPk($model->usuario_editor);
    $nombre_usuario_editor= $usuario->nombres . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno;
?>

<?php if ($model->id_tipo_reactivo == 2) {
        $this->pageTitle = CHtml::encode('EVAD | Reactivo hijo'. $model->id);
    }
      else {
          $this->pageTitle = CHtml::encode('EVAD | Reactivo independiente'. $model->id);
      }
?>

<!--13abr12_Cirenia-->
<div class="row">
    <div class="span5">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <?php if ($model->id_tipo_reactivo == 2) { ?>
                <li>
                    <a href="<?php echo CController::createUrl('reactivo/indexPadre'); ?>">Reactivos padres</a> <span class="divider">/</span>
                </li>
                <li>
                    <?php echo CHtml::link("Reactivo padre #". $model->id_padre, array('reactivo/view', 'id'=>$model->id_padre)); ?><span class="divider"> /</span>
                </li>
                <li class="active">Reactivo hijo #<?php echo $model->id; ?></li>
            <?php 
                }
                else {
            ?>
                <li>
                    <a href="<?php echo CController::createUrl('reactivo/index'); ?>">Reactivos independientes</a> <span class="divider">/</span>
                </li>
                <li class="active">Reactivo independiente #<?php echo $model->id; ?></li>
            <?php } ?>
        </ul>
    </div>
    <div class="span4 pull-right">
        <script type="text/javascript">
            $(function(){ $(".btn")
                .popover({
                    offset: 5,
                    placement: 'right'
                });
            });
        </script>
        <a href="<?php echo CController::createUrl('update',array('id'=>$model->id)); ?>" class="btn btn-primary" data-content="Permite modificar el reactivo" rel="popover" data-original-title="Ayuda">
            <i class="icon-refresh icon-white"></i> Modificar
        </a>
        <?php if (isset(Yii::app()->user->id_rol) && Yii::app()->user->id_rol<=2){ ?>
            <a class="btn btn-warning" data-toggle="modal" href="#eliminar"><i class="icon-remove icon-white"></i> Eliminar</a>
        <?php } ?>
        <div class="modal hide fade" id="eliminar" style="display: none;">
            <div class="modal-header">
                <a data-dismiss="modal" class="close">×</a>
                <h3>Eliminar reactivo <?php echo ($model->id_tipo_reactivo==2) ? 'hijo' : 'independiente'; ?> # <?php echo $model->id; ?></h3>
            </div>
            <div class="modal-body">
                <div class="row" style="height:145px; overflow:auto; position:relative;margin-bottom: 3px;">
                    <div class="span5">
                        <h6>Justificación:</h6>
                        <?php
                        echo CHtml::beginForm('deshabilitar');
                        echo CHtml::hiddenField('id', $model->id);
                        echo CHtml::textArea('justificacion_eliminar', '', array('class' => 'span4', 'style' => 'resize:none; height:75px;'));
                        ?>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning" href="#">Eliminar</button>
                <a data-dismiss="modal" class="btn" href="#">Cancelar</a>
                <?php
                echo CHtml::endForm();
                ?>
            </div>
        </div>
    </div>
</div>

<!--13abr12_Cirenia-->
<div class="row">
    <div class="span5">
        <?php if ($model->id_tipo_reactivo == 2) { ?>
            <h1>Reactivo hijo #<?php echo $model->id; ?></h1>
        <?php 
            } else {
        ?>
            <h1>Reactivo independiente #<?php echo $model->id; ?></h1>
        <?php } ?>
    </div>
</div>
<br />
<div class="row">
    <div class="span5 well">
        <b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
	<?php
            echo CHtml::encode($model->id);//13abr12_Cirenia
            /*echo CHtml::link(CHtml::encode($model->id), array('view', 'id'=>$model->id));*/
          ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('planteamiento')); ?>:</b>
	<?php echo $model->planteamiento; ?>
	<br />
    </div>
    <div class="span5 well">
        
	<b><?php echo CHtml::encode($model->getAttributeLabel('id_area')); ?>:</b>
	<?php echo CHtml::encode($model->id_area); ?>
	<br />
        
	<b><?php echo CHtml::encode($model->getAttributeLabel('id_desempeno')); ?>:</b>
	<?php echo CHtml::encode($model->id_desempeno); ?>
	<br />
        
	<b><?php echo CHtml::encode($model->getAttributeLabel('id_aprendizaje')); ?>:</b>
	<?php echo CHtml::encode($model->id_aprendizaje); ?>
	<br />
        
	<b><?php echo CHtml::encode($model->getAttributeLabel('id_competencia')); ?>:</b>
	<?php echo CHtml::encode($model->id_competencia); ?>
	<br />
        
        <b><?php echo CHtml::encode($model->getAttributeLabel('id_nivel_cognitivo')); ?>:</b>
	<?php echo CHtml::encode($model->id_nivel_cognitivo); ?>
	<br />
        
        <b><?php echo CHtml::encode($model->getAttributeLabel('id_estado')); ?>:</b>
	<?php echo CHtml::encode($model->id_estado); ?>
	<br />
        
	<b><?php echo CHtml::encode($model->getAttributeLabel('id_tipo_reactivo')); ?>:</b>
	<?php echo CHtml::encode($tipo_reactivo); ?>
	<br />
        
        <?php if($model->id_tipo_reactivo==2){ ?>
        <b><?php echo CHtml::encode($model->getAttributeLabel('id_padre')); ?>:</b>
	<?php echo CHtml::encode($model->id_padre); ?> <a href="<?php echo CController::createUrl('reactivo/' . $model->id_padre); ?>"><i class="icon-eye-open"></i></a>
	<br />
        <?php } ?>
        
        <b><?php echo "Número de respuestas"; ?>:</b>
	<?php echo CHtml::encode($num_respuestas); ?>
	<br />
        
        <b><?php echo CHtml::encode($model->getAttributeLabel('usuario_creador')); ?>:</b>
	<?php echo CHtml::encode($nombre_usuario_creador); ?>
	<br />

        <b><?php echo CHtml::encode($model->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode(date('d-m-Y',$model->fecha_creacion)); ?>
	<br />
        
        <b><?php echo CHtml::encode($model->getAttributeLabel('usuario_editor')); ?>:</b>
	<?php echo CHtml::encode($nombre_usuario_editor); ?>
	<br />

        <b><?php echo CHtml::encode($model->getAttributeLabel('fecha_edicion')); ?>:</b>
	<?php echo CHtml::encode(date('d-m-Y',$model->fecha_edicion)); ?>
	<br />
        
        <b><?php echo CHtml::encode($model->getAttributeLabel('observaciones')); ?>:</b>
        <?php echo CHtml::encode($model->observaciones); ?>
        <br />
        
        <b><?php echo CHtml::encode($model->getAttributeLabel('Archivo adjunto')); ?>:</b>
        <?php echo CHtml::link($model->archivo, Yii::app()->request->baseUrl. '/files/' . $model->archivo); ?>
        <br />

    </div>
</div>

RESPUESTAS
<div class="row">
    <div class="span10 well">
        <?php $respuestas =Respuesta::model()->findAll('id_reactivo=:id_reactivo', array(':id_reactivo'=>$model->id));?>
        <ol style="list-style-type: upper-latin;"><?php foreach($respuestas as $respuesta){ ?>
            <!--<div class="row">-->
                        <?php if($respuesta->correcta==true){ ?>
                            <?php $etiqueta="Respuesta correcta : <br />"; ?>
                            <li class="alert alert-success">
                        <?php } else { ?>
                            <?php $etiqueta="Respuesta incorrecta : <br />";?>
                            <li class="alert alert-error">
                        <?php } ?>
                            
                        <?php echo $etiqueta . $respuesta->argumento; ?>
                                </li>
                            <!--</div>
             </div>-->
        <?php } ?></ol>
    </div>
</div>
