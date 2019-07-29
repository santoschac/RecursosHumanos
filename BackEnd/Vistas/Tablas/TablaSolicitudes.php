
<?php

include("../../Modelo/Conexion.php");

session_start();

if(isset($_POST['IdSucursal'])){
    $_SESSION['IdSucursal'] = $_POST['IdSucursal'];
}

if(isset($_SESSION['IdSucursal'])){
    
        $IdSucursal= $_SESSION['IdSucursal'];
        $sql = $pdo->prepare("SELECT s.IdSolicitudes, s.Descripcion, s.FechaSolicitud, s.FechaAtencion, s.Atendido, 
        s.Estatus, s.IdPersonal, s.Solicitud, p.Nombre , p.ApellidoPaterno, p.ApellidoMaterno, p.IdSucursal
        from solicitudes s
        inner join personal p on s.IdPersonal = p.IdPersonal  where Estatus = 'Espera' and IdSucursal = $IdSucursal order by IdSolicitudes desc") ;
        $sql->execute();
        $result=$sql->fetchAll(PDO::FETCH_ASSOC);

}else
{
    $sql = $pdo->prepare('SELECT s.IdSolicitudes, s.Descripcion, s.FechaSolicitud, s.FechaAtencion, s.Atendido, 
    s.Estatus, s.IdPersonal, s.Solicitud, p.Nombre , p.ApellidoPaterno, p.ApellidoMaterno
    from solicitudes s
    inner join personal p on s.IdPersonal = p.IdPersonal  where Estatus = "Espera" order by IdSolicitudes desc') ;
    $sql->execute();
    $result=$sql->fetchAll(PDO::FETCH_ASSOC);
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
                                            <th>Documento Solicitado</th>                                            
                                            <th>Descripción</th>
                                            <th>Fecha Solicitud</th>
                                            <th>Fecha Antención</th>
                                            <th>Atendido</th>
                                            <th>Estatus</th>
                                            <!-- <th>Documento</th> -->
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($result as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdSolicitudes']; ?></td>
                                                <td><?php echo $dato['Nombre'] .' '. $dato['ApellidoPaterno'] .' '. $dato['ApellidoMaterno']; ?></td>
                                                <td><?php echo $dato['Solicitud']; ?></td>
                                                <td><?php echo $dato['Descripcion']; ?></td>
                                                <td><?php echo date("d-m-Y", strtotime($dato['FechaSolicitud'])) ; ?></td>
                                                <td> <?php if(isset($dato['FechaAtencion'])):?><?= date("d-m-Y", strtotime($dato['FechaAtencion'])) ; ?><?php endif;?> </td>
                                                <td><?php echo $dato['Atendido']; ?></td>
                                                <td><?php echo $dato['Estatus']; ?></td>
                                                <!-- <td>?php echo $dato['Documento']; ?></td> -->
                                                <td>
                                                <a href="Atender_Solicitud.php?IdSolicitudes=<?php echo $dato['IdSolicitudes']; ?>"><button data-toggle="tooltip" title="Atender" class="pd-setting-ed"><span class="glyphicon">&#xe067;</span></button><a>
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdSolicitudes']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>



<!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
 

    