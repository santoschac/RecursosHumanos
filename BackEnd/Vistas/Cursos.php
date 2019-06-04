<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");

$sql = $pdo->prepare('SELECT * FROM cursos') ;
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);

?>
         

    <!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">
    


          <!-- Static Table Start -->
          <div class="data-table-area mg-b-15">
          <br/>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h4>Lista de cursos</h4>
                                    <div class="add-product">
                                <a href="Alta_Curso.php">Agregar Curso</a>
                            </div>
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">                                                
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
                                                    <a href="Editar_Curso.php?IdCurso=<?php echo $dato['IdCurso'];?>"><button id="Editar" data-toggle="tooltip" title="Edit" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                    <button data-toggle="tooltip" title="Trash" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <br>
        <!-- Static Table End -->
        
         
        
        <?php
        include ("../Master/Footer.php");
        ?>


            <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
 

    