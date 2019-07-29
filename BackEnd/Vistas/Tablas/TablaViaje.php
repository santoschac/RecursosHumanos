
<?php

include("../../Modelo/Conexion.php");

session_start();

if(isset($_POST['IdSucursal'])){
    $_SESSION['IdSucursal'] = $_POST['IdSucursal'];
}

if(isset($_SESSION['IdSucursal'])){
    
        $IdSucursal= $_SESSION['IdSucursal'];
        $sql= $pdo->prepare("SELECT v.IdViaje, v.FechaInicio, v.FechaFin, v.Motivo, v.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, pu.NombrePuesto, s.IdSucursal, s.NombreSucursal,  e.IdEmpresa, e.NombreEmpresa
        from viajes v
        inner join personal p on v.IdPersonal = p.IdPersonal
        inner join puestos pu on p.IdPuesto = pu.IdPuesto
        inner join sucursal s on p.IdSucursal = s.IdSucursal
         join empresa e on s.IdEmpresa = e.IdEmpresa where s.IdSucursal = $IdSucursal");
        $sql->execute();
        $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
}
else
{

    $sql= $pdo->prepare("SELECT v.IdViaje, v.FechaInicio, v.FechaFin, v.Motivo, v.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, pu.NombrePuesto, s.NombreSucursal,  e.IdEmpresa, e.NombreEmpresa
    from viajes v
    inner join personal p on v.IdPersonal = p.IdPersonal
    inner join puestos pu on p.IdPuesto = pu.IdPuesto
    inner join sucursal s on p.IdSucursal = s.IdSucursal
    join empresa e on s.IdEmpresa = e.IdEmpresa");
    $sql->execute();
    $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
}




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
                                            <th>Personal</th>
                                            <th>Empresa</th>
                                            <th>Sucursal</th> 
                                            <th>Fecha de inicio</th>
                                            <th>Fecha final</th>
                                            <th>Motivo del viaje</th>
                                                                                                         
                                            <!--<th>Puesto</th>  --> 
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdViaje']; ?></td>
                                                <td><?php echo $dato['Nombre'] ." ".  $dato['ApellidoPaterno'] ." ".  $dato['ApellidoMaterno']?></td>                                                
                                                <td><?php echo $dato['NombreEmpresa']; ?></td>
                                                <td><?php echo $dato['NombreSucursal']; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime( $dato['FechaInicio'])); ?></td>
                                                <td><?php echo date("d-m-Y", strtotime( $dato['FechaFin'])); ?></td>
                                                <td><?php echo $dato['Motivo'];?></td>
                                                 
                                                <!--<td><?php echo $dato['NombrePuesto']; ?></td> -->
                                               
                                                <td>
                                                    <a href="VEditar_Viaje.php?IdViaje=<?php echo $dato['IdViaje']; ?>"><button  title="Editar" class="pd-setting-ed"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdViaje']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                

        
        




        
        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

    


	 
	 
		
	 
	 




    