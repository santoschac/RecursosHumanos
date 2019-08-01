
<?php

include("../../Modelo/Conexion.php");

$sql = $pdo->prepare('SELECT i.IdIncidencias, i.Descripcion, i.Fecha, i.Reporta, i.Autoriza, i.Accidentes, i.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno 
FROM incidencias i
inner join personal p on i.IdPersonal = p.IdPersonal') ;
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);


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
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Descripción</th>
                                            <th>Fecha</th>
                                            <th>Reporta</th>
                                            <th>Autoriza</th>
                                            <th>Accidentes</th>                                            
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($result as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdIncidencias']; ?></td>
                                                <td><?php echo $dato['Nombre']; ?></td>
                                                <td><?php echo $dato['ApellidoPaterno'] ." ".$dato['ApellidoMaterno']; ?></td>                                                
                                                <td><?php echo $dato['Descripcion']; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($dato['Fecha'])) ; ?></td>
                                                <td><?php echo $dato['Reporta']; ?></td>
                                                <td><?php echo $dato['Autoriza']; ?></td>
                                                <td><?php echo $dato['Accidentes']; ?></td>
                                                
                                                <td>
                                                <a href="VEditar_Incidencia.php?IdIncidencias=<?php echo $dato['IdIncidencias']; ?>"><button data-toggle="tooltip" title="Editar" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><a>
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdIncidencias']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>



<!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
 

    