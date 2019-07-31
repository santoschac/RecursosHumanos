<?php
include ("../../Modelo/Conexion.php");
session_start();

if(isset($_POST['IdSucursal'])){
    $_SESSION['IdSucursal'] = $_POST['IdSucursal'];
}

if(isset($_SESSION['IdSucursal'])){
    
        $IdSucursal= $_SESSION['IdSucursal'];

        $sql = $pdo->prepare("SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, u.IdUsuario, u.Usuario, pu.NombrePuesto, s.IdSucursal, s.NombreSucursal, e.NombreEmpresa
        from personal p
        inner join usuario u on p.IdUsuario = u.IdUsuario
        inner join puestos pu on p.IdPuesto = pu.IdPuesto
        inner join sucursal s on p.IdSucursal = s.IdSucursal
        inner join empresa e on s.IdEmpresa = e.IdEmpresa where s.IdSucursal = $IdSucursal");
        $sql ->execute();
        $resultado = $sql->fetchALL(PDO::FETCH_ASSOC);
}
else
{

$sql = $pdo->prepare("SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, u.IdUsuario, u.Usuario, pu.NombrePuesto, s.NombreSucursal, e.NombreEmpresa
from personal p
inner join usuario u on p.IdUsuario = u.IdUsuario
inner join puestos pu on p.IdPuesto = pu.IdPuesto
inner join sucursal s on p.IdSucursal = s.IdSucursal
inner join empresa e on s.IdEmpresa = e.IdEmpresa");
$sql ->execute();
$resultado = $sql->fetchALL(PDO::FETCH_ASSOC);

}

?>


<!--apartir de aqui los puse para ver lo de excel-->
<script src="../Recursos/js/jquery-3.2.1.min.js"></script>
  <!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">


<table  id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                        <th>No</th>
                                        <th>Usuario</th>
                                        <th>Contraseña</th>                            
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Empresa</th>
                                        <th>Sucursal</th>
                                        <th>Puesto</th>                                        
                                        <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                               
                                                <td><?php echo $dato['IdPersonal']; ?></td>
                                                <td><a href="VEditar_Usuario.php?IdUsuario=<?php echo $dato['IdUsuario']; ?>"><?php echo $dato['Usuario']; ?></td></a>
                                                <td><a href="VEditar_Usuario.php?IdUsuario=<?php echo $dato['IdUsuario']; ?>">*****</td></a>
                                                <td><a href="MenuEmpleado.php?IdPersonal=<?php echo $dato['IdPersonal']; ?>"> <?php echo $dato['Nombre']; ?></td></a>
                                                <td><?php echo $dato['ApellidoPaterno']; ?></td>
                                                <td><?php echo $dato['ApellidoMaterno']; ?></td>
                                                <td><?php echo $dato['NombreEmpresa'];?></td>
                                                <td><?php echo $dato['NombreSucursal']; ?></td>
                                                <td><?php echo $dato['NombrePuesto']; ?> </td>                                       
                                               
                                       
                                                <td>
                                                <a href="MenuEmpleado.php?IdPersonal=<?php echo $dato['IdPersonal']; ?>"><button data-toggle="tooltip" title="Ver información" class="pd-setting-ed"><span class="glyphicon">&#xe105;</span></button><a>
                                                <a href="VEditar_Empleado.php?IdPersonal=<?php echo $dato['IdPersonal']; ?>"><button data-toggle="tooltip" title="Editar" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><a>
                                                <a id="Eliminar" data-id="<?php echo $dato['IdPersonal']; ?>" data-idd="<?php echo $dato['IdUsuario']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>


                                        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
    <script src="../Recursos/js/data-table/tableExport.js"></script>
    <script src="../Recursos/js/data-table/bootstrap-table-export.js"></script>