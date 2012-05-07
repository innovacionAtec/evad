<?php
/*$this->breadcrumbs=array(
	'Aprendizajes'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List aprendizaje', 'url'=>array('index')),
	array('label'=>'Create aprendizaje', 'url'=>array('create')),
	array('label'=>'Update aprendizaje', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete aprendizaje', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage aprendizaje', 'url'=>array('admin')),
);*/
?>

<?php $this->pageTitle = CHtml::encode('EVAD | Detalle aprendizaje'); ?>
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
            <li class="active">Detalle</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span7">
        <h1>Detalle de aprendizaje #<?php echo $model->id; ?></h1>
    </div>
</div>

<?php
$model->fecha_creacion = date('d-m-Y H:i', $model->fecha_creacion);
$model->fecha_edicion = date('d-m-Y H:i', $model->fecha_edicion);
$nombre = Usuario::model()->findByPk($model->usuario_creador);
$nombre_creador = $nombre->nombres . ' ' . $nombre->apellido_paterno . ' ' . $nombre->apellido_materno;
$nombre = Usuario::model()->findByPk($model->usuario_editor);
$nombre_editor = $nombre->nombres . ' ' . $nombre->apellido_paterno . ' ' . $nombre->apellido_materno;
$desempeno= desempeno::model()->findByPk($model->id_desempeno)->nombre;
$nivel_cognitivo= nivel_cognitivo::model()->findByPk($model->id_nivel_cognitivo)->nombre;
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

            <b><?php echo CHtml::encode($model->getAttributeLabel('id_desempeno')); ?>:</b>
            <?php echo CHtml::encode($desempeno); ?>
            <br />
            <b><?php echo CHtml::encode($model->getAttributeLabel('id_nivel_cognitivo')); ?>:</b>
            <?php echo CHtml::encode($nivel_cognitivo); ?>
        </div>
        <div class="span4 well">
            <b><?php echo CHtml::encode($model->getAttributeLabel('usuario_creador')); ?>:</b>
            <?php echo CHtml::encode($nombre_creador); ?>
            <br />
            <b><?php echo CHtml::encode($model->getAttributeLabel('usuario_editor')); ?>:</b>
            <?php echo CHtml::encode($nombre_editor); ?>
            <br />
            <b><?php echo CHtml::encode($model->getAttributeLabel('fecha_creacion')); ?>:</b>
            <?php echo CHtml::encode($model->fecha_creacion); ?>
            <br />
            <b><?php echo CHtml::encode($model->getAttributeLabel('fecha_edicion')); ?>:</b>
            <?php echo CHtml::encode($model->fecha_edicion); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="span11">
        <p class="alert alert-info pull-right">
            <script type="text/javascript">
                $(function(){ $(".icon")
                    .popover({
                        offset: 5,
                        placement: 'left'
                    });
                });
            </script>
            &nbsp;&nbsp;
            <a href="<?php echo CController::createUrl('update', array('id'=>$model->id)); ?>" class="icon" data-content="Permite editar el elemento" rel="popover" data-original-title="Info">
                <i class="icon-pencil"></i>
            </a>
            &nbsp;
            <!--<a href="<?php echo CController::createUrl('delete', array('id'=>$model->id)); ?>" class="icon" data-content="Permite eliminar el elemento" rel="popover" data-original-title="Info">-->
                <i class="icon-remove"></i>
            <!--</a>-->
            &nbsp;
            <a href="<?php echo CController::createUrl('index'); ?>" class="icon" data-content="Ir a la página anterior" rel="popover" data-original-title="Info">
                <i class="icon-chevron-left"></i>
            </a>
        </p>
        
    <?php /*
      <b><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:</b>
      <?php echo CHtml::encode($model->status); ?>
      <br />

     */ ?>

    </div>
</div>