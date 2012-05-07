<?php
/*$this->breadcrumbs=array(
	'Estatus Reactivos',
);

$this->menu=array(
	array('label'=>'Create EstatusReactivo', 'url'=>array('create')),
	array('label'=>'Manage EstatusReactivo', 'url'=>array('admin')),
);*/
?>

<div class="row">
    <div class="span5">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <li>
                <a href="<?php echo CController::createUrl('site/catalogos'); ?>">Catálogos</a> <span class="divider">/</span>
            </li>
            <li class="active">Estatus</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span4">
        <h1>Estatus</h1>
    </div>
    <div class="span2">
        <script type="text/javascript">
            $(function(){ $(".btn")
                .popover({
                    offset: 5,
                    placement: 'right'
                });
            });
        </script>
        <a href="<?php echo CController::createUrl('create'); ?>" class="btn btn-success" data-content="Permite agregar un nuevo elemento" rel="popover" data-original-title="Ayuda">
            <i class="icon-plus-sign icon-white"></i> Agregar
        </a>
    </div>
</div>

<div class="row">
    <div class="span12">
        <?php $this->widget('zii.widgets.CListView', array(
                'dataProvider'=>$dataProvider,
                'itemView'=>'_view',
        )); ?>
    </div>
</div>