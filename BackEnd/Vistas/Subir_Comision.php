<?php include "../Master/Header.php"; ?>

<!-- forms CSS
	============================================ -->
    <link rel="stylesheet" href="../Recursos/css/all-type-forms.css">
    <!-- Sweet Alert
		============================================ -->
        <link rel="stylesheet" href="../Recursos/sweetalert/sweetalert2.min.css" type="text/css" />
        <style>
    #mdialTamanio{
      width: 35% !important;
      
      }
  </style>

        <?php if($_SESSION['IdTipoUsuario']==1){ ?>
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
                                            <li><a href="Comision.php">Comisión</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Subir archivo excel</span>
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
                        <div class="main-sparkline13-hd" style="text-align: center">
                            <h1>Subir <span class="table-project-n">archivo</span> de comisión</h1>
                            
                        </div>
                    </div> <br> <br>
                    <!-- Formulario -->
                    <form id="frmExcel1" action="../Vistas/Excel/Exc.php" method="POST" enctype="multipart/form-data">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                                    <label class="login2 pull-right pull-right-pro">Agregar Excel</label>
                                </div>
                                <div class="col-lg-5 col-md-12 col-sm-12 col-xs-12">
                                <div class="file-upload-inner ts-forms">
                                                    
                                                    <div class="input prepend-big-btn">
                                                    
                                                        <label class="icon-right" for="prepend-big-btn">
                                                            <i class="fa fa-download"></i>
                                                        </label>
                                                        <div class="file-button">
                                                            Seleccionar 
                                                            <input type="file" name="excel" accept=".xls, .xlsx" required onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                        </div>
                                                        <input type="text" id="prepend-big-btn"
                                                            placeholder="          Ningún archivo seleccionado" readonly >
                                                    </div>
                                                </div>
                                </div>
                                <input type="hidden" name="operacion" id="operacion" value="Agregar">
                                <div class="col-lg-4 col-md-12 col-sm-12 col-xs-12">
                                    <button type="submit" id="BotonVer" class="btn btn-custon-rounded-two btn-success">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                        Agregar
                                    </button>
                                    <button type="submit" id="BotonGuardar" hidden class="btn btn-custon-rounded-two btn-success">
                                        <i class="fa fa-save" aria-hidden="true"></i>
                                        Guardar
                                    </button>
                                    <a id="can" class="btn btn-custon-rounded-two btn-danger external" href="../Vistas/Comision.php">
                                        <i class="fa fa-times edu-danger-error" aria-hidden="true"></i>
                                        Cancelar
                                    </a>
                                    <button type="button" id="regresar" hidden
                                        class="btn btn-custon-rounded-two btn-danger"
                                        data-toggle="modal" data-target="#Cancelar">
                                        <i class="fa fa-times edu-danger-error" aria-hidden="true"></i>
                                        Cancelar
                                    </button>
                                </div>
                            </div> <br> <br>
                        </div>
                    </form>
                    <br>
                    <div id="tabla" class="datatable-dashv1-list custom-datatable-overright">

                    </div>
                </div>
            </div>
        </div>
    </div> <br><br><br>

        
    <!-- Modal Cancelar -->
    <div id="Cancelar" class="modal modal-edu-general FullColor-popup-DangerModal fade" role="dialog">
        <div class="modal-dialog" id="mdialTamanio">
            <div class="modal-content">
                <div class="modal-close-area modal-close-df">
                    <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
                <div class="modal-body">
                    <span class="educate-icon educate-info modal-check-pro information-icon-pro"></span>
                    <h2>¿Estás seguro?</h2>
                    <p>Archivo no guardado.</p>
                </div>
                <div class="modal-footer danger-md">
                    <a data-dismiss="modal" href="#">Cancelar</a>
                    <a href="Horas_Extras.php" class="external">Aceptar</a>
                </div>
            </div>
        </div>
    </div>

    <?php include "../Master/Footer.php"; ?>
    <?php }else{echo "<br/><h1>No se puede acceder a este sitio</h1>";}?>
    <script src="../Recursos/js/sweetalert2@8.js"></script>

    <script>
    // Agregar
    $(document).on('submit', '#frmExcel1', function(event) {
        event.preventDefault();
        var datos = $('#frmExcel1').serialize();
        // alert(datos);
        $.ajax({
            url: "../Vistas/Excel/Exc_Comision.php",
            method: 'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success: function(data) {
                // alert(data);
                
                $("#BotonVer").hide();
                $("#BotonGuardar").show();
                $("#operacion").val("Guardar");
                $("#can").hide();
                $("#regresar").show();
                $("#tabla").html(data);
            }
        });
    });
    </script>


    <!-- Script boton a -->
    <script type="text/javascript">

        $(document).ready(function(){
            $("a.external").click(function() {
                url = $(this).attr("href");
                window.open(url,'_blank');
                return false;
            });
            
            $("a.external").off('click');
        });
    </script>