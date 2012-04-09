<div class="form well">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'nivel-dificultad-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

	<?php echo $form->errorSummary($model); ?>
        <div class="row">
        <div class="span5">
	<div class="row">
		<?php echo $form->labelEx($model,'nombre'); ?>
		<?php echo $form->textField($model,'nombre',array('size'=>60,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'nombre'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textArea($model,'descripcion',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<!--<div class="row">
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
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->checkBox($model,'status'); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>-->

        <hr />
            
	<div class="row" style="margin-top:20px">
            <div class="span6" style="text-align: center;">
                <button class="btn btn-success" type="submit"><i class="icon-ok icon-white"></i> Guardar</button>
            </div>
        </div>
	</div>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->