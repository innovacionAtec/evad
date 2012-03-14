<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'respuesta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_reactivo'); ?>
		<?php echo $form->textField($model,'id_reactivo'); ?>
		<?php echo $form->error($model,'id_reactivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'archivo'); ?>
		<?php echo $form->textField($model,'archivo',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'archivo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'argumento'); ?>
		<?php echo $form->textArea($model,'argumento',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'argumento'); ?>
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
		<?php echo $form->labelEx($model,'correcta'); ?>
		<?php echo $form->checkBox($model,'correcta'); ?>
		<?php echo $form->error($model,'correcta'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->