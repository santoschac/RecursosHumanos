<?php
session_start();
include ("../Modelo/Conexion.php");

if(isset($_SESSION['Usuario'])){
 }
 else{
  header('location:../Vistas/login.php');
 }
	
?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Corah RH</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../Recursos/img/favicon1.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,700,900" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/owl.carousel.css">
    <link rel="stylesheet" href="../Recursos/css/owl.theme.css">
    <link rel="stylesheet" href="../Recursos/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/normalize.css">
    <!-- meanmenu icon CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/meanmenu.min.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/main.css">
    <!-- educate icon CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/educate-custon-icon.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../Recursos/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../Recursos/css/calendar/fullcalendar.print.min.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/responsive.css">
    <!-- modals CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/modals.css">
    <!-- modernizr JS
		============================================ -->
    <script src="../Recursos/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
    <!-- Start Header menu area -->
    <div class="left-sidebar-pro">
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <a href="../Vistas/index.php"><img class="main-logo" src="../Recursos/img/logo/logocorah.png"
                        alt="" /></a>
                <strong><a href="../Vistas/index.php"><img src="../Recursos/img/logo/logocorah2.png"
                            alt="" /></a></strong>
            </div>
            <div class="left-custom-menu-adp-wrap comment-scrollbar">
                <nav class="sidebar-nav left-sidebar-menu-pro">
                <?php if($_SESSION['IdTipoUsuario']==1):?>
                    <ul class="metismenu" id="menu1">
                        <!-- <li class="active">
                            <a title="Empleados" href="../Vistas/Empleados.php" aria-expanded="false"><span
                                    class="educate-icon educate-professor icon-wrap" aria-hidden="true"></span> <span
                                    class="mini-click-non">Empleados</span></a>
                        </li> -->
                        <li >
                            <a title="Incidencias" class="has-arrow" href="Incidencias.php" aria-expanded="false"><span
                                    class="educate-icon educate-form icon-wrap" aria-hidden="true"></span> <span
                                    class="mini-click-non">Incidencias</span></a>
                                    <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Empleados" href="Empleados.php"><span class="mini-sub-pro">Empleados</span></a></li>
                                <li><a title="Incapacidad" href="#"><span class="mini-sub-pro">Incapacidad</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a title="Solicitudes"  href="Solicitudes.php" aria-expanded="false"><span
                                    class="educate-icon educate-data-table icon-wrap"></span> <span
                                    class="mini-click-non">Solicitudes</span></a>
                            
                        </li>
                        
                        <li>
                        <a title="Capacitación" href="../Vistas/Cambios.php" aria-expanded="false"><span
                                class="educate-icon educate-professor icon-wrap" aria-hidden="true"></span> <span
                                class="mini-click-non">Cambios</span></a>
                        </li>
                        <li>
                        <a title="Capacitación" href="../Vistas/Capacitacion.php" aria-expanded="false"><span
                                class="educate-icon educate-course icon-wrap" aria-hidden="true"></span> <span
                                class="mini-click-non">Capacitación</span></a>
                        </li>
                        <li>
                        <a title="Jornada" class="has-arrow" href="#" aria-expanded="false"><span
                                class="educate-icon educate-event icon-wrap" aria-hidden="true"></span> <span
                                class="mini-click-non">Jornada</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Jornada" href="../Vistas/Jornada.php"><span class="mini-sub-pro">Agregar Jornada</span></a></li>
                                <li><a title="Asignar jornada" href="../Vistas/AsignarJornada.php"><span class="mini-sub-pro">Asignar Jornada</span></a></li>
                                
                            </ul>
                        </li>
                        <li>
                            <a title="Configuración" class="has-arrow" href="mailbox.html" aria-expanded="false"><span
                                    class="educate-icon educate-data-table icon-wrap"></span> <span
                                    class="mini-click-non">Configuración</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Puestos" href="../Vistas/Puestos.php"><span class="mini-sub-pro">Puestos</span></a></li>
                                <li><a title="Cursos" href="../Vistas/Cursos.php"><span class="mini-sub-pro">Cursos</span></a></li>
                                <li><a title="Empresa" href="../Vistas/Empresa.php"><span class="mini-sub-pro">Empresa</span></a></li>
                                <li><a title="Sucursal" href="../Vistas/Sucursal.php"><span class="mini-sub-pro">Sucursal</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a title="Extra" class="has-arrow" href="#" aria-expanded="false"><span
                                    class="educate-icon educate-data-table icon-wrap"></span> <span
                                    class="mini-click-non">Extra</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="País" href="../Vistas/Pais.php"><span class="mini-sub-pro">País</span></a></li>
                                <li><a title="Estado" href="../Vistas/Estado.php"><span class="mini-sub-pro">Estado</span></a></li>
                                <li><a title="Población" href="../Vistas/Poblacion.php"><span class="mini-sub-pro">Población</span></a></li>
                                
                            </ul>
                        </li>
                    </ul>
                <?php endif; ?>

            <?php if($_SESSION['IdTipoUsuario']==2):?>
            
            <ul class="metismenu" id="menu1">
            <li>
                            <a title="Solicitud"  href="../VistasU/VAlta_Solicitud.php" aria-expanded="false"><span
                                    class="educate-icon educate-data-table icon-wrap"></span> <span
                                    class="mini-click-non">Solicitud</span></a>
                            
                        </li>
            </ul>

            <?php endif;?>




                </nav>
            </div>
        </nav>
    </div>
    <!-- End Header menu area -->
    <!-- Start Welcome area -->
    <div class="all-content-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo-pro">
                        <a href="index.html"><img class="main-logo" src="../Recursos/img/logo/logo.png" alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-advance-area">
            <div class="header-top-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="header-top-wraper">
                                <div class="row">
                                    <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                        <div class="menu-switcher-pro">
                                            <button type="button" id="sidebarCollapse"
                                                class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                                <i class="educate-icon educate-nav"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-7 col-sm-6 col-xs-12">
                                        <div class="header-top-menu tabl-d-n">
                                            <ul class="nav navbar-nav mai-top-nav">
                                                <li class="nav-item"><a href="../Vistas/index.php"
                                                        class="nav-link">Inicio</a>
                                                </li>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                                <li class="nav-item dropdown">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle"><i
                                                            class="educate-icon educate-message edu-chat-pro"
                                                            aria-hidden="true"></i><span
                                                            class="indicator-ms"></span></a>
                                                    <div role="menu"
                                                        class="author-message-top dropdown-menu animated zoomIn">
                                                        <div class="message-single-top">
                                                            <h1>Mensajes</h1>
                                                        </div>
                                                        <ul class="message-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="../Recursos/img/contact/1.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="../Recursos/img/contact/4.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="../Recursos/img/contact/3.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="message-img">
                                                                        <img src="../Recursos/img/contact/2.jpg" alt="">
                                                                    </div>
                                                                    <div class="message-content">
                                                                        <span class="message-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="message-view">
                                                            <a href="#">View All Messages</a>
                                                        </div>
                                                    </div>
                                                </li>
                                                <!-- <li class="nav-item"><a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle"><i
                                                            class="educate-icon educate-bell"
                                                            aria-hidden="true"></i><span
                                                            class="indicator-nt"></span></a>
                                                    <div role="menu"
                                                        class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notifications</h1>
                                                        </div>
                                                        <ul class="notification-menu">
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="educate-icon educate-checked edu-checked-pro admin-check-pro"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Advanda Cro</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-cloud edu-cloud-computing-down"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Sulaiman din</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-eraser edu-shield"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                            <li>
                                                                <a href="#">
                                                                    <div class="notification-icon">
                                                                        <i class="fa fa-line-chart edu-analytics-arrow"
                                                                            aria-hidden="true"></i>
                                                                    </div>
                                                                    <div class="notification-content">
                                                                        <span class="notification-date">16 Sept</span>
                                                                        <h2>Victor Jara</h2>
                                                                        <p>Please done this project as soon possible.
                                                                        </p>
                                                                    </div>
                                                                </a>
                                                            </li>
                                                        </ul>
                                                        <div class="notification-view">
                                                            <a href="#">View All Notification</a>
                                                        </div>
                                                    </div>
                                                </li> -->
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <img src="../Recursos/img/product/pro4.jpg" alt="" />
                                                        <span class="admin-name">
                                                            <?php echo $_SESSION['Usuario'] ?></span>
                                                        <i class="fa fa-angle-down edu-icon edu-down-arrow"></i>
                                                    </a>
                                                    <ul role="menu"
                                                        class="dropdown-header-top author-log dropdown-menu animated zoomIn">
                                                        <li><a href="../Vistas/MiPerfil.php"><span
                                                                    class="edu-icon edu-user-rounded author-log-ic"></span>Mi
                                                                Perfil</a>
                                                        </li>                                                        
                                                        <li>
                                                            <a class="Information Information-color mg-b-10" href="#"
                                                                data-toggle="modal"
                                                                data-target="#ConfirmarCerrarSecion">
                                                                <span class="edu-icon edu-locked author-log-ic"></span>Cerrar sesión
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <!--inicio modal-->
            <div id="ConfirmarCerrarSecion" class="modal modal-edu-general fullwidth-popup-InformationproModal fade"
                role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-close-area modal-close-df">
                            <!--<a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>-->
                        </div>
                        <div class="modal-body">
                            <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
                            <h2>¿Desea Cerrar Sesión?</h2>
                            <!-- <p>The Modal plugin is a dialog box/popup window that is displayed on top of the current
                                page</p> -->
                        </div>
                        <div class="modal-footer info-md">
                            <a data-dismiss="modal" href="#">Cancelar</a>
                            <a href="../Modelo/Cerrar_Sesion.php">Aceptar</a>
                        </div>
                    </div>
                </div>
            </div>
            <!--fin modal-->

            <!-- Mobile Menu start -->
            <div class="mobile-menu-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="mobile-menu">
                                <nav id="dropdown">
                                    <ul class="mobile-menu-nav">
                                        <!-- <li><a data-toggle="collapse" data-target="#Charts" href="#">Inicio <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul class="collapse dropdown-header-top">
                                                <li><a href="index.html">Dashboard v.1</a></li>
                                                <li><a href="index-1.html">Dashboard v.2</a></li>
                                                
                                            </ul>
                                        </li> -->
                                        <li><a href="index.php">Inicio</a></li>
                                        <li><a data-toggle="collapse" data-target="#demoevent" href="#">Empleados <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demoevent" class="collapse dropdown-header-top">
                                                <li><a href="Empleados.php">Empleados</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a href="Incidenias.php">Incidencias</a></li>
                                        <li><a data-toggle="collapse" data-target="#demo" href="#">Solicitudes<span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="demo" class="collapse dropdown-header-top">
                                                <li><a href="Acta_Sat.php">Acta sat</a>
                                                </li>
                                                <li><a href="#">Imss</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Miscellaneousmob" href="#">Cambios
                                                <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Miscellaneousmob" class="collapse dropdown-header-top">
                                                <li><a href="Cambios.php">Cambios</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Chartsmob" href="#">Capacitación
                                                <span class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Chartsmob" class="collapse dropdown-header-top">
                                                <li><a href="Capacitacion.php">Todos los cursos</a>
                                                </li>
                                                <li><a href="Alta_Capacitacion.php">Agregar curso</a>
                                                </li>
                                            </ul>
                                        </li>
                                        <li><a data-toggle="collapse" data-target="#Tablesmob"
                                                href="#">Empresa/Sucursal<span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Tablesmob" class="collapse dropdown-header-top">
                                                <li><a href="EmpresaSucursal.php">Empresa/Sucursal</a>
                                                </li>

                                            </ul>
                                        </li>
                                        <li><a href="Vacaciones.php">Vacaciones</a></li>
                                        <li><a data-toggle="collapse" data-target="#Pagemob" href="#">Ubicaciones <span
                                                    class="admin-project-icon edu-icon edu-down-arrow"></span></a>
                                            <ul id="Pagemob" class="collapse dropdown-header-top">
                                                <li><a href="Estado.php">Estado</a>
                                                </li>
                                                <li><a href="Poblacion.php">Población</a>
                                                </li>
                                                <li><a href="Region.php">Región</a>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>