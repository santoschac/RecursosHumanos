
<?php

include("../../Modelo/Conexion.php");

session_start();
$IdPersonal = $_SESSION['IdPersonal'];
$sql= $pdo->prepare("SELECT b.IdBono, b.Descripcion, b.Fecha, b.Monto, b.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno
from bonos b
inner join personal p on b.IdPersonal = p.IdPersonal where b.IdPersonal= $IdPersonal");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);


?>

<!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">

 
                                                         
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Personal</th>
                                            <th>Fecha</th>
                                            <th>Descripción</th>
                                            <th>Monto</th>                                                                    
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdBono']; ?></td>
                                                <td><?php echo $dato['Nombre'] . " ".$dato['ApellidoPaterno']. " ".$dato['ApellidoMaterno']?></td>                                                
                                                <td><?php echo date("d-m-Y", strtotime( $dato['Fecha'])); ?></td>
                                                <td><?php echo $dato['Descripcion'];?></td>
                                                <td>$ <?php echo $dato['Monto']; ?></td>
                                                
                                                <td>
                                                    <a href="VEditar_Bonos.php?IdBono=<?php echo $dato['IdBono']; ?>"><button  title="Editar" class="pd-setting-ed"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdBono']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                

        
        




        
        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

    


	 
	 
		
	 
	 




    