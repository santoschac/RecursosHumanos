<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");
include("../Modelo/PaginadorPuestos.php");

if(isset($_GET['IdPuesto'])){

$id = $_GET['IdPuesto'];
$sql = 'SELECT * FROM puestos WHERE IdPuesto=:IdPuesto';
$statement = $pdo->prepare($sql);
$statement-> execute([':IdPuesto'=> $id]);
$Puesto = $statement->fetch(PDO::FETCH_OBJ);
}


$sql= $pdo->prepare("SELECT * FROM puestos");
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
                                       
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">Inicio</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Agregar Incidencia</span>
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
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Agregar Incidencias</a></li>
                                
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form id="add-department" action="#" class="add-department">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                                    <label class="control-label" for="Personal">Personal</label>
                                                                    <div class="input-group custom-go-button">
                                                                      <input type="text" name="Personal" id="Personal" class="form-control" placeholder="Nombre Personal"
                                                                        required="" value="<?php if(isset($_GET['IdPuesto'])):?><?=$Puesto->IdPuesto;?><?php endif;?>" maxlength="60" readonly="">
                                                                      <span class="input-group-btn"><a class="Primary mg-b-10" href="#" data-toggle="modal" data-target="#ModalTablaPersonal"><button class="btn btn-primary" type="button"
                                                                          ><span class="glyphicon glyphicon-zoom-in"></span></button></span></a>
                                                                    </div>
                                                                    
                                                                  </div>
                                                        <div class="form-group">
                                                             <label>Fecha de nacimiento</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="date" class="form-control" value="<?php echo date("d/m/Y"); ?>" >
                                        </div>
                                    </div>
                                                                <div class="form-group">
                                                                <div class="form-group res-mg-t-15">
                                                                    <textarea name="Descripcion" placeholder="Descripcion" maxlength="300"></textarea>
                                                                
                                                                </div>
                                                            </div>
                                                            
                                                           
                                                                  
                                                                  
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        
                                                        <div class="form-group">
                                                            <label>Reporta</label>
                                                                <input name="Reporta" type="text" class="form-control" placeholder="Reporta">
                                                            </div>
                                                            <div class="form-group">
                                                            <label>Autoriza</label>
                                                                    <select name="city" class="form-control">
																			<option value="none" selected="" disabled="">Seleccionar</option>
																			<option value="0">Surat</option>
																			<option value="1">Baroda</option>
																			<option value="2">Navsari</option>
																			<option value="3">Baroda</option>
																			<option value="4">Surat</option>
																		</select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Accidente(choferes)</label>
                                                                    <select name="city" class="form-control">
																			<option value="none" selected="" disabled="">Seleccionar</option>
																			<option value="0">Responsable</option>
																			<option value="1">Afectado</option>
																			
																		</select>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Guardar</button>
                                                            <a href="Incidencias.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Modal tabla-->
        <div id="ModalTablaPersonal" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Lista del personal</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
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
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">                                                
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-key-events="true" data-cookie="true"
                                        data-cookie-id-table="saveId"  data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Puesto</th>
                                            <th>Seleccionar</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdPuesto']; ?></td>
                                                <td><?php echo $dato['NombrePuesto']; ?></td>
                                                
                                                <td>
                                                <a href="Alta_Incidencias.php?IdPuesto=<?php echo $dato['IdPuesto']; ?>"><button data-toggle="tooltip" title="Editar" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><a>
                                                    
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
           
                                
                            
                                        
                                    
                                </div>
                            </div>
                        </div>
        <!--Fin modal tabla-->
        
        
        <?php
        include ("../Master/Footer.php");
        ?>

    
  <!-- data table JS
		============================================ -->
        <script src="../Recursos/js/data-table/bootstrap-table.js"></script>