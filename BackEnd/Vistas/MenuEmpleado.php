<?php
include '../Master/Header.php';
include '../Modelo/Conexion.php';

$IdPersonal = $_GET['IdPersonal'];

$sql = 'SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, p.IdPuesto, p.IdUsuario, p.IdSucursal, p.IdPoblacion, po.NombrePoblacion, e.IdEstado, e.NombreEstado, pa.IDPais, pa.NombrePais, s.NombreSucursal, em.IdEmpresa, Em.NombreEmpresa
FROM personal p
inner join poblacion po on p.IdPoblacion = po.IdPoblacion
inner join estado e on po.IdEstado = e.IdEstado
inner join pais pa on e.IDPais = pa.IDPais
inner join sucursal s on p.IdSucursal = s.IdSucursal
inner join empresa em on s.IdEmpresa = em.IdEmpresa where IdPersonal= :IdPersonal';
$sentencia = $pdo->prepare($sql);
$sentencia->execute([':IdPersonal'=>$IdPersonal]);
$empleados = $sentencia->fetch(PDO::FETCH_OBJ);

$_SESSION['IdPersonal'] = $empleados->IdPersonal;

// $sql = $pdo->prepare('SELECT count(IdCambio) as Cantidad from cambios where IdPersonal = ?');
// $sql -> execute(array($IdPersonal));
// $resulCambios = $sql->fetch();

$sql1 = $pdo->prepare("SELECT count(IdPersonal) as cantidad FROM cambios where IdPersonal = $IdPersonal");
$sql1 -> execute();
$CantidadCambios = $sql1->fetch();

$sql2 = $pdo->prepare("SELECT count(IdPersonal) as cantidad FROM capacitacion where IdPersonal = $IdPersonal");
$sql2 -> execute();
$CantidadCapacitacion = $sql2->fetch();

$sql3 = $pdo->prepare("SELECT count(IdPersonal) as cantidad FROM solicitudes where IdPersonal = $IdPersonal");
$sql3 -> execute();
$CantidadSolicitudes = $sql3->fetch();

$sql4 = $pdo->prepare("SELECT count(IdPersonal) as cantidad FROM bonos where IdPersonal = $IdPersonal");
$sql4 -> execute();
$CantidadBonos = $sql4->fetch();

$sql5 = $pdo->prepare("SELECT count(IdPersonal) as cantidad FROM permisos where IdPersonal = $IdPersonal");
$sql5 -> execute();
$CantidadPermisos = $sql5->fetch();

$sql6 = $pdo->prepare("SELECT count(IdPersonal) as cantidad FROM permisoshora where IdPersonal = $IdPersonal");
$sql6 -> execute();
$CantidadPermisosHora = $sql6->fetch();

$sql7 = $pdo->prepare("SELECT count(IdPersonal) as cantidad FROM faltas where IdPersonal = $IdPersonal");
$sql7 -> execute();
$CantidadFaltas = $sql7->fetch();

$sql8 = $pdo->prepare("SELECT count(IdPersonal) as cantidad FROM viajes where IdPersonal = $IdPersonal");
$sql8 -> execute();
$CantidadViajes = $sql8->fetch();

$sql9 = $pdo->prepare("SELECT count(IdPersonal) as cantidad FROM viaticos where IdPersonal = $IdPersonal");
$sql9 -> execute();
$CantidadViaticos= $sql9->fetch();

$sql10 = $pdo->prepare("SELECT c.IdComision, c.MontoCobrado, c.MontoComision, c.IdComisionPorcentaje, c.Fecha, c.Porcentaje, count(por.IdPersonal) as cantidad
from comision c
inner join comisionporcentaje por on c.IdComisionPorcentaje = por.IdComisionPorcentaje   where por.IdPersonal = $IdPersonal");
$sql10 -> execute();
$CantidadComision= $sql10->fetch();
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
                                            <strong>Nombre: </strong><?=$empleados->Nombre ." ". $empleados->ApellidoPaterno ." ". $empleados->ApellidoMaterno?>&nbsp;&nbsp;&nbsp;
                                            <strong>Empresa: </strong><?=$empleados->NombreEmpresa?>&nbsp;&nbsp;&nbsp;
                                            <strong>Sucursal: </strong><?=$empleados->NombreSucursal?>
                                        
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
                                    <h4 style="color:white">Información</h4>
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
                                    <h4 style="color:white">Cambios (<?php echo $CantidadCambios['cantidad']?>)</h4>
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
                                    <h4 style="color:white">Capacitación (<?php echo $CantidadCapacitacion['cantidad']?>)</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-form icon-wrap"></i>
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
                                    <h4 style="color:white">Solicitudes (<?php echo $CantidadSolicitudes['cantidad']?>)</h4>
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
                                    <h4 style="color:white">Bonos (<?php echo $CantidadBonos['cantidad']?>)</h4>
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
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbgyellow bg-3 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Permisos (<?php echo ($CantidadPermisos['cantidad'] + $CantidadPermisosHora['cantidad'])?>)</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-data-table icon-wrap"></i>
                                </div>
                                <div class="m-t-xl widget-cl-3">
                                    
                                    <p style="color:white">Ver los permisos y permisos por horas realizados por el empleado.</p>
                                </div>
                                <div class="row">
                                <div class="col-md-5"><a href="Permisos_Empleado.php"><button  class="btn btn-secondary" style="color:black">Permisos</button></a></div>
                                <div class="col-md-4"><a href="Permisos_HoraEmpleado.php"><button  class="btn btn-secondary" style="color:black">Permisos por hrs</button></a></div>
                                
                                
                                </div>
                                
                            </div>
                        </div>
                    </div>
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbgred bg-4 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Faltas (<?php echo $CantidadFaltas['cantidad']?>)</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-professor"></i>
                                </div>
                                <div class="m-t-xl widget-cl-4">
                                    
                                    <p style="color:white">
												Ver las faltas del empleado.<br/><br/></p>
                                </div>
                               <a href="Faltas_Empleado.php"> <button  class="btn btn-secondary" style="color:black">Más info</button></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br/>
        </div>

        <!---->
        <div class="widgets-programs-area">
            <div class="container-fluid">
                <div class="row">             
               
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div  class="hpanel shadow-inner hbggreen bg-1 responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Viajes (<?php echo $CantidadViajes['cantidad']?>)</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-interface"></i>
                                </div>
                                <div class="m-t-xl widget-cl-1">
                                   
                                    <p style="color:white">Ver los viajes realizados por el empleado.</p>
                                            
                                </div>
                                <a href="Viajes_Empleado.php"><button  class="btn btn-secondary" style="color:black">Más info</button></a>
                                
                            </div>
                           
                        </div>
                    </div>
                
                      <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbgblue bg-2 responsive-mg-b-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Viáticos (<?php echo $CantidadViajes['cantidad']?>)</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                <i class="educate-icon educate-charts"></i>
                                </div>
                                <div class="m-t-xl widget-cl-2">
                                    
                                    <p style="color:white">Ver los viáticos del empleado.<br/><br/></p>
                                </div>
                               <a href="Viaticos_Empleado.php"> <button  class="btn btn-secondary" style="color:black">Más info</button></a>
                               
                            </div>
                        </div>
                    </div>
                  <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbgyellow bg-3 responsive-mg-b-30 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Vacaciones</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-event icon-wrap sub-icon-mg"></i>
                                </div>
                                <div class="m-t-xl widget-cl-3">
                                    
                                    <p style="color:white">Ver la fecha de vacaciones del empleado.</p>
                                </div>
                                
                               <a href="Vacaciones_Empleado.php"><button  class="btn btn-secondary" style="color:black">Más info</button></a>
                                
                                
                                </div>
                                
                            </div>
                    </div>
                   
                   <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                        <div class="hpanel shadow-inner hbgred bg-4 res-tablet-mg-t-30 dk-res-t-pro-30">
                            <div class="panel-body">
                                <div class="stats-title pull-left">
                                    <h4 style="color:white">Comisión (<?php echo $CantidadComision['cantidad'];?>)</h4>
                                </div>
                                <div class="stats-icon pull-right">
                                    <i class="educate-icon educate-professor"></i>
                                </div>
                                <div class="m-t-xl widget-cl-4">
                                    
                                    <p style="color:white">
												Ver las comisiones del empleado.<br/><br/></p>
                                </div>
                               <a href="Comision_Empleado.php"> <button  class="btn btn-secondary" style="color:black">Más info</button></a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <br/>
        </div>
        <br/><br/><br/><br/><br/>

<?php
include '../Master/Footer.php';
?>