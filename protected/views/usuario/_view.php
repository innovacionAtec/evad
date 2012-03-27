<?php
$data->ultimo_login = date('d-m-Y', $data->ultimo_login);
$data->ultimo_logout = date('d-m-Y', $data->ultimo_logout);
$data->nombres = $data->nombres . ' ' . $data->apellido_paterno . ' ' . $data->apellido_materno;
$resultado = Rol::model()->findAll();
$rol = array();
foreach ($resultado as $key => $value) {
    $rol[$value->id] = $value->nombre;
}
?>

<div class="view">
    <div class="row well" style="margin-top:15px">
        <div class="span3">
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
                <?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id' => $data->id)); ?>
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
                <?php echo $rol[$data->id_rol]; ?>
            </div>
            <div class="row">
                <b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
                <?php echo CHtml::encode($data->status); ?>
            </div>
        </div>
        <div class="span1">
            <i class="icon-pencil"></i>
            <i class="icon-remove"></i>
        </div>
    </div>
</div>
