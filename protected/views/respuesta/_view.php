<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('id_reactivo')); ?>:</b>
	<?php echo CHtml::encode($data->id_reactivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('archivo')); ?>:</b>
	<?php echo CHtml::encode($data->archivo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('argumento')); ?>:</b>
	<?php echo CHtml::encode($data->argumento); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('usuario_editor')); ?>:</b>
	<?php echo CHtml::encode($data->usuario_editor); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('correcta')); ?>:</b>
	<?php echo CHtml::encode($data->correcta); ?>
	<br />

	*/ ?>

</div>