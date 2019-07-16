
<?php

include("../../Modelo/Conexion.php");

session_start();
$IdPersonal = $_SESSION['IdPersonal'];
$sql= $pdo->prepare("SELECT f.IdFalta, f.IdPersonal, f.Fecha, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, pu.NombrePuesto, s.NombreSucursal,  e.IdEmpresa, e.NombreEmpresa
from faltas f
inner join personal p on f.IdPersonal = p.IdPersonal
inner join puestos pu on p.IdPuesto = pu.IdPuesto
inner join sucursal s on p.IdSucursal = s.IdSucursal
 join empresa e on s.IdEmpresa = e.IdEmpresa where f.IdPersonal = $IdPersonal");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);


?>

<!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">

 
                                                         
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            
                                            <th>Fecha falta</th>
                                            <th>Personal</th>
                                            <th>Empresa</th>
                                            <th>Sucursal</th>
                                            <th>Puesto</th>
                                                                   
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdFalta']; ?></td>
                                                                                                
                                                <td><?php echo date("d-m-Y", strtotime( $dato['Fecha'])); ?></td>
                                                <td><?php echo $dato['Nombre'] ." ". $dato['ApellidoPaterno'] ." ". $dato['ApellidoMaterno']?></td>
                                                <td><?php echo $dato['NombreEmpresa'];?></td>  
                                                <td><?php echo $dato['NombreSucursal'];?></td> 
                                                <td><?php echo $dato['NombrePuesto'];?></td>                                        
                                                <td>
                                                    <a href="VEditar_Falta.php?IdFalta=<?php echo $dato['IdFalta']; ?>"><button  title="Editar" class="pd-setting-ed"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdFalta']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                

        
        




        
        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

    


	 
	 
		
	 
	 




    