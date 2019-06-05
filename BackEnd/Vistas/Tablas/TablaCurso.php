
<?php

include("../../Modelo/Conexion.php");

$sql = $pdo->prepare('SELECT * FROM cursos') ;
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);


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
                                            <th>Nombre del curso</th>
                                            <th>Fecha</th>
                                            <th>Tipo</th>
                                            <th>Descripción</th>
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($result as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdCurso']; ?></td>
                                                <td><?php echo $dato['Nombre']; ?></td>
                                                <td><?php echo date("Y-m-d", strtotime($dato['Fecha'])) ; ?></td>
                                                <td><?php echo $dato['Tipo']; ?></td>
                                                <td><?php echo $dato['DescripcionCurso']; ?></td>
                                                
                                                <td>
                                                <a href="VEditar_Curso.php?IdCurso=<?php echo $dato['IdCurso']; ?>"><button data-toggle="tooltip" title="Editar" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><a>
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdCurso']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>



<!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
 

    