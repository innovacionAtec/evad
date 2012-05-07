<?php
$data->fecha_creacion = date('d-m-Y H:i', $data->fecha_creacion);
$data->fecha_edicion = date('d-m-Y H:i', $data->fecha_edicion);
$nombre = Usuario::model()->findByPk($data->usuario_creador);
$nombre_creador = $nombre->nombres . ' ' . $nombre->apellido_paterno . ' ' . $nombre->apellido_materno;
$nombre = Usuario::model()->findByPk($data->usuario_editor);
$nombre_editor = $nombre->nombres . ' ' . $nombre->apellido_paterno . ' ' . $nombre->apellido_materno;
$desempeno= desempeno::model()->findByPk($data->id_desempeno)->nombre;
$nivel_cognitivo= nivel_cognitivo::model()->findByPk($data->id_nivel_cognitivo)->nombre;
?>

<div class="view">
    <div class="row well" style="margin-top:15px">
        <div class="span3">
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
                <?php
                /* echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); */
                echo CHtml::encode($data->id); //28mar12_Cirenia
                ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('nombre')); ?>:</b>
                <?php echo CHtml::encode($data->nombre); ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('descripcion')); ?>:</b>
                <?php echo CHtml::encode($data->descripcion); ?>
            </div>
        </div>
        <div class="span3">
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_desempeno')); ?>:</b>
                <?php echo CHtml::encode($desempeno); ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_nivel_cognitivo')); ?>:</b>
                <?php echo CHtml::encode($nivel_cognitivo); ?>
            </div>
        </div>
        <div class="span4">
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('usuario_creador')); ?>:</b>
                <?php echo CHtml::encode($nombre_creador); ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('usuario_editor')); ?>:</b>
                <?php echo CHtml::encode($nombre_editor); ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
                <?php echo CHtml::encode($data->fecha_creacion); ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_edicion')); ?>:</b>
                <?php echo CHtml::encode($data->fecha_edicion); ?>
            </div>
        </div>
        <div class="span1"><!--28mar12_Cirenia-->
            <script type="text/javascript">
                $(function(){ $(".icon")
                    .popover({
                        offset: 5,
                        placement: 'left'
                    });
                });
            </script>   
            <a href="<?php echo CController::createUrl('view', array('id' => $data->id)); ?>" class="icon" data-content="Permite ver detalle del elemento" rel="popover" data-original-title="Info">
                <i class="icon-search"></i>
            </a>
            &nbsp;
            <a href="<?php echo CController::createUrl('update', array('id' => $data->id)); ?>" class="icon" data-content="Permite editar el elemento" rel="popover" data-original-title="Info">
                <i class="icon-pencil"></i>
            </a>
            &nbsp;
            <!--<a href="<?php echo CController::createUrl('delete', array('id' => $data->id)); ?>" class="icon" data-content="Permite eliminar el elemento" rel="popover" data-original-title="Info">-->
            <i class="icon-remove"></i>
            <!--</a>-->
        </div>

        <?php /*
          <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
          <?php echo CHtml::encode($data->status); ?>
          <br />

         */ ?>

    </div>
</div>
