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
        <?php if (!isset($_GET['id_padre']) && $model->id_padre==0) { ?>
        
            <div class="row">
                <?php echo $form->labelEx($model, 'id_area'); ?>
                <?php echo $form->dropDownList($model, 'id_area', $area); ?>
                <?php echo $form->error($model, 'id_area'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'id_competencia'); ?>
                <?php echo $form->dropDownList($model, 'id_competencia', $competencia); ?>
                <?php echo $form->error($model, 'id_competencia'); ?>
            </div>

            <div class="row">
                <?php echo $form->labelEx($model, 'id_desempeno'); ?>
                <?php echo $form->dropDownList($model, 'id_desempeno', $desempeno); ?>
                <?php echo $form->error($model, 'id_desempeno'); ?>
            </div>
        
        <?php } ?>
        
        <div class="row">
            <?php echo $form->labelEx($model, 'id_aprendizaje'); ?>
            <?php echo $form->dropDownList($model, 'id_aprendizaje', $aprendizaje); ?>
            <?php echo $form->error($model, 'id_aprendizaje'); ?>
        </div>
        
        <div class="row">
            <?php echo $form->labelEx($model, 'id_nivel_cognitivo'); ?>
            <?php echo $form->dropDownList($model, 'id_nivel_cognitivo', $nivel_cognitivo); ?>
            <?php echo $form->error($model, 'id_nivel_cognitivo'); ?>
        </div>
        
        <?php if (!isset($_GET['id_padre']) && $model->id_padre==0) { ?>
        
            <div class="row">
                <?php echo $form->labelEx($model, 'id_estado'); ?>
                <?php echo $form->dropDownList($model, 'id_estado', $estado); ?>
                <?php echo $form->error($model, 'id_estado'); ?>
            </div>
        
        <?php } ?>

        <div class="row">
            <?php echo $form->labelEx($model, 'archivo'); ?>
            <?php echo $form->fileField($model, 'archivo'); ?>
            <?php echo $form->error($model, 'archivo'); ?>
        </div>
        
        <?php if (!$model->isNewRecord && (isset(Yii::app()->user->id_rol) && Yii::app()->user->id_rol<=2)) { ?>

            <div class="row">
                <?php echo $form->labelEx($model, 'observaciones'); ?>
                <?php echo $form->textArea($model, 'observaciones'); ?>
                <?php echo $form->error($model, 'observaciones'); ?>
            </div>

        <?php } ?>
    </div>

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
                <?php /*echo $form->textArea($respuesta,'argumento['.$i.']', array('rows' => 6, 'style' => 'width:90%; max-width:100%;'));*/ ?>
                <?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
		    //"model"=>$respuesta,                # Data-Model
		    //"attribute"=>'argumento['.$i.']',         # Attribute in the Data-Model
		    "name"=>'Respuesta[argumento]['.$i.']',         # Solo pone nombre
		    "value"=>$respuesta->argumento[$i],
                    "height"=>'200px',
		    "width"=>'100%',
		    "toolbarSet"=>'Default',          # EXISTING(!) Toolbar (see: fckeditor.js)
		    "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
                                    # Path to fckeditor.php
		    "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                                    # Realtive Path to the Editor (from Web-Root)
		    "config" => array(
		        "EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
                                                                   
    			) ); ?>
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
                    <?php /*echo $form->textArea($respuesta,'argumento['.$i.']', array('rows' => 6, 'style' => 'width:90%; max-width:100%;'));*/ ?>
                    <?php $this->widget('application.extensions.fckeditor.FCKEditorWidget',array(
		    //"model"=>$respuesta,                # Data-Model
		    //"attribute"=>'argumento['.$i.']',         # Attribute in the Data-Model
		    "name"=>'Respuesta[argumento]['.$i.']',         # Solo pone nombre
		    "value"=>$respuesta->argumento[$i],
                    "height"=>'200px',
		    "width"=>'100%',
		    "toolbarSet"=>'Default',          # EXISTING(!) Toolbar (see: fckeditor.js)
		    "fckeditor"=>Yii::app()->basePath."/../fckeditor/fckeditor.php",
                                    # Path to fckeditor.php
		    "fckBasePath"=>Yii::app()->baseUrl."/fckeditor/",
                                    # Realtive Path to the Editor (from Web-Root)
		    "config" => array(
		        "EditorAreaCSS"=>Yii::app()->baseUrl.'/css/index.css',),
                                                                   
    			) ); ?>
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
            <?php if (!$model->isNewRecord) { ?>
                <a href="<?php echo CController::createUrl('view', array('reactivo/view', 'id'=>$model->id)); ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Cancelar</a>
            <?php } else { ?>
                <a href="<?php echo CController::createUrl('index'); ?>" class="btn btn-danger"><i class="icon-remove icon-white"></i> Cancelar</a>
            <?php } ?>
        </div>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->