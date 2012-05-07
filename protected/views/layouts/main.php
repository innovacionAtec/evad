<!DOCTYPE html>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/bootstrap.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap/mod_bootstrap.css" />


        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery-1.7.2.js"></script>

        <script type="text/javascript" src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap/bootstrap.min.js"></script>


        <title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

    <body data-spy="scroll" data-target=".subnav" data-offset="50">


        <!-- Navbar
    ================================================== -->

        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>
                    <a class="brand" href="<?php echo CController::createUrl('site/index'); ?>"><img height="20px;"src="<?php echo Yii::app()->request->baseUrl; ?>/images/logoIEMS-2.png">EVAD</a>
                    <div class="nav-collapse">
                        <ul class="nav">
                            <?php if (!Yii::app()->user->isGuest) { ?>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Reactivo <b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li class="nav-header">
                                            Ver
                                        </li>
                                        <li><a href="<?php echo CController::createUrl('reactivo/indexPadre'); ?>">Reactivos padres</a></li><!--Ver reactivos padres-->
                                        <li><a href="<?php echo CController::createUrl('reactivo/index'); ?>">Reactivos independientes</a></li><!--Ver reactivos independientes-->
                                        <li class="nav-header">
                                            Crear
                                        </li>
                                        <li><a href="<?php echo CController::createUrl('reactivo/create', array('tipo' => 'padre')); ?>">Reactivo padre</a></li>
                                        <!--<li><a href="<?php //echo CController::createUrl('reactivo/create');   ?>">Reactivo hijo</a></li>-->
                                        <li><a href="<?php echo CController::createUrl('reactivo/create'); ?>">Reactivo independiente</a></li>
                                        <!--<li class="divider"></li>
                                        <li><a href="#">Edición reactivo</a></li>-->
                                    </ul>
                                </li>
                            <?php } ?>
                            <?php if (isset(Yii::app()->user->id_rol) && Yii::app()->user->id_rol <= 2) { /* ?>
                                <li class="">
                                    <a href="<?php echo CController::createUrl('site/login'); ?>">Carga de parámetros</a>
                                </li>
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Inventarios<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Elaboradores</a></li>
                                        <li><a href="#">Competencia matemática</a></li>
                                        <li><a href="#">Competencia comprensión-lectora</a></li>
                                        <!--<li class="divider"></li>
                                        <li><a href="<?php //echo CController::createUrl('site/catalogos');   ?>">Catalogos</a></li>-->
                                    </ul>
                                </li>
                                <!--<li class="divider-vertical"></li>-->
                                <li class="dropdown">
                                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">Evaluación<b class="caret"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="#">Carga automática</a></li>
                                        <li><a href="#">Consulta y edición</a></li>
                                    </ul>
                                </li>
                            <?php */ } ?>
                            <?php if (isset(Yii::app()->user->id_rol) && Yii::app()->user->id_rol == 1) { ?>
                                <li class="">
                                    <a href="<?php echo CController::createUrl('site/catalogos'); ?>">Catálogos</a>
                                </li>
                            <?php } ?>
                        </ul>
                        <ul class="nav pull-right">
                            <?php if (Yii::app()->user->isGuest) { ?>
                                <li class="">
                                    <a href="<?php echo CController::createUrl('site/login'); ?>"><i class="icon-user icon-white"></i> Iniciar sesión</a>
                                </li>
                            <?php } else { ?>
                                <li class="">
                                    <a href="<?php echo CController::createUrl('site/logout'); ?>"><i class="icon-user icon-white"></i> Cerrar sesión <?php echo '(' . Rol::model()->findByPk(Yii::app()->user->id_rol)->nombre . ' - ' . Yii::app()->user->name . ')'; ?></a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar
    ================================================== -->

        <!-- header
    ================================================== -->

        <!--<header class="jumbotron subhead" id="overview">
            <h1 style="text-align: center; font-size:54px">EVAD</h1>
        </header>-->

        <!-- Contenido
    ================================================== -->

        <div class="container content">



            <?php if (isset($this->breadcrumbs)): ?>
                <?php
                $this->widget('zii.widgets.CBreadcrumbs', array(
                    'links' => $this->breadcrumbs,
                ));
                ?><!-- breadcrumbs -->
            <?php endif ?>


            <?php echo $content; ?>

        </div>

        <!-- Footer
================================================== -->
        <!--<div class="container content">-->
        <footer class="footer">
            <div class="container content" style="min-height:0">
                <p class="pull-right"><a href="#">Ir a arriba</a></p>
                <p style="text-align: center; color: #d2d1d1; font-weight: bold; text-shadow:1px 0px 1px #000;">Desarrollado por el Instituto de Eduación Media Superior del DF <a href="http://estudiantes.iems.edu.mx" target="_blank">Estudiantes</a> <a href="http://academicos.iems.edu.mx" target="_blank">Académicos</a>.</p>
            </div>
        </footer>
        <!--</div>-->

    </body>
</html>
