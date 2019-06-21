
<?php

include("../../Modelo/Conexion.php");

$sql= $pdo->prepare("select IdJornada, FechaInicio, FechaFin, TIME_FORMAT(HoraInicio,'%r') as HoraInicio, TIME_FORMAT(HoraFin,'%r') as HoraFin from jornada");
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
                                            <th>Dia inicio</th>
                                            <th>Hora inicio</th>
                                            <th>Dia fin</th>
                                            <th>Hora Fin</th>
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) { ?>
                                            <tr>
                                                <td><?php echo $dato['IdJornada']; ?></td>
                                                <td><?php echo $dato['FechaInicio']; ?></td>
                                                <td><?php echo $dato['HoraInicio']; ?></td>
                                                <td><?php echo $dato['FechaFin'];?></td>
                                                <td><?php echo $dato['HoraFin']; ?></td>
                                                <td>
                                                
						
                        </button>
                                                <button  title="Editar" class="pd-setting-ed update" name="update" id="<?php echo $dato['IdJornada']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                            <a id="Eliminar" data-id="<?php echo $dato['IdJornada']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                

        
        




        
        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

    


	 
	 
		
	 
	 




    