
<?php

include("../../Modelo/Conexion.php");

$sql= $pdo->prepare("SELECT * FROM puestos");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);


?>
<!-- <script src="../Recursos/js/jquery-3.2.1.min.js"></script> -->

<!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">

 
                                                         
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Puesto</th>
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {
                                            $puesto=$dato['IdPuesto']."||".$dato['NombrePuesto'];
                                            ?>
                                            <tr>
                                                <td><?php echo $dato['IdPuesto']; ?></td>
                                                <td><?php echo $dato['NombrePuesto']; ?></td>
                                                
                                                <td>
                                                
						
                        </button>
                                                <button  title="Editar" class="pd-setting-ed update" name="update" id="<?php echo $dato['IdPuesto']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <a id="Eliminar" data-id="<?php echo $dato['IdPuesto']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                
<!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
<!-- Exportar tabla
		============================================ -->
        <script src="../Recursos/js/data-table/tableExport.js"></script>
<script src="../Recursos/js/data-table/bootstrap-table-export.js"></script>