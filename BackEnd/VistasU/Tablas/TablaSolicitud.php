
<?php

include("../../Modelo/Conexion.php");

$sql= $pdo->prepare("SELECT * FROM solicitudes");
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
                                            <th>Solicitud</th>
                                            <th>Descripción</th>
                                            <th>Fecha Solicitud</th>
                                            <th>Estatus</th>
                                            <th>Atendido</th>
                                            <th>Fecha atención</th>
                                            <th>Documento</th> 
                                            <th>descargar</th>                                           
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdSolicitudes']; ?></td>
                                                <td><?php echo $dato['Solicitud'];?></td>
                                                <td><?php echo $dato['Descripcion']; ?></td>
                                                <td><?php echo $dato['FechaSolicitud'];?></td>
                                                <td><?php echo $dato['Estatus'];?></td>
                                                <td><?php echo $dato['Atendido'];?></td>
                                                <td><?php echo $dato['FechaAtencion'];?></td>
                                                <td><?php echo $dato['Documento'];?></td>
                                                <td><a href="../rosa.jpg" download="Reporte2Mayo2010"> Descargar Archivo</a></td>
                                                <td>
                                                
						
                        </button>
                                                <!--<button  title="Editar" class="pd-setting-ed update" name="update" id="?php echo $dato['IdSolicitudes']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>-->
                                            <a id="Eliminar" data-id="<?php echo $dato['IdSolicitudes']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                
                                  
                                    <script>
                                    var a = document.createElement('a');
 
 if(typeof a.download != "undefined"){
    //El atributo es soportado
 }
 else {
    //El atributo no es soportado
 }
 </script>

        
        




        
        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

    


	 
	 
		
	 
	 




    