<div class="row">
    <div class="span5">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="<?php echo CController::createUrl('site/catalogos'); ?>">Catálogos</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="<?php echo CController::createUrl('nivelTaxonomico/index'); ?>">Nivel Taxonómico</a> <span class="divider">/</span>
            </li>
            <li class="active">Nuevo</li>
        </ul>
    </div>
</div>

<?php
/*
  $this->breadcrumbs=array(
  'Nivel Taxonomicos'=>array('index'),
  'Create',
  );

  $this->menu=array(
  array('label'=>'List NivelTaxonomico', 'url'=>array('index')),
  array('label'=>'Manage NivelTaxonomico', 'url'=>array('admin')),
  );
 */
?>

<div class="row">
    <div class="span7">
        <h1>Agregar Nuevo Nivel Taxonómico</h1>
    </div>
</div>

<div class="row">
    <div class="span7 offset1">
        <?php echo $this->renderPartial('_form', array('model' => $model)); ?>
    </div>
</div>
