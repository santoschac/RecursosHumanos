
<?php

include("../../Modelo/Conexion.php");

$sql= $pdo->prepare("SELECT a.IdAsignarJornada, a.IdPersonal, a.IdJornada, a.FechaInicio, a.FechaFinal , p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, p.Departamento, pu.NombrePuesto, s.NombreSucursal, e.NombreEmpresa, jo.IdJornada, jo.FechaInicio as FechaInicioJornada , jo.FechaFin as FechaFinJornada, TIME_FORMAT(jo.HoraInicio, '%H:%i %p') as HoraInicio, TIME_FORMAT(HoraFin, '%H:%i %p') as HoraFin
from asignarjornada a 
inner join personal p on a.IdPersonal = p.IdPersonal
inner join puestos pu on p.IdPuesto= pu.IdPuesto
inner join sucursal s on p.IdSucursal = s.IdSucursal
inner join empresa e on s.IdEmpresa = e.IdEmpresa 
inner join jornada jo on jo.IdJornada = a.IdJornada");
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
                                            <th>Jornada</th>
                                            <th>Fecha Inicio</th>
                                            <th>Fecha Final</th>
                                            <th>Empresa</th>
                                            <th>Sucursal</th>
                                            <th>Puesto</th>
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdAsignarJornada']; ?></td>
                                                <td><?php echo $dato['Nombre'] .' '. $dato['ApellidoPaterno'].' '. $dato['ApellidoMaterno']; ?></td>
                                                <td><?php echo $dato['FechaInicioJornada']  ." a ". $dato['FechaFinJornada']." de ". $dato['HoraInicio'] ." a ". $dato['HoraFin']; ?></td>
                                                <td><?php echo date("Y-m-d", strtotime($dato['FechaInicio']));?></td>
                                                
                                                <td><?php echo date("d-m-Y", strtotime($dato['FechaFinal'])) ;?></td>
                                                <td><?php echo $dato['NombreEmpresa'];?></td>
                                                <td><?php echo $dato['NombreSucursal'];?></td>
                                                <td><?php echo $dato['NombrePuesto'];?></td>
                                                
                                                <td>  
                                              
                                               <a href="VEditar_AsignarJornada.php?IdAsignarJornada=<?php echo $dato['IdAsignarJornada']; ?>"><button  title="Editar" class="pd-setting-ed" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                               <a id="Eliminar" data-id="<?php echo $dato['IdAsignarJornada']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="p-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                

        
        




        
        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

    


	 
	 
		
	 
	 




    