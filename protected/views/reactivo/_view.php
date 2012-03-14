<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('planteamiento')); ?>:</b>
	<?php echo CHtml::encode($data->planteamiento); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_estatus_reactivo')); ?>:</b>
	<?php echo CHtml::encode($data->id_estatus_reactivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_clasificacion_tematica')); ?>:</b>
	<?php echo CHtml::encode($data->id_clasificacion_tematica); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_tipo_reactivo')); ?>:</b>
	<?php echo CHtml::encode($data->id_tipo_reactivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_padre')); ?>:</b>
	<?php echo CHtml::encode($data->id_padre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_nivel_taxonomico')); ?>:</b>
	<?php echo CHtml::encode($data->id_nivel_taxonomico); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id_nivel_dificultad')); ?>:</b>
	<?php echo CHtml::encode($data->id_nivel_dificultad); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_evaluacion')); ?>:</b>
	<?php echo CHtml::encode($data->id_evaluacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('base_pregunta')); ?>:</b>
	<?php echo CHtml::encode($data->base_pregunta); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('observaciones')); ?>:</b>
	<?php echo CHtml::encode($data->observaciones); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('archivo')); ?>:</b>
	<?php echo CHtml::encode($data->archivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_creacion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_creacion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fecha_edicion')); ?>:</b>
	<?php echo CHtml::encode($data->fecha_edicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_creador')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_creador); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_editor')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_editor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contador_edicion')); ?>:</b>
	<?php echo CHtml::encode($data->contador_edicion); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	*/ ?>

</div>