
<?php

include("../../Modelo/Conexion.php");

$sql = $pdo->prepare('SELECT * FROM sucursal') ;
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);


?>


<!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">
    


 <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-key-events="true" data-cookie="true"
                                        data-cookie-id-table="saveId"  data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nombre de la sucursal</th>
                                            <th>Empresa</th>
                                            <th>Estado</th>
                                            <th>Población</th>
                                            <th>Región</th>
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($result as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdSucursal']; ?></td>
                                                <td><?php echo $dato['NombreSucursal']; ?></td>
                                                <td><?php echo $dato['Empresa']; ?></td>
                                                <td><?php echo $dato['Estado']; ?></td>
                                                <td><?php echo $dato['Poblacion']; ?></td>
                                                <td><?php echo $dato['Region']; ?></td>
                                                
                                                <td>
                                                <a href="VEditar_Sucursal.php?IdSucursal=<?php echo $dato['IdSucursal']; ?>"><button data-toggle="tooltip" title="Editar" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><a>
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdSucursal']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>



<!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
 

    