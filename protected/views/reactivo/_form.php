<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'reactivo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'planteamiento'); ?>
		<?php echo $form->textArea($model,'planteamiento',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'planteamiento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_estatus_reactivo'); ?>
		<?php echo $form->textField($model,'id_estatus_reactivo'); ?>
		<?php echo $form->error($model,'id_estatus_reactivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_clasificacion_tematica'); ?>
		<?php echo $form->textField($model,'id_clasificacion_tematica'); ?>
		<?php echo $form->error($model,'id_clasificacion_tematica'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_tipo_reactivo'); ?>
		<?php echo $form->textField($model,'id_tipo_reactivo'); ?>
		<?php echo $form->error($model,'id_tipo_reactivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_padre'); ?>
		<?php echo $form->textField($model,'id_padre'); ?>
		<?php echo $form->error($model,'id_padre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_nivel_taxonomico'); ?>
		<?php echo $form->textField($model,'id_nivel_taxonomico'); ?>
		<?php echo $form->error($model,'id_nivel_taxonomico'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_nivel_dificultad'); ?>
		<?php echo $form->textField($model,'id_nivel_dificultad'); ?>
		<?php echo $form->error($model,'id_nivel_dificultad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'id_evaluacion'); ?>
		<?php echo $form->textField($model,'id_evaluacion'); ?>
		<?php echo $form->error($model,'id_evaluacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'base_pregunta'); ?>
		<?php echo $form->textArea($model,'base_pregunta',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'base_pregunta'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'observaciones'); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'archivo'); ?>
		<?php echo $form->textField($model,'archivo',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'archivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_creacion'); ?>
		<?php echo $form->textField($model,'fecha_creacion'); ?>
		<?php echo $form->error($model,'fecha_creacion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fecha_edicion'); ?>
		<?php echo $form->textField($model,'fecha_edicion'); ?>
		<?php echo $form->error($model,'fecha_edicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario_creador'); ?>
		<?php echo $form->textField($model,'usuario_creador'); ?>
		<?php echo $form->error($model,'usuario_creador'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario_editor'); ?>
		<?php echo $form->textField($model,'usuario_editor'); ?>
		<?php echo $form->error($model,'usuario_editor'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contador_edicion'); ?>
		<?php echo $form->textField($model,'contador_edicion'); ?>
		<?php echo $form->error($model,'contador_edicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->