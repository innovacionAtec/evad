<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'planteamiento'); ?>
		<?php echo $form->textArea($model,'planteamiento',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_estatus_reactivo'); ?>
		<?php echo $form->textField($model,'id_estatus_reactivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_clasificacion_tematica'); ?>
		<?php echo $form->textField($model,'id_clasificacion_tematica'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_tipo_reactivo'); ?>
		<?php echo $form->textField($model,'id_tipo_reactivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_padre'); ?>
		<?php echo $form->textField($model,'id_padre'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_nivel_taxonomico'); ?>
		<?php echo $form->textField($model,'id_nivel_taxonomico'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_nivel_dificultad'); ?>
		<?php echo $form->textField($model,'id_nivel_dificultad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id_evaluacion'); ?>
		<?php echo $form->textField($model,'id_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'base_pregunta'); ?>
		<?php echo $form->textArea($model,'base_pregunta',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'archivo'); ?>
		<?php echo $form->textField($model,'archivo',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fecha_edicion'); ?>
		<?php echo $form->textField($model,'fecha_edicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_creador'); ?>
		<?php echo $form->textField($model,'usuario_creador'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_editor'); ?>
		<?php echo $form->textField($model,'usuario_editor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'contador_edicion'); ?>
		<?php echo $form->textField($model,'contador_edicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->checkBox($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->