<?php
include ("../Master/Header.php");
include ("../Modelo/Conexion.php");


$sql= $pdo->prepare("SELECT * FROM personal");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
?>
           <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">

                   <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Buscar..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">Inicio</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Lista de empleados</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
         <!-- Static Table Start -->
         <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                <h4>Lista de Puestos</h4>
                                </div>
                                <div class="add-product">
                                <a href="Alta_Empleado.php">Agregar Empleado</a>
                            </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">                                                
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-key-events="true" data-cookie="true"
                                        data-cookie-id-table="saveId"  data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>                                       
                                        <th>Nombre</th>
                                        <th>Apellido Paterno</th>
                                        <th>Apellido Materno</th>
                                        <th>Curp</th>
                                        <th>Tipo</th>
                                        <th>Dirección</th>
                                        <th>Colonia</th>
                                        <th>Delegación</th>
                                        <th>Población</th>
                                        <th>Estado</th>
                                        <th>Pais</th>
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
                                        <td><?php echo $dato['Tipo']; ?></td>
                                        <td><?php echo $dato['Direccion']; ?></td>
                                        <td><?php echo $dato['Colonia']; ?></td>
                                        <td><?php echo $dato['Delegacion']; ?></td>
                                        <td><?php echo $dato['Poblacion']; ?></td>
                                        <td><?php echo $dato['Estado']; ?></td>
                                        <td><?php echo $dato['Pais']; ?></td>
                                                
                                                <td>
                                                <a href="Editar_Empleado.php?IdPersonal=<?php echo $dato['IdPersonal']; ?>"><button data-toggle="tooltip" title="Editar" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><a>
                                            <button data-toggle="tooltip" title="Eliminar" onclick="return confirm('¿Eliminar empleado?')"  class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
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