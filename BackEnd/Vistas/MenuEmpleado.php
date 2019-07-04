<?php
include '../Master/Header.php';
include '../Modelo/Conexion.php';

$IdPersonal = $_GET['IdPersonal'];

$sql = 'SELECT * FROM personal WHERE IdPersonal=:IdPersonal';
$sentencia = $pdo->prepare($sql);
$sentencia->execute([':IdPersonal'=>$IdPersonal]);
$empleados = $sentencia->fetch(PDO::FETCH_OBJ);

$_SESSION['IdPersonal'] = $empleados->IdPersonal;

// $sql = $pdo->prepare('SELECT count(IdCambio) as Cantidad from cambios where IdPersonal = ?');
// $sql -> execute(array($IdPersonal));
// $resulCambios = $sql->fetch();




?>


<!-- Mobile Menu end -->
<div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <!-- <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form> -->
                                            <h4>Nombre: <?=$empleados->Nombre ." ". $empleados->ApellidoPaterno ." ". $empleados->ApellidoMaterno?></h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Inicio</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="Empleados.php">Empleados</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Menu</span>
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


<div class="widgets-programs-area">
            <div class="container-fluid">
                <div class="row">
                
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div  class="hpanel shadow-inner hbggreen bg-1 responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Información </h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-apps"></i>
                                </div>
                                <div class="m-t-xl widget-cl-1">
                                   
                                    <p style="color:white">Ver la información completa del empleado.</p>
                                            
                                </div>
                                <a href="Ver_Empleado.php"><button  class="btn btn-secondary" style="color:black">Más info</button></a>
                                
                            </div>
                           
                        </div>
                    </div>
                
                
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbgblue bg-2 responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Cambios</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-professor"></i>
                                </div>
                                <div class="m-t-xl widget-cl-2">
                                    
                                    <p style="color:white">Ver todos los cambios del empleado.</p>
                                </div>
                               <a href="Cambios_Empleado.php"> <button  class="btn btn-secondary" style="color:black">Más info</button></a>
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbgyellow bg-3 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Jornada laboral</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-department"></i>
                                </div>
                                <div class="m-t-xl widget-cl-3">
                                    
                                    <p style="color:white">Ver la jornada laboral del empleado.</p>
                                </div>
                                <a href="AsignarJornada_Empleado.php"><button  class="btn btn-secondary" style="color:black">Más info</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbgred bg-4 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Capacitación</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-message"></i>
                                </div>
                                <div class="m-t-xl widget-cl-4">
                                    
                                    <p style="color:white">
												Ver los cursos tomados por el empleado.</p>
                                </div>
                               <a href="Capacitacion_Empleado.php"> <button  class="btn btn-secondary" style="color:black">Más info</button></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br/>
        </div>

        <div class="widgets-programs-area">
            <div class="container-fluid">
                <div class="row">             
               
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div  class="hpanel shadow-inner hbggreen bg-1 responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Solicitudes </h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-data-table icon-wrap"></i>
                                </div>
                                <div class="m-t-xl widget-cl-1">
                                   
                                    <p style="color:white">Ver las solicitudes realizadas por el empleado.</p>
                                            
                                </div>
                                <a href="Solicitudes_Empleado.php"><button  class="btn btn-secondary" style="color:black">Más info</button></a>
                                
                            </div>
                           
                        </div>
                    </div>
                
                     <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbgblue bg-2 responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Bonos</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="fa fa-line-chart edu-bar-chart"></i>
                                </div>
                                <div class="m-t-xl widget-cl-2">
                                    
                                    <p style="color:white">Ver los Bonos recibidos por el empleado.</p>
                                </div>
                               <a href="Bonos_Empleado.php"> <button  class="btn btn-secondary" style="color:black">Más info</button></a>
                               
                            </div>
                        </div>
                    </div>
                   <!-- <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbgyellow bg-3 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Jornada laboral</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-department"></i>
                                </div>
                                <div class="m-t-xl widget-cl-3">
                                    
                                    <p style="color:white">Ver la jornada laboral del empleado.</p>
                                </div>
                                <a href="AsignarJornada_Empleado.php"><button  class="btn btn-secondary" style="color:black">Más info</button></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbgred bg-4 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Capacitación</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-message"></i>
                                </div>
                                <div class="m-t-xl widget-cl-4">
                                    
                                    <p style="color:white">
												Ver los cursos tomados por el empleado.</p>
                                </div>
                               <a href="Capacitacion_Empleado.php"> <button  class="btn btn-secondary" style="color:black">Más info</button></a>
                            </div>
                        </div>
                    </div> -->
                    
                </div>
            </div>
            <br/>
        </div>
        <br/><br/><br/><br/><br/>

<?php
include '../Master/Footer.php';
?>