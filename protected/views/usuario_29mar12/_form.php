<div class="form well">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'usuario-form',
        'enableAjaxValidation' => false,
            ));
    
    /*$resultado = Rol::model()->findAll();
    $roles = array();
    if ($resultado == null) {
        $roles['falso'] = "Sin resultados";
    }
    else {
        $roles['falso'] = "Seleccione una opción";
        foreach ($resultado as $key => $value) {
            $roles[$value->id] = $value->nombre;
        }
    }*/
    ?>

    <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

<?php echo $form->errorSummary($model); ?>
    <div class="row">
        <div class="span3">
            <div class="row">
                <?php echo $form->labelEx($model, 'apellido_paterno'); ?>
                <?php echo $form->textField($model, 'apellido_paterno', array('size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'apellido_paterno'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model, 'apellido_materno'); ?>
                <?php echo $form->textField($model, 'apellido_materno', array('size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'apellido_materno'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model, 'nombres'); ?>
                <?php echo $form->textField($model, 'nombres', array('size' => 25, 'maxlength' => 25)); ?>
                <?php echo $form->error($model, 'nombres'); ?>
            </div>
        </div>
        <div class="span3">
            <div class="row">
                <?php echo $form->labelEx($model, 'email'); ?>
                <?php echo $form->textField($model, 'email', array('size' => 60, 'maxlength' => 100)); ?>
                <?php echo $form->error($model, 'email'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model, 'password'); ?>
                <?php echo $form->passwordField($model, 'password', array('size' => 32, 'maxlength' => 32)); ?>
                <?php echo $form->error($model, 'password'); ?>
            </div>
            <div class="row">
                <?php echo $form->labelEx($model, 'id_rol'); ?>
                <?php echo $form->dropDownList($model, 'id_rol', $roles); /*echo $form->textField($model,'id_rol');*/ ?>
                <?php echo $form->error($model, 'id_rol'); ?>
            </div>
        </div>
            <?php /*
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
              <?php echo $form->labelEx($model,'ultimo_login'); ?>
              <?php echo $form->textField($model,'ultimo_login'); ?>
              <?php echo $form->error($model,'ultimo_login'); ?>
              </div>

              <div class="row">
              <?php echo $form->labelEx($model,'ultimo_logout'); ?>
              <?php echo $form->textField($model,'ultimo_logout'); ?>
              <?php echo $form->error($model,'ultimo_logout'); ?>
              </div>

              <div class="row">
              <?php echo $form->labelEx($model,'status'); ?>
              <?php echo $form->checkBox($model,'status'); ?>
              <?php echo $form->error($model,'status'); ?>
              </div>-->
             */ ?>

        
            <div class="span2 offset6" style="text-align: center;">
                <hr />
	<div class="row" style="margin-top:20px">
            
                <button class="btn btn-success" type="submit"><i class="icon-ok icon-white"></i> Guardar</button>
            </div>
        </div>
	</div>
	</div>


<?php $this->endWidget(); ?>

</div><!-- form -->