
<?php
session_start();
include("../../Modelo/Conexion.php");

$IdPersonal = $_SESSION['IdPersonal'];

$sql= $pdo->prepare("SELECT v.IdViatico, v.Motivo, v.Monto, v.Comprobado, v.Cantidad, v.IdPoblacion, v.IdPersonal, v.Fecha, v.FechaAprobado, p.NombrePoblacion, e.NombreEstado
from viaticos v
inner join poblacion p on v.IdPoblacion = p.IdPoblacion
inner join estado e on p.IdEstado = e.IdEstado where IdPersonal =$IdPersonal order by IdViatico desc");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);


   

?>

<!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">

 
                                         
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Estado</th>
                                            <th>Población</th>
                                            <th>Motivo</th>
                                            <th>Monto</th>
                                            <th>Fecha</th>   
                                            <th>Comprobado</th>                         
                                            <th>Configuración</th>
                                    </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdViatico']; ?></td>
                                                <td><?php echo $dato['NombreEstado']?></td>
                                                <td><?php echo $dato['NombrePoblacion'];?></td>
                                                <td><?php echo $dato['Motivo']; ?></td>
                                                <td>$ <?php echo $dato['Monto'];?></td>                                                
                                                <td><?php echo date("d-m-Y", strtotime($dato['Fecha'])) ;?></td>
                                                <td><?php echo $dato['Comprobado'];?></td>
                                                
                                                <td>
                                                   <?php if($dato['Comprobado']=="Espera"){?>
                                                     <a id="Eliminar" data-id="<?php echo $dato['IdViatico']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                 <?php }?>
                                                    
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                
        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>