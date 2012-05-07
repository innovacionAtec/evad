<div class="form well">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'competencia-form',
        'enableAjaxValidation' => false,
            ));
    ?>

    <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="span5">
            
            <div class="row">
                <?php echo $form->labelEx($model, 'id_area'); ?>
                <?php echo $form->dropDownList($model, 'id_area', $areas); ?>
                <?php echo $form->error($model, 'id_area'); ?>
            </div>
            
            <div class="row">
                <?php echo $form->labelEx($model, 'nombre'); ?>
                <?php echo $form->textField($model, 'nombre', array('size' => 60, 'maxlength' => 250)); ?>
                <?php echo $form->error($model, 'nombre'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'descripcion'); ?>
                <?php echo $form->textArea($model, 'descripcion', array('rows' => 6, 'cols' => 50)); ?>
                <?php echo $form->error($model, 'descripcion'); ?>
            </div>

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
