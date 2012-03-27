<?php
/*$this->breadcrumbs=array(
	'Reactivos'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Reactivo', 'url'=>array('index')),
	array('label'=>'Create Reactivo', 'url'=>array('create')),
	array('label'=>'Update Reactivo', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Reactivo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Reactivo', 'url'=>array('admin')),
);*/
?>
<?php $this->pageTitle = CHtml::encode('EVAD | Reactivo '. $model->id); ?>

<div class="row">
    <div class="span5">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="<?php echo CController::createUrl('reactivo/index'); ?>">Reactivos</a> <span class="divider">/</span>
            </li>
            <li class="active">Nuevo</li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="span4">
        <h1>Reactivo #<?php echo $model->id; ?></h1>
    </div>
</div>

<div class="row">
    <div class="span5 well">
        <b><?php echo CHtml::encode($model->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($model->id), array('view', 'id'=>$model->id)); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('planteamiento')); ?>:</b>
	<?php echo $model->planteamiento; ?>
	<br />
    </div>
    <div class="span5 well">
	<b><?php echo CHtml::encode($model->getAttributeLabel('id_estatus_reactivo')); ?>:</b>
	<?php echo CHtml::encode($model->id_estatus_reactivo); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('id_clasificacion_tematica')); ?>:</b>
	<?php echo CHtml::encode($model->id_clasificacion_tematica); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('id_tipo_reactivo')); ?>:</b>
	<?php echo CHtml::encode($model->id_tipo_reactivo); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('id_padre')); ?>:</b>
	<?php echo CHtml::encode($model->id_padre); ?>
	<br />

	<b><?php echo CHtml::encode($model->getAttributeLabel('id_nivel_taxonomico')); ?>:</b>
	<?php echo CHtml::encode($model->id_nivel_taxonomico); ?>
	<br />
    </div>
</div>
RESPUESTAS
<div class="row">
    <div class="span10 well">
        <?php $respuestas =Respuesta::model()->findAll('id_reactivo=:id_reactivo', array(':id_reactivo'=>$model->id));?>
        <?php foreach($respuestas as $respuesta){ ?>
        <div class="row">
                <?php if($respuesta->correcta==true){ ?>
                        <div class="span8 alert alert-success">
                <?php } else { ?>
                        <div class="span8 alert alert-error">
                <?php } ?>
                    Respuesta : <?php echo $respuesta->argumento; ?> 
                    </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php /*$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'planteamiento',
		'id_estatus_reactivo',
		'id_clasificacion_tematica',
		'id_tipo_reactivo',
		'id_padre',
		'id_nivel_taxonomico',
		'id_nivel_dificultad',
		'id_evaluacion',
		'base_pregunta',
		'observaciones',
		'archivo',
		'fecha_creacion',
		'fecha_edicion',
		'usuario_creador',
		'usuario_editor',
		'contador_edicion',
		'status',
	),
));*/ ?>