
<?php

include("../../Modelo/Conexion.php");

$sql= $pdo->prepare("SELECT e.IdEstado, e.NombreEstado, e.IDPais, p.NombrePais
from estado e
inner join pais p on e.IDPais = p.IDPais");
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
                                            <th>País</th>
                                            <th>Estado</th>
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdEstado']; ?></td>
                                                <td><?php echo $dato['NombrePais'];?></td>
                                                <td><?php echo $dato['NombreEstado']; ?></td>
                                                
                                                <td>
                                                
						
                        
                                                <button  title="Editar" class="pd-setting-ed update" name="update" id="<?php echo $dato['IdEstado']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <a id="Eliminar" data-id="<?php echo $dato['IdEstado']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                

        
<!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>