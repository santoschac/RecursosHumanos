
<?php
include("../../Modelo/Conexion.php");
session_start();
$IdPersonal = $_SESSION['IdPersonal'];
$sql= $pdo->prepare("SELECT p.IdPermiso, p.Dia, p.Descripcion, p.Devolucion, p.IdPersonal, pe.Nombre, pe.ApellidoPaterno, pe.ApellidoMaterno
from permisos p
inner join personal pe on p.IdPersonal = pe.IdPersonal where p.IdPersonal = $IdPersonal ");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);

?>

<!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">

                   
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Personal</th>
                                            <th>Fecha solicitada</th>
                                            <th>Permiso</th>
                                            <th>Forma de devolución</th>
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) { ?>
                                            <tr>
                                                <td><?php echo $dato['IdPermiso'];?></td>
                                                <td><?php echo $dato['Nombre'] ." ". $dato['ApellidoPaterno'] ." ". $dato['ApellidoMaterno']; ?></td>                                                
                                                <td><?php echo date("d-m-Y", strtotime($dato['Dia'] )) ?></td>
                                                <td><?php echo $dato['Descripcion']; ?></td>
                                                <td><?php echo $dato['Devolucion']; ?></td>
                                                
                                                
                                               <td>
                                               <a href="VEditar_Permiso.php?IdPermiso=<?php echo $dato['IdPermiso']; ?>"><button  title="Editar" class="pd-setting-ed"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                            <a id="Eliminar" data-id="<?php echo $dato['IdPermiso']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
  
        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>