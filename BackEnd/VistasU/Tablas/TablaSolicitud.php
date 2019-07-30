
<?php
session_start();
include("../../Modelo/Conexion.php");

$IdPersonal = $_SESSION['IdPersonal'];

$sql= $pdo->prepare("SELECT * FROM solicitudes where IdPersonal = $IdPersonal order by IdSolicitudes desc");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);


    $sql1 = 'SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, u.Usuario
	from personal p
	inner join usuario u on p.IdUsuario=u.IdUsuario where IdPersonal = ?';
	$sentencia = $pdo->prepare($sql1);
	$sentencia->execute(array($IdPersonal));
    $result = $sentencia->fetch();
    
    $NombreCarpeta = $result['Usuario'];

?>

<!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">

 
                                         
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true"  data-toolbar="#toolbar">
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
                                            <th>Descargar</th>                                           
                                            <th>Configuración</th>
                                    </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdSolicitudes']; ?></td>
                                                <td><?php echo $dato['Solicitud'];?></td>
                                                <td><?php echo $dato['Descripcion']; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($dato['FechaSolicitud'])) ;?></td>
                                                <td><?php echo $dato['Estatus'];?></td>
                                                <td><?php echo $dato['Atendido'];?></td>
                                                <td><?php if(isset($dato['FechaAtencion'])):?><?= date("d-m-Y", strtotime($dato['FechaAtencion']));?><?php endif;?></td>
                                                <td><?php echo $dato['Documento'];?></td>
                                                <td><a href="../VistasU/Documentos/Solicitudes/<?php echo $NombreCarpeta?>/<?php echo $dato['Documento']?>" download="<?php $dato['Documento']?>"><?php if(isset($dato['Documento'])):?><img src="../VistasU/Documentos/iconodescargar.png" width="150" height="250" alt=""><?php endif;?></a></td>
                                                
                                                <td>
                                                    <!--<button  title="Editar" class="pd-setting-ed update" name="update" id="?php echo $dato['IdSolicitudes']; ?>"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>-->
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdSolicitudes']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                
                                  
                                    

        
        




        
        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

    


	 
	 
		
	 
	 




    