<div class="row">
    <div class="span5">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <li class="active">Catálogos</li>
        </ul>
    </div>
</div>

<div class="row">
    <div class="span4 offset1">
      <div class="well">
        <ul class="nav nav-list">
          <li class="nav-header">Catálogos</li>
          <li class="active"><a href="<?php echo CController::createUrl('clasificacionTematica/index'); ?>">Clasificación temática</a></li>
          <li><a href="<?php echo CController::createUrl('estatusReactivo/index'); ?>">Estatus</a></li>
          <li><a href="<?php echo CController::createUrl('evaluacion/index'); ?>">Evaluación</a></li>
          <li><a href="<?php echo CController::createUrl('nivelDificultad/index'); ?>">Nivel de dificultad</a></li>
          <li><a href="<?php echo CController::createUrl('nivelTaxonomico/index'); ?>">Nivel taxonómico</a></li>
          <li><a href="<?php echo CController::createUrl('tipoReactivo/index'); ?>">Tipo de reactivo</a></li>
          <li class="nav-header">Administradores</li>
          <li><a href="<?php echo CController::createUrl('rol/index'); ?>">Rol</a></li>
          <li><a href="<?php echo CController::createUrl('usuario/index'); ?>">Usuario</a></li>
        </ul>
      </div>  
    </div>
</div>