<?php
/*$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Usuario', 'url'=>array('index')),
	array('label'=>'Create Usuario', 'url'=>array('create')),
	array('label'=>'Update Usuario', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Usuario', 'url'=>array('admin')),
);*/
?>
<?php $this->pageTitle = CHtml::encode('EVAD | Detalle usuario'); ?>
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
                <a href="<?php echo CController::createUrl('usuario/index'); ?>">Usuario</a> <span class="divider">/</span>
            </li>
            <li class="active">Detalle</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span7">
        <h1>Detalle de usuario #<?php echo $model->id; ?></h1>
    </div>
</div>

<?php
    $model->fecha_creacion = date('d-m-Y H:i', $model->fecha_creacion);
    $model->fecha_edicion = date('d-m-Y H:i', $model->fecha_edicion);
    $model->ultimo_login = date('d-m-Y H:i', $model->ultimo_login);
    $model->ultimo_logout = date('d-m-Y H:i', $model->ultimo_logout);
    $resultado = Rol::model()->findAll();
    $roles = array();
    if ($resultado == null) {
        $roles['falso'] = "Sin resultados";
    } else {
        $roles['falso'] = "Seleccione una opción";
        foreach ($resultado as $key => $value) {
            $roles[$value->id] = $value->nombre;
        }
    }
?>

<div class="row" style="margin-top: 20px;">
    <div class="span12">
        <div class="span3 well">
            <b><?php echo CHtml::encode($model->getAttributeLabel('nombres')); ?>:</b>
            <?php echo $model->nombres . ' ' . $model->apellido_paterno . ' ' . $model->apellido_materno; ?>
            <br />
            <b><?php echo CHtml::encode($model->getAttributeLabel('email')); ?>:</b>
            <?php echo CHtml::encode($model->email); ?>
        </div>
        <div class="span3 well">
            <b><?php echo CHtml::encode($model->getAttributeLabel('ultimo_login')); ?>:</b>
            <?php echo CHtml::encode($model->ultimo_login); ?>
            <br />
            <b><?php echo CHtml::encode($model->getAttributeLabel('ultimo_logout')); ?>:</b>
            <?php echo CHtml::encode($model->ultimo_logout); ?>
        </div>
        <div class="span4 well">
            <b><?php echo CHtml::encode($model->getAttributeLabel('id_rol')); ?>:</b>
            <?php echo $roles[$model->id_rol]; ?>
            <br />
            <b><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:</b>
            <?php echo CHtml::encode($model->status); ?>
        </div>
    </div>
</div>
<div class="row">
    <div class="span11">
        <p class="alert alert-info pull-right">
            <script type="text/javascript">
                $(function(){ $(".icon")
                    .popover({
                        offset: 5,
                        placement: 'right'
                    });
                });
            </script>
            &nbsp;&nbsp;
            <a href="<?php echo CController::createUrl('update', array('id'=>$model->id)); ?>" class="icon" data-content="Permite editar el elemento" rel="popover" data-original-title="Info">
                <i class="icon-pencil"></i>
            </a>
            &nbsp;
            <!--<a href="<?php echo CController::createUrl('delete', array('id'=>$model->id)); ?>" class="icon" data-content="Permite eliminar el elemento" rel="popover" data-original-title="Info">-->
                <i class="icon-remove"></i>
            <!--</a>-->
            &nbsp;
            <a href="<?php echo CController::createUrl('index'); ?>" class="icon" data-content="Ir a la página anterior" rel="popover" data-original-title="Info">
                <i class="icon-chevron-left"></i>
            </a>
        </p>

    <?php /*
      <b><?php echo CHtml::encode($model->getAttributeLabel('status')); ?>:</b>
      <?php echo CHtml::encode($model->status); ?>
      <br />

     */ ?>

    </div>
</div>