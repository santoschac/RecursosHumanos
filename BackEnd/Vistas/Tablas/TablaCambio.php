
<?php

include("../../Modelo/Conexion.php");

$sql= $pdo->prepare("SELECT * FROM cambios");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);


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
                                            <th>Personal</th>
                                            <th>Empresa anterior</th>
                                            <th>Sucursal anterior</th>
                                            <th>Puesto anterior</th>
                                            <th>Fecha inicio</th>
                                            <th>Nueva empresa</th>
                                            <th>Nueva sucursal</th>
                                            <th>Nuevo puesto</th>
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdCambio']; ?></td>
                                                <td><?php echo $dato['IdPersonal']; ?></td>
                                                <td><?php echo $dato['EmpresaAnterior']; ?></td>
                                                <td><?php echo $dato['SucursalAnterior']; ?></td>
                                                <td><?php echo $dato['PuestoAnterior']; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime( $dato['FechaInicio'])); ?></td>
                                                <td><?php echo $dato['EmpresaNuevo']; ?></td>
                                                <td><?php echo $dato['SucursalNuevo']; ?></td>
                                                <td><?php echo $dato['PuestoNuevo']; ?></td>
                                                
                                                <td>
                                                
						
                        </button>
                                                <button  title="Editar" class="pd-setting-ed update" name="update" id="<?php echo $dato['IdPuesto']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <a id="Eliminar" data-id="<?php echo $dato['IdCambio']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                

        
        




        
        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

    


	 
	 
		
	 
	 




    