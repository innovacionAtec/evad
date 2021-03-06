<?php
$data->fecha_creacion = date('d-m-Y', $data->fecha_creacion);
$data->fecha_edicion = date('d-m-Y', $data->fecha_edicion);
$nombre = Usuario::model()->findByPk($data->usuario_creador);
$nombre_creador = $nombre->nombres . ' ' . $nombre->apellido_paterno . ' ' . $nombre->apellido_materno;
$nombre = Usuario::model()->findByPk($data->usuario_editor);
$nombre_editor = $nombre->nombres . ' ' . $nombre->apellido_paterno . ' ' . $nombre->apellido_materno;
?>

<div class="view">
    <div class="row well" style="margin-top:15px">
        <div class="span3">
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
                <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
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
                <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
                <?php echo CHtml::encode($data->fecha_creacion); ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('fecha_edicion')); ?>:</b>
                <?php echo CHtml::encode($data->fecha_edicion); ?>
            </div>
        </div>
        <div class="span4">
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('usuario_creador')); ?>:</b>
                <?php echo CHtml::encode($data->usuario_creador); ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('usuario_editor')); ?>:</b>
                <?php echo CHtml::encode($data->usuario_editor); ?>
            </div>
        </div>
        <div class="span1">
            <i class="icon-pencil"></i>
            <i class="icon-remove"></i>
        </div>

        <?php /*
                  <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
                  <?php echo CHtml::encode($data->status); ?>
                  <br />

                 */ ?>

    </div>
</div>