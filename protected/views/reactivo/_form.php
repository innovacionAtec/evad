<div class="form well">

    <?php
    $form = $this->beginWidget('CActiveForm', array(
        'id' => 'reactivo-form',
        'enableAjaxValidation' => false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
            ));
    ?>

    <p class="note">Campos con <span class="required">*</span> son obligatorios.</p>

    <?php echo $form->errorSummary(array($model, $respuesta)); ?>
    <div class="row">
    <div class="span6">
        <div class="row">
            <?php echo $form->labelEx($model, 'planteamiento'); ?>
            <?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
		    "model"=>$model,                # Data-Model
		    "attribute"=>'planteamiento',         # Attribute in the Data-Model
		    "height"=>'400px',
		    "width"=>'100%',
		    "toolbarSet"=>'Default',          # EXISTING(!) Toolbar (see: fckeditor.js)
		    "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
                                    # Path to fckeditor.php
		    "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                                    # Realtive Path to the Editor (from Web-Root)
		    "config" => array(
		        "EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
                                                                   
    			) ); ?>
            <?php /*echo $form->textArea($model, 'planteamiento', array('rows' => 6, 'style' => 'width:90%; max-width:100%;'));*/ ?>
            
            <?php echo $form->error($model, 'planteamiento'); ?>
        </div>
    </div>
    <div class="span5">
        <div class="row">
            <?php echo $form->labelEx($model, 'id_estatus_reactivo'); ?>
            <?php echo $form->dropDownList($model, 'id_estatus_reactivo', $estatus_reactivo); ?>
            <?php echo $form->error($model, 'id_estatus_reactivo'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'id_clasificacion_tematica'); ?>
            <?php echo $form->dropDownList($model, 'id_clasificacion_tematica', $clasificacion_tematica); ?>
            <?php echo $form->error($model, 'id_clasificacion_tematica'); ?>
        </div>

        <!--<div class="row">
            <?php echo $form->labelEx($model, 'id_tipo_reactivo'); ?>
            <?php echo $form->dropDownList($model, 'id_tipo_reactivo', $tipo_reactivo); ?>
            <?php echo $form->error($model, 'id_tipo_reactivo'); ?>
        </div>-->

        <!--<div class="row">
        <?php echo $form->labelEx($model, 'id_padre'); ?>
        <?php echo $form->textField($model, 'id_padre'); ?>
        <?php echo $form->error($model, 'id_padre'); ?>
        </div>-->

        <div class="row">
            <?php echo $form->labelEx($model, 'id_nivel_taxonomico'); ?>
            <?php echo $form->dropDownList($model, 'id_nivel_taxonomico', $nivel_taxonomico); ?>
            <?php echo $form->error($model, 'id_nivel_taxonomico'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model, 'id_nivel_dificultad'); ?>
            <?php echo $form->dropDownList($model, 'id_nivel_dificultad', $nivel_dificultad); ?>
            <?php echo $form->error($model, 'id_nivel_dificultad'); ?>
        </div>

        <!--<div class="row">
        <?php echo $form->labelEx($model, 'id_evaluacion'); ?>
        <?php echo $form->dropDownList($model, 'id_evaluacion', $evaluacion); ?>
        <?php echo $form->error($model, 'id_evaluacion'); ?>
        </div>-->

        <!--<div class="row">
        <?php echo $form->labelEx($model, 'base_pregunta'); ?>
        <?php echo $form->textField($model, 'base_pregunta'); ?>
        <?php echo $form->error($model, 'base_pregunta'); ?>
        </div>-->

        <div class="row">
            <?php echo $form->labelEx($model, 'archivo'); ?>
            <?php echo $form->fileField($model, 'archivo'); ?>
            <?php echo $form->error($model, 'archivo'); ?>
        </div>
        
        <?php if (!$model->isNewRecord) { ?>

        <div class="row">
            <?php echo $form->labelEx($model, 'observaciones'); ?>
            <?php echo $form->textArea($model, 'observaciones'); ?>
            <?php echo $form->error($model, 'observaciones'); ?>
        </div>

        <?php } ?>
    </div>

    <!--<div class="row">
    <?php echo $form->labelEx($model, 'fecha_creacion'); ?>
    <?php echo $form->textField($model, 'fecha_creacion'); ?>
    <?php echo $form->error($model, 'fecha_creacion'); ?>
    </div>-->

    <!--<div class="row">
    <?php echo $form->labelEx($model, 'fecha_edicion'); ?>
    <?php echo $form->textField($model, 'fecha_edicion'); ?>
    <?php echo $form->error($model, 'fecha_edicion'); ?>
    </div>-->

    <!--<div class="row">
    <?php echo $form->labelEx($model, 'usuario_creador'); ?>
    <?php echo $form->textField($model, 'usuario_creador'); ?>
    <?php echo $form->error($model, 'usuario_creador'); ?>
    </div>-->

    <!--<div class="row">
    <?php echo $form->labelEx($model, 'usuario_editor'); ?>
    <?php echo $form->textField($model, 'usuario_editor'); ?>
    <?php echo $form->error($model, 'usuario_editor'); ?>
    </div>-->

    <!--<div class="row">
    <?php echo $form->labelEx($model, 'contador_edicion'); ?>
    <?php echo $form->textField($model, 'contador_edicion'); ?>
    <?php echo $form->error($model, 'contador_edicion'); ?>
    </div>-->

    <!--<div class="row">
    <?php echo $form->labelEx($model, 'status'); ?>
    <?php echo $form->checkBox($model, 'status'); ?>
    <?php echo $form->error($model, 'status'); ?>
    </div>-->
    </div>
    
    <hr />
    
    <div class="row">
        <div class="span8">
            <?php for($i=1;$i<=4;$i++){ ?>
            <div class="row">
                <?php if($i==1){ ?>
                <?php echo $form->radioButton($respuesta,'correcta', array('value'=>$i, 'uncheckValue'=>null)); ?>
                <? } else{ ?>
                <?php echo $form->radioButton($respuesta,'correcta', array('value'=>$i, 'uncheckValue'=>null)); ?>
                <? } ?>
                <?php echo CHtml::label('Respuesta ' . $i, 'respuesta['.$i.']'); ?>
                <?php echo $form->textArea($respuesta,'argumento['.$i.']', array('rows' => 6, 'style' => 'width:90%; max-width:100%;')); ?>
                <?php /*$this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
		    "model"=>$respuesta,                # Data-Model
		    "attribute"=>'argumento['.$i.']',         # Attribute in the Data-Model
		    "height"=>'400px',
		    "width"=>'100%',
		    "toolbarSet"=>'Default',          # EXISTING(!) Toolbar (see: fckeditor.js)
		    "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
                                    # Path to fckeditor.php
		    "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                                    # Realtive Path to the Editor (from Web-Root)
		    "config" => array(
		        "EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
                                                                   
    			) );*/ ?>
            </div>
            <?php } ?>
            <div id="link_mas">
                <span class="label label-info">Añadir más</span>
            </div>
            <div  id="mas">
                <?php for($i=5;$i<=7;$i++){ ?>
                <div class="row">
                    <?php echo $form->radioButton($respuesta,'correcta', array('value'=>$i, 'uncheckValue'=>null)); ?>
                    <?php echo CHtml::label('Respuesta ' . $i, 'respuesta['.$i.']'); ?>
                    <?php echo $form->textArea($respuesta,'argumento['.$i.']', array('rows' => 6, 'style' => 'width:90%; max-width:100%;')); ?>
                </div>
                <?php } ?>
            </div>
            <?php if(empty($respuesta->argumento[5]) && empty($respuesta->argumento[6]) && empty($respuesta->argumento[7])){ ?>
            <script type="text/javascript">
                $('#mas').hide();
            </script>
            <?php } else{ ?>
                <script type="text/javascript">
                $('#link_mas').hide();
            </script>
            <?php } ?>
            <script type="text/javascript">
                //$('#mas').hide();
                $('#link_mas').click(function() {
                  $('#mas').toggle();
                  $('#link_mas').toggle();
                }); 
            </script>
        </div>
    </div>
    
    <hr />
    
    <div class="row" style="margin-top:20px">
        <div class="span12" style="text-align: center;">
            <button class="btn btn-success" type="submit"><i class="icon-ok icon-white"></i> Guardar</button>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->