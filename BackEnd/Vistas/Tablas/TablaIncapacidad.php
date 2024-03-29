
<?php

include("../../Modelo/Conexion.php");

if(isset($_POST['IdSucursal'])){
    $_SESSION['IdSucursal'] = $_POST['IdSucursal'];
}

if(isset( $_SESSION['IdSucursal'])){

    $IdSucursal = $_SESSION['IdSucursal'];

    $sql= $pdo->prepare("SELECT p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, p.IdSucursal, u.Usuario, i.IdIncapacidad, i.DiaInicio, i.DiaFinal, i.Descripcion, i.Documento, i.IdPersonal
FROM personal p
inner join usuario u on p.IdUsuario = u.IdUsuario
inner join incapacidad i on p.IdPersonal = i.IdPersonal where IdSucursal = $IdSucursal");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);

}else{
    $sql= $pdo->prepare("SELECT p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, p.IdSucursal, u.Usuario, i.IdIncapacidad, i.DiaInicio, i.DiaFinal, i.Descripcion, i.Documento, i.IdPersonal
FROM personal p
inner join usuario u on p.IdUsuario = u.IdUsuario
inner join incapacidad i on p.IdPersonal = i.IdPersonal");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
}


?>

<!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">

    <script src="../Recursos/js/jquery-3.2.1.min.js"></script>
                                                         
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Personal</th>
                                            <th>Descripción</th>
                                            <th>Día inicio</th>
                                            <th>Día final</th>
                                            <th>Documento</th>                                                              
                                            <th>Descargar</th>
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdIncapacidad']; ?></td>
                                                <td><?php echo $dato['Nombre'] ." ". $dato['ApellidoPaterno']." ". $dato['ApellidoMaterno']?></td>                                                
                                                <td><?php echo $dato['Descripcion'];?></td>
                                                <td><?php echo date("d-m-Y", strtotime( $dato['DiaInicio'])); ?></td>
                                                <td><?php echo date("d-m-Y", strtotime( $dato['DiaFinal'])); ?></td>
                                                <td><?php echo $dato['Documento']; ?></td>                                               
                                                <td><a href="../VistasU/Documentos/Incapacidades/<?php echo $dato['Usuario']?>/<?php echo $dato['Documento']?>" download="<?php $dato['Documento']?>"><?php if(isset($dato['Documento'])):?><img src="../VistasU/Documentos/descargaricono.png" width="60px" height="60px" alt=""><?php endif;?></a></td>
                                                <td>
                                                    <a href="VEditar_Incapacidad.php?IdIncapacidad=<?php echo $dato['IdIncapacidad']; ?>"><button  title="Editar" class="pd-setting-ed"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdIncapacidad']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
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