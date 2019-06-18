<?php
include ("../../Modelo/Conexion.php");

$sql = $pdo->prepare("SELECT * FROM personal");
$sql ->execute();
$resultado = $sql->fetchALL(PDO::FETCH_ASSOC);

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
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Curp</th>
                                        <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                               
                                                <td><?php echo $dato['IdPersonal']; ?></td>
                                        <td><?php echo $dato['Nombre']; ?></td>
                                        <td><?php echo $dato['ApellidoPaterno']; ?></td>
                                        <td><?php echo $dato['ApellidoMaterno']; ?></td>
                                        <td><?php echo $dato['Curp']; ?></td>
                                       
                                                <td>
                                                <a href="Ver_Empleado.php?IdPersonal=<?php echo $dato['IdPersonal']; ?>"><button data-toggle="tooltip" title="Ver información" class="pd-setting-ed"><span class="glyphicon">&#xe105;</span></button><a>
                                                <a href="VEditar_Empleado.php?IdPersonal=<?php echo $dato['IdPersonal']; ?>"><button data-toggle="tooltip" title="Editar" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><a>
                                                <a id="Eliminar" data-id="<?php echo $dato['IdPersonal']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>


                                        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>