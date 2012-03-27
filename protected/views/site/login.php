

<?php
/* $this->pageTitle=Yii::app()->name . ' - Login';
  $this->breadcrumbs=array(
  'Login',
  ); */
?>

<div class="row">
    <div class="span11 offset1">
        <div class="row">
            <div class="span11">
                <h1>Inicio de sesión</h1>
            </div>
        </div>
        <div class="row">
            <div class="span4">
                <p>Por favor llena los campos siguientes con tus datos:</p>
            </div>
        </div>

        <div class="row">
            <div class="span4">
                <div class="form well">
                    <?php
                    $form = $this->beginWidget('CActiveForm', array(
                        'id' => 'login-form',
                        'enableClientValidation' => true,
                        'clientOptions' => array(
                            'validateOnSubmit' => true,
                        ),
                            ));
                    ?>

                    <p class="note">Campos con <span class="required">*</span> son requeridos.</p>

                    <div class="row">
                        <?php echo $form->labelEx($model, 'username'); ?>
                        <?php echo $form->textField($model, 'username', array('placeholder' => 'ejemplo@iems.edu.mx', 'value' => '')); ?>
                        <?php echo $form->error($model, 'username'); ?>
                    </div>

                    <div class="row">
                        <?php echo $form->labelEx($model, 'password'); ?>
                        <?php echo $form->passwordField($model, 'password'); ?>
                        <?php echo $form->error($model, 'password'); ?>
                    </div>

                    <div class="row rememberMe">
                        <?php echo $form->checkBox($model, 'rememberMe'); ?>
                        <?php echo $form->label($model, 'rememberMe'); ?>
                        <?php echo $form->error($model, 'rememberMe'); ?>
                    </div>

                    <div class="row buttons">
                        <?php echo CHtml::submitButton('Iniciar sesion', array('class' => 'btn btn-success')); ?>
                    </div>

                    <?php $this->endWidget(); ?>
                </div><!-- form -->
            </div>
        </div>
    </div>
</div>