<?php
session_start();
include ("../Modelo/Conexion.php");

if(isset($_SESSION['Usuario'])){
 }
 else{
  header('location:../Vistas/login.php');
 }

 $sql1 = $pdo->prepare('SELECT count(IdSolicitudes) as Cantidad from solicitudes where  Estatus="Espera"');
$sql1 -> execute();
$CantidadSolicitudes = $sql1->fetch();

$sql2 = $pdo->prepare('SELECT count(IdViatico) as Cantidad from viaticos where  Comprobado="Espera"');
$sql2 -> execute();
$CantidadViaticos = $sql2->fetch();
    

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
    <!-- <link rel="stylesheet" href="../Recursos/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../Recursos/css/calendar/fullcalendar.print.min.css"> -->
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

<!--apartir de aqui los puse para ver lo de excel-->
    <script src="../Recursos/js/jquery-3.2.1.min.js"></script>
    <!-- normalize CSS para la tabla
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">
   
</head>

<body>
   
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
                            <a title="Incidencias" class="has-arrow" href="#" aria-expanded="false"><span
                                    class="educate-icon educate-form icon-wrap" aria-hidden="true"></span> <span
                                    class="mini-click-non">Incidencias</span></a>
                                    <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Empleados" href="Empleados.php"><span class="mini-sub-pro">Empleados</span></a></li>
                                <li><a title="Incapacidad" href="Incapacidad.php"><span class="mini-sub-pro">Incapacidad</span></a></li>
                                <li><a title="Bonos" href="Bonos.php"><span class="mini-sub-pro">Bonos</span></a></li>

                                <li><a title="Permisos" class="has-arrow" aria-expanded="false" href="#"><span class="mini-sub-pro">Permisos</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Permisos" href="Permisos.php"><span class="mini-sub-pro">Permisos</span></a></li>
                                <li><a title="Permiso por  hora" href="Permisos_Hora.php"><span class="mini-sub-pro">Permisos por hora</span></a></li>
                                </ul></li>
                                
                                <li><a title="Horas Extras" href="Horas_Extras.php"><span class="mini-sub-pro">Horas Extras</span></a></li>
                                <li><a title="Accidentes" href="Accidentes.php"><span class="mini-sub-pro">Accidentes</span></a></li>
                                <li><a title="Faltas" href="Faltas.php"><span class="mini-sub-pro">Faltas</span></a></li>
                                <li><a title="Viajes" href="Viajes.php"><span class="mini-sub-pro">Viajes</span></a></li>
                                <li><a title="Viáticos" href="Viaticos.php"><span class="mini-sub-pro">Viáticos</span></a></li>
                                <li><a title="Vacaciones" href="Vacaciones.php"><span class="mini-sub-pro">Vacaciones</span></a></li>

                                <li><a title="Comisiones" class="has-arrow" aria-expanded="false" href="Comisiones.php"><span class="mini-sub-pro">Comisiones</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Porecentaje Comisiones" href="Porcentaje_Comision.php"><span class="mini-sub-pro">Porcentaje comisión</span></a></li>
                                <li><a title="Comisión" href="Comision.php"><span class="mini-sub-pro">Comisión</span></a></li>
                                </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a title="Solicitudes"  href="Solicitudes.php" aria-expanded="false"><span
                                    class="educate-icon educate-data-table icon-wrap"></span> <span
                                    class="mini-click-non">Solicitudes</span></a>
                            
                        </li>
                        
                        <li>
                        <a title="Cambios" href="../Vistas/Cambios.php" aria-expanded="false"><span
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
                            <a title="Configuración" class="has-arrow" href="#" aria-expanded="false"><span class="glyphicon">&#xe019;</span> <span
                                    class="mini-click-non">Configuración</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Puestos" href="../Vistas/Puestos.php"><span class="mini-sub-pro">Puestos</span></a></li>
                                <li><a title="Cursos" href="../Vistas/Cursos.php"><span class="mini-sub-pro">Cursos</span></a></li>
                                <li><a title="Empresa" href="../Vistas/Empresa.php"><span class="mini-sub-pro">Empresa</span></a></li>
                                <li><a title="Sucursal" href="../Vistas/Sucursal.php"><span class="mini-sub-pro">Sucursal</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a title="Ubicación" class="has-arrow" href="#" aria-expanded="false"><span
                                    class="educate-icon educate-data-table icon-wrap"></span> <span
                                    class="mini-click-non">Ubicación</span></a>
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
                    <a title="Solicitud" href="../VistasU/Solicitudes.php" aria-expanded="false"><span
                            class="educate-icon educate-data-table icon-wrap"></span> <span
                            class="mini-click-non">Solicitudes</span></a>
                </li>
                <li>
                    <a title="Viáticos"  href="../VistasU/Viaticos.php" aria-expanded="false">
                    <span class="educate-icon educate-professor icon-wrap"></span> 
                    <span class="mini-click-non">Viáticos</span></a>
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
                        <a href="../Vistas/index.php"><img class="main-logo" src="../Recursos/img/logo/logo.png" alt="" /></a>
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
                                                <?php if($_SESSION['IdTipoUsuario']==1):?>
                                                <li class="nav-item"><a href="../Vistas/Empleados.php"
                                                        class="nav-link">Empleados</a>
                                                </li>
                                                
                                                <?php endif;?>

                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
                                        <div class="header-right-info">
                                            <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                               
                                                <!--Apartado de notificaciones---> 
                                                
                                               <?php if($_SESSION['IdTipoUsuario']==1):?>
                                                <li class="nav-item"><a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle"><i
                                                            class="educate-icon educate-bell"
                                                            aria-hidden="true"></i> <?php if($CantidadSolicitudes['Cantidad']!=0):?><span class="indicator-nt"></span><?php endif;?><?php if($CantidadViaticos['Cantidad']!=0):?><span class="indicator-nt"></span><?php endif;?></a>
                                                    <div role="menu"
                                                        class="notification-author dropdown-menu animated zoomIn">
                                                        <div class="notification-single-top">
                                                            <h1>Notificaciones</h1>
                                                        </div>
                                                        <?php if($CantidadSolicitudes['Cantidad']!=0){?>
                                                                                                                     
                                                                <a style="color:black" href="../Vistas/Solicitudes.php">                                                                    
                                                                    
                                                                    <div class="notification-content">
                                                                        <div class="row">
                                                                            <div class="col-md-1"></div>
                                                                            <div class="col-md-2">
                                                                            <img src="../Recursos/img/palomita.png" alt="" /> 
                                                                            </div>
                                                                            <div class="col-md-9"><p><strong><?php echo $CantidadSolicitudes['Cantidad']?> Solicitudes Pendientes</strong></p>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </a>
                                                                <br/>
                                                            
                                                            <?php }?>
                                                            <?php if($CantidadViaticos['Cantidad']!=0){?>
                                                                                                                
                                                                <a style="color:black" href="../Vistas/Viaticos.php">                                                                    
                                                                    
                                                                    <div class="notification-content">
                                                                        <div class="row">
                                                                        <div class="col-md-1"></div>
                                                                            <div class="col-md-2">
                                                                            <img src="../Recursos/img/palomita.png" alt="" />
                                                                            </div>
                                                                            <div class="col-md-9"><p><strong> <?php echo $CantidadViaticos['Cantidad']?> Viáticos Pendientes</strong></p>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                    </div>
                                                                </a>
                                                                <br/>                                                           
                                                            

                                                           <?php }?>
                                                        <?php if($CantidadSolicitudes['Cantidad']==0 && $CantidadViaticos['Cantidad']==0) {?>
                                                            <strong>No hay notificaciones.</strong><br/><br/>
                                                            <?php }?>
                                                       
                                                       
                                                    </div>
                                                </li> 
                                                <?php endif; ?>

                                                
                                                
                                             <!--Fin Apartado de notificaciones--->
                                                <li class="nav-item">
                                                    <a href="#" data-toggle="dropdown" role="button"
                                                        aria-expanded="false" class="nav-link dropdown-toggle">
                                                        <img src="../Recursos/img/iconousuario.png" alt="" />
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

        <style>
            #mdialTamanio{
            width: 37% !important;
            }
        </style>
            <!--inicio modal-->
            <div id="ConfirmarCerrarSecion" class="modal modal-edu-general default-popup-PrimaryModal fade"
                role="dialog">
                <div class="modal-dialog" id="mdialTamanio">
                    <div class="modal-content">
                        <div class="modal-close-area modal-close-df">
                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                        </div>
                        <div class="modal-body">
                            <span class="educate-icon educate-info modal-check-pro information-icon-pro"> </span>
                            <h2>¿Desea Cerrar Sesión?</h2>
                            
                        </div>
                        <div class="modal-footer info-md">
                            <a data-dismiss="modal"  href="#">Cancelar</a>
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
                                <?php if($_SESSION['IdTipoUsuario']==1){?>
                                    <ul class="mobile-menu-nav">
                                       
                                    <li >
                            <a title="Incidencias" class="has-arrow"  aria-expanded="false"><span
                                    class="educate-icon educate-form icon-wrap" aria-hidden="true"></span> <span
                                    class="mini-click-non">Incidencias</span></a>
                                    <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Empleados" href="Empleados.php"><span class="mini-sub-pro">Empleados</span></a></li>
                                <li><a title="Incapacidad" href="Incapacidad.php"><span class="mini-sub-pro">Incapacidad</span></a></li>
                                <li><a title="Bonos" href="Bonos.php"><span class="mini-sub-pro">Bonos</span></a></li>

                                <li><a title="Permisos" class="has-arrow" aria-expanded="false" href="#"><span class="mini-sub-pro">Permisos</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Permisos" href="Permisos.php"><span class="mini-sub-pro">Permisos</span></a></li>
                                <li><a title="Permiso por  hora" href="Permisos_Hora.php"><span class="mini-sub-pro">Permisos por hora</span></a></li>
                                </ul></li>
                                
                                <li><a title="Horas Extras" href="Horas_Extras.php"><span class="mini-sub-pro">Horas Extras</span></a></li>
                                <li><a title="Accidentes" href="Accidentes.php"><span class="mini-sub-pro">Accidentes</span></a></li>
                                <li><a title="Faltas" href="Faltas.php"><span class="mini-sub-pro">Faltas</span></a></li>
                                <li><a title="Viajes" href="Viajes.php"><span class="mini-sub-pro">Viajes</span></a></li>
                                <li><a title="Viáticos" href="Viaticos.php"><span class="mini-sub-pro">Viáticos</span></a></li>
                                <li><a title="Vacaciones" href="Vacaciones.php"><span class="mini-sub-pro">Vacaciones</span></a></li>

                                <li><a title="Comisiones" class="has-arrow" aria-expanded="false" href="Comisiones.php"><span class="mini-sub-pro">Comisiones</span></a>
                                <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Porecentaje Comisiones" href="Porcentaje_Comision.php"><span class="mini-sub-pro">Porcentaje comisión</span></a></li>
                                <li><a title="Comisión" href="Comision.php"><span class="mini-sub-pro">Comisión</span></a></li>
                                </ul>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a title="Solicitudes"  href="Solicitudes.php" aria-expanded="false"><span
                                    class="educate-icon educate-data-table icon-wrap"></span> <span
                                    class="mini-click-non">Solicitudes</span></a>
                            
                        </li>
                        
                        <li>
                        <a title="Cambios" href="../Vistas/Cambios.php" aria-expanded="false"><span
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
                            <a title="Configuración" class="has-arrow" href="#" aria-expanded="false"><span class="glyphicon">&#xe019;</span> <span
                                    class="mini-click-non">Configuración</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="Puestos" href="../Vistas/Puestos.php"><span class="mini-sub-pro">Puestos</span></a></li>
                                <li><a title="Cursos" href="../Vistas/Cursos.php"><span class="mini-sub-pro">Cursos</span></a></li>
                                <li><a title="Empresa" href="../Vistas/Empresa.php"><span class="mini-sub-pro">Empresa</span></a></li>
                                <li><a title="Sucursal" href="../Vistas/Sucursal.php"><span class="mini-sub-pro">Sucursal</span></a></li>
                            </ul>
                        </li>
                        <li>
                            <a title="Ubicación" class="has-arrow" href="#" aria-expanded="false"><span
                                    class="educate-icon educate-data-table icon-wrap"></span> <span
                                    class="mini-click-non">Ubicación</span></a>
                            <ul class="submenu-angle" aria-expanded="false">
                                <li><a title="País" href="../Vistas/Pais.php"><span class="mini-sub-pro">País</span></a></li>
                                <li><a title="Estado" href="../Vistas/Estado.php"><span class="mini-sub-pro">Estado</span></a></li>
                                <li><a title="Población" href="../Vistas/Poblacion.php"><span class="mini-sub-pro">Población</span></a></li>
                                
                            </ul>
                        </li>
                                    
                <?php }else{?>
                                            
                <ul class="metismenu" id="menu1">
                    <li>
                        <a title="Solicitud" href="../VistasU/Solicitudes.php" aria-expanded="false"><span
                                class="educate-icon educate-data-table icon-wrap"></span> <span
                                class="mini-click-non">Solicitudes</span></a>
                    </li>
                    <li>
                        <a title="Viáticos"  href="../VistasU/Viaticos.php" aria-expanded="false">
                        <span class="educate-icon educate-professor icon-wrap"></span> 
                        <span class="mini-click-non">Viáticos</span></a>
                    </li>
                    
                </ul>
                  
            <?php } ?>
                               
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>