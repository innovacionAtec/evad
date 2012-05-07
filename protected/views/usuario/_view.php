<?php

$data->ultimo_login = date('d-m-Y H:i', $data->ultimo_login);
$data->ultimo_logout = date('d-m-Y H:i', $data->ultimo_logout);
$data->nombres = $data->nombres . ' ' . $data->apellido_paterno . ' ' . $data->apellido_materno;
$resultado = Rol::model()->findAll();
$roles = array();
foreach ($resultado as $key => $value) {
    $roles[$value->id] = $value->nombre;
}
$resultado = area::model()->findAll();
$area = array();
foreach ($resultado as $key => $value) {
    $area[$value->id] = $value->nombre;
}
$status = array('falso' => 'Status de aprobación', 'todos' => 'TODOS', '0' => 'Inactivo', '1' => 'Activo');
?>

<div class="view">
    <div class="row well" style="margin-top:15px">
        <div class="span3">
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
                <?php /*echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id));*/
                        echo CHtml::encode($data->id);//28mar12_Cirenia
                ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('nombres')); ?>:</b>
                <?php echo CHtml::encode($data->nombres); ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
                <?php echo CHtml::encode($data->email); ?>
            </div>
        </div>
        <div class="span3">
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ultimo_login')); ?>:</b>
                <?php echo CHtml::encode($data->ultimo_login); ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('ultimo_logout')); ?>:</b>
                <?php echo CHtml::encode($data->ultimo_logout); ?>
            </div>
        </div>
        <div class="span3">
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_rol')); ?>:</b>
                <?php echo $roles[$data->id_rol]; ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
                <?php echo $status[$data->status]; ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id_area')); ?>:</b>
                <?php if($data->id_area)echo $area[$data->id_area]; ?>
            </div>
        </div>
        <div class="span1"><!--28mar12_Cirenia-->
            <script type="text/javascript">
                $(function(){ $(".icon")
                    .popover({
                        offset: 5,
                        placement: 'right'
                    });
                });
            </script>   
            <a href="<?php echo CController::createUrl('view', array('id'=>$data->id)); ?>" class="icon" data-content="Permite ver detalle del elemento" rel="popover" data-original-title="Info">
                <i class="icon-search"></i>
            </a>
            &nbsp;
            <a href="<?php echo CController::createUrl('update', array('id'=>$data->id)); ?>" class="icon" data-content="Permite editar el elemento" rel="popover" data-original-title="Info">
                <i class="icon-pencil"></i>
            </a>
            &nbsp;
            <!--<a href="<?php echo CController::createUrl('delete', array('id'=>$data->id)); ?>" class="icon" data-content="Permite eliminar el elemento" rel="popover" data-original-title="Info">-->
                <i class="icon-remove"></i>
            <!--</a>-->
        </div>
    </div>
</div>
