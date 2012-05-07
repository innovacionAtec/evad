<?php
    $model->id_area= area::model()->findByPk($model->id_area)->nombre;
    $model->id_competencia= competencia::model()->findByPk($model->id_competencia)->nombre;
    $model->id_desempeno= desempeno::model()->findByPk($model->id_desempeno)->nombre;
    $tipo_reactivo= TipoReactivo::model()->findByPk($model->id_tipo_reactivo)->nombre;
    $model->id_estado= estado::model()->findByPk($model->id_estado)->nombre;
    $usuario= Usuario::model()->findByPk($model->usuario_creador);
    $nombre_usuario_creador= $usuario->nombres . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno;
    $usuario= Usuario::model()->findByPk($model->usuario_editor);
    $nombre_usuario_editor= $usuario->nombres . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno;
?>
<?php $this->pageTitle = CHtml::encode('EVAD | Reactivo ' . $model->id); ?>

<div class="row">
    <div class="span5">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <!--13abr12_Cirenia-->
            <li>
                <a href="<?php echo CController::createUrl('reactivo/indexPadre'); ?>">Reactivos padres</a> <span class="divider">/</span>
            </li>
            <li class="active">Reactivo padre #<?php echo $model->id; ?></li>
        </ul>
    </div>
    <div class="span4">
        <script type="text/javascript">
            $(function(){ $(".btn")
                .popover({
                    offset: 5,
                    placement: 'right'
                });
            });
        </script>
        <a href="<?php echo CController::createUrl('update', array('id' => $model->id, 'tipo' => 'padre')); ?>" class="btn btn-primary" data-content="Permite modificar el reactivo Padre" rel="popover" data-original-title="Ayuda">
            <i class="icon-refresh icon-white"></i> Modificar
        </a>
        <?php if (isset(Yii::app()->user->id_rol) && Yii::app()->user->id_rol<=2){ ?>
            <a class="btn btn-warning" data-toggle="modal" href="#eliminar"><i class="icon-remove icon-white"></i> Eliminar</a>
        <?php } ?>
        <div class="modal hide fade" id="eliminar" style="display: none;">
            <div class="modal-header">
                <a data-dismiss="modal" class="close">×</a>
                <h3>Eliminar reactivo padre # <?php echo $model->id; ?></h3>
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
    <div class="span4">
        <h1>Reactivo padre #<?php echo $model->id; ?></h1>
    </div>
</div>
<br />
<div class="row">
    <div class="span5 well">
        <b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
        <?php
        echo CHtml::encode($model->id); //13abr12_Cirenia
        /* echo CHtml::link(CHtml::encode($model->id), array('view', 'id'=>$model->id)); */
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

        <b><?php echo CHtml::encode($model->getAttributeLabel('id_competencia')); ?>:</b>
        <?php echo CHtml::encode($model->id_competencia); ?>
        <br />

        <b><?php echo CHtml::encode($model->getAttributeLabel('id_desempeno')); ?>:</b>
        <?php echo CHtml::encode($model->id_desempeno); ?>
        <br />

        <b><?php echo CHtml::encode($model->getAttributeLabel('id_estado')); ?>:</b>
        <?php echo CHtml::encode($model->id_estado); ?>
        <br />

        <b><?php echo "Número de hijos"; ?>:</b>
        <?php echo CHtml::encode($num_hijos); ?>
        <br />

        <b><?php echo CHtml::encode($model->getAttributeLabel('usuario_creador')); ?>:</b>
        <?php echo CHtml::encode($nombre_usuario_creador); ?>
        <br />

        <b><?php echo CHtml::encode($model->getAttributeLabel('fecha_creacion')); ?>:</b>
        <?php echo CHtml::encode(date('d-m-Y', $model->fecha_creacion)); ?>
        <br />

        <b><?php echo CHtml::encode($model->getAttributeLabel('usuario_editor')); ?>:</b>
        <?php echo CHtml::encode($nombre_usuario_editor); ?>
        <br />

        <b><?php echo CHtml::encode($model->getAttributeLabel('fecha_edicion')); ?>:</b>
        <?php echo CHtml::encode(date('d-m-Y', $model->fecha_edicion)); ?>
        <br />
        
        <b><?php echo CHtml::encode($model->getAttributeLabel('observaciones')); ?>:</b>
        <?php echo CHtml::encode($model->observaciones); ?>
        <br />
        
        <b><?php echo CHtml::encode($model->getAttributeLabel('Archivo adjunto')); ?>:</b>
        <?php echo CHtml::link($model->archivo, Yii::app()->request->baseUrl. '/files/' . $model->archivo); ?>
        <br />

    </div>
</div>

REACTIVOS HIJOS
<div class="row">
    <div class="span10 well">
        <?php $reactivos = Reactivo::model()->findAll('id_padre=:id_padre AND status=true', array(':id_padre' => $model->id)); ?>
        <?php foreach ($reactivos as $reactivo) { ?>
            <div class="span9 row alert alert-info">
                <div class="span7">
                    <b>Planteamiento :</b> <?php echo $reactivo->planteamiento; ?> 
                </div>
                <div class="span1">
                    <a href="<?php echo CController::createUrl('reactivo/' . $reactivo->id); ?>"><i class="icon-eye-open"></i></a>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<div class="row">
    <div class="span10 well">
        <a href="<?php echo CController::createUrl('reactivo/create', array('id_padre' => $model->id)) ?>" class="btn btn-inverse">Agregar reactivo hijo</a>
    </div>
</div>