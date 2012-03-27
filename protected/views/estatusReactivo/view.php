
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
                <a href="<?php echo CController::createUrl('estatusReactivo/index'); ?>">Estatus</a> <span class="divider">/</span>
            </li>
            <li class="active">Detalle</li>
        </ul>
    </div>
</div>


<div class="row">
    <div class="span7">
        <h1>Detalle de Estatus #<?php echo $model->id; ?></h1>
    </div>
</div>

<?php
$model->fecha_creacion = date('d-m-Y', $model->fecha_creacion);
$model->fecha_edicion = date('d-m-Y', $model->fecha_edicion);
$nombre = Usuario::model()->findByPk($model->usuario_creador);
$nombre_creador = $nombre->nombres . ' ' . $nombre->apellido_paterno . ' ' . $nombre->apellido_materno;
$nombre = Usuario::model()->findByPk($model->usuario_editor);
$nombre_editor = $nombre->nombres . ' ' . $nombre->apellido_paterno . ' ' . $nombre->apellido_materno;
?>

<div class="row" style="margin-top: 20px;">
    <div class="span12">
        <div class="span3 well">
            <b><?php echo CHtml::encode($model->getAttributeLabel('nombre')); ?>:</b>
            <?php echo CHtml::encode($model->nombre); ?>
            <br />
            <b><?php echo CHtml::encode($model->getAttributeLabel('descripcion')); ?>:</b>
            <?php echo CHtml::encode($model->descripcion); ?>
        </div>
        <div class="span3 well">

            <b><?php echo CHtml::encode($model->getAttributeLabel('fecha_creacion')); ?>:</b>
            <?php echo CHtml::encode($model->fecha_creacion); ?>
            <br />
            <b><?php echo CHtml::encode($model->getAttributeLabel('fecha_edicion')); ?>:</b>
            <?php echo CHtml::encode($model->fecha_edicion); ?>
        </div>
        <div class="span4 well">
            <b><?php echo CHtml::encode($model->getAttributeLabel('usuario_creador')); ?>:</b>
            <?php echo CHtml::encode($nombre_creador); ?>
            <br />
            <b><?php echo CHtml::encode($model->getAttributeLabel('usuario_editor')); ?>:</b>
            <?php echo CHtml::encode($nombre_editor); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="span11">
        <p class="alert alert-info pull-right">
            <i class="icon-pencil"></i>
            <i class="icon-remove"></i>
        </p>

    <?php /*
      <b><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:</b>
      <?php echo CHtml::encode($model->status); ?>
      <br />

     */ ?>

    </div>
</div>