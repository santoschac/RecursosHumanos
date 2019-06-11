<?php
include("../Master/Header.php");
?>

 <!-- datapicker CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/datapicker/datepicker3.css">
 <!-- chosen CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/chosen/bootstrap-chosen.css">
  
    
    
 <!-- Mobile Menu end -->
 <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <!-- <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div> -->
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">Inicio</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Agregar Cambio</span>
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
                                <li class="active"><a href="#description">Agregar Cambio</a></li>
                                
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
                                                                <input type="text" name="Personal" id="Personal"
                                                                    class="form-control" placeholder="Nombre Personal"
                                                                    required=""
                                                                    value="<?php if(isset($_GET['IdPuesto'])):?><?=$Puesto->IdPuesto;?><?php endif;?>"
                                                                    maxlength="60" readonly="">
                                                                <span class="input-group-btn"><a class="Primary mg-b-10"
                                                                        href="#" data-toggle="modal"
                                                                        data-target="#ModalTablaPersonal"><button
                                                                            class="btn btn-primary" type="button"><span
                                                                                class="glyphicon glyphicon-zoom-in"></span></button></span></a>
                                                            </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <label>Empresa Anterior</label>
                                                            <input name="EmpresaAnterior" id="EmpresaAnterior" type="text" class="form-control" placeholder="Empresa anterior" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sucursal Anterior</label>
                                                            <input name="SucursalAnterior" id="SucursalAnterior" type="text" class="form-control" placeholder="Sucursal anterior" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Puesto Anterior</label>
                                                            <input name="PuestoAnterior" id="PuestoAnterior" type="text" class="form-control" placeholder="Puesto anterior" readonly>
                                                        </div>
                                                        
                                                               
                                                            
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group data-custon-pick">
                                                            <label><strong>Fecha Inicio</strong></label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i
                                                                        class="fa fa-calendar"></i></span>
                                                                <input type="date" name="FechaInicio" id="FechaInicio" class="form-control"
                                                                    value="<?php echo date("Y-m-d"); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nueva Empresa</label>
                                                            <?php
                                                            $sql = $pdo->prepare('SELECT IdEmpresa, NombreEmpresa FROM empresa') ;
                                                            $sql->execute();
                                                            $result=$sql->fetchAll(PDO::FETCH_ASSOC);
                                                            
                                                            ?>
                                                            <select name="NuevaEmpresa" id="NuevaEmpresa" class="form-control">
                                                            <option value="none" selected="" disabled="">Seleccionar</option>
                                                                <?php foreach ($result as $dato) {?>
                                                                    <option value="<?php echo $dato['IdEmpresa'];?>"> <?php echo $dato['NombreEmpresa']; ?> </option>
                                                                <?php } ?>
                                                            </select>

                                                        </div>
                                                        <div class="form-group">
                                                            <label>Nueva Sucursal</label>
                                                            <select name="NuevaSucursal" id="NuevaSucursal"class="form-control">
                                                                <option value="none" selected="" disabled="">Seleccionar</option>
                                                            </select>
                                                        </div>
                                                        <div class="chosen-select-single mg-b-20">
                                                                <label><strong>Puesto</strong></label>
                                                                <?php 
                                                                    echo '<select name="IdPuesto" id="IdPuesto" data-placeholder="Seleccionar" class="chosen-select" tabindex="-1">';
                                                                    echo '<option value="">Seleccionar</option>';
                                                                    foreach ($pdo->query('SELECT IdPuesto, NombrePuesto FROM puestos') as $row) {													
                                                                    echo '<option value="'.$row['IdPuesto'].'">'.$row['NombrePuesto'].'</option>';
                                                                    }
                                                                    echo'</select>';
                                                                ?>
                                                            </div>
                                                                
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <br/>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                                                    <a href="Cambios.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
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



<?php
 include ("../Master/Footer.php");
?>


  <!-- datapicker JS
		============================================ -->
        <script src="../Recursos/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="../Recursos/js/datapicker/datepicker-active.js"></script>

    <!-- chosen JS
		============================================ -->
        <script src="../Recursos/js/chosen/chosen.jquery.js"></script>
    <script src="../Recursos/js/chosen/chosen-active.js"></script>
    
    <script type="text/javascript" language="javascript">
    $(document).ready(function () {
        $("#NuevaEmpresa").change(function () {
            // e.preventDefault();

            $("#NuevaEmpresa option:selected").each(function () {
                IdEmpresa = $(this).val();
                
                $.post("Combo/Seleccionar_Sucursal.php", {
                    IdEmpresa: IdEmpresa
                    },
                    function (data) {
                        
                        $("#NuevaSucursal").html(data);
                    });
            });
        });
    });

    </script>