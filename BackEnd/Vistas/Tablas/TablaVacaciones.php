
<?php

include("../../Modelo/Conexion.php");

session_start();

if(isset($_POST['IdSucursal'])){
    $_SESSION['IdSucursal'] = $_POST['IdSucursal'];
}

if(isset($_SESSION['IdSucursal'])){
    
        $IdSucursal= $_SESSION['IdSucursal'];
        $sql= $pdo->prepare("SELECT v.IdVacaciones, v.Titulo, v.Color, v.FechaInicio, v.FechaFinal, v.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, s.IdSucursal, s.NombreSucursal, e.NombreEmpresa, pu.NombrePuesto
        from vacaciones v
        inner join personal p on v.IdPersonal = p.IdPersonal
        inner join sucursal s on p.IdSucursal = s.IdSucursal
        inner join empresa e on s.IdEmpresa = e.IdEmpresa
        inner join puestos pu on p.IdPuesto = pu.IdPuesto where s.IdSucursal = $IdSucursal");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
}
else{

    $sql= $pdo->prepare("SELECT v.IdVacaciones, v.Titulo, v.Color, v.FechaInicio, v.FechaFinal, v.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, s.NombreSucursal, e.NombreEmpresa, pu.NombrePuesto
from vacaciones v
inner join personal p on v.IdPersonal = p.IdPersonal
inner join sucursal s on p.IdSucursal = s.IdSucursal
inner join empresa e on s.IdEmpresa = e.IdEmpresa
inner join puestos pu on p.IdPuesto = pu.IdPuesto");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
}

?>

 
   

<!--apartir de aqui los puse para ver lo de excel-->
    <script src="../Recursos/js/jquery-3.2.1.min.js"></script>
    <!-- normalize CSS para la tabla
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">

                     
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Titulo</th>
                                            <th>Personal</th>
                                            <th>Fecha de inicio</th>
                                            <th>Fecha final</th> 
                                            <th>Empresa</th>
                                            <th>Sucursal</th>
                                            <th>Puesto</th>                                                                  
                                            <!-- <th>Configuración</th> -->
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdVacaciones']; ?></td>
                                                <td><?php echo $dato['Titulo'] ?></td>  
                                                <td><?php echo $dato['Nombre'] ." ". $dato['ApellidoPaterno'] ." ". $dato['ApellidoMaterno'];?></td>                                              
                                                <td><?php echo date("d-m-Y", strtotime( $dato['FechaInicio'])); ?></td>
                                                <td><?php echo date("d-m-Y", strtotime( $dato['FechaFinal'])); ?></td>
                                                <td><?php echo $dato['NombreEmpresa']?></td>
                                                <td><?php echo $dato['NombreSucursal']?></td>
                                                <td><?php echo $dato['NombrePuesto']?></td>
                                               
                                               
                                                <!-- <td>
                                                    <a href="VEditar_Cambio.php?IdCambio=<?php echo $dato['IdVacaciones']; ?>"><button  title="Editar" class="pd-setting-ed"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdVacaciones']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td> -->
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                

        
<!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
    
    <script src="../Recursos/js/data-table/tableExport.js"></script>
    <script src="../Recursos/js/data-table/bootstrap-table-export.js"></script>