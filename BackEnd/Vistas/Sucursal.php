<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");

$sql = $pdo->prepare('SELECT IdEmpresa, NombreEmpresa FROM empresa') ;
$sql->execute();
$result=$sql->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Sweet Alert
		============================================ -->
<link rel="stylesheet" href="../Recursos/sweetalert/sweetalert2.min.css" type="text/css" />


<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
    <br />
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="sparkline13-list">
                    <div class="sparkline13-hd">
                        <div class="main-sparkline13-hd">
                            <h4>Lista de Sucursales</h4>



                            <button type="button" class="btn btn-primary" data-toggle="modal" id="boton_agregar"
                                data-target="#ModalAgregar">Agregar Sucursal</button>
                        </div>
                    </div>
                    <div class="sparkline13-graph">
                        <div class="datatable-dashv1-list custom-datatable-overright">


                            <!--tabla-->
                            <div id="TablaSucursal"></div>
                            <!--fin tabla-->

                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <br>
<!-- Static Table End -->

<!--modal Agregar-->
<div id="ModalAgregar" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <form method="post" id="formulario" class="dropzone dropzone-custom needsclick add-professors">
            <div class="modal-content">
                <div class="modal-header header-color-modal bg-color-1">
                    <h4 class="modal-title">Agregar puesto</h4>

                    <div class="modal-close-area modal-close-df">
                        <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>

                    </div>
                </div>

                <div class="modal-body">

                    <!--Agregar form dentro del moal-->


                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            
                        <div class="form-group">
                                <label>Empresa</label>

                                <select name="Empresa" id="Empresa" class="form-control">
                                    <!-- <option value="none"  disabled="">Seleccionar</option> -->
                                    <?php foreach ($result as $dato) {?>

                                    <option value="<?php $dato['IdEmpresa'];?>"><?php echo $dato['NombreEmpresa']; ?>
                                    </option>
                                    <?php } ?>

                                </select>

                            </div>



                            <div class="form-group">
                                <label>Nombre Sucursal</label>
                                <input name="NombreSucursal" id="NombreSucursal" type="text" class="form-control"
                                    placeholder="Nombre de la sucursal" required="" maxlength="60">
                            </div>
                            <div>
                                <label>Prueba</label>
                                <select name="prueba" id="prueba" class="form-control">
                                    <!-- <option value=""  disabled="">Seleccionar</option> 
																			<option value="0">Surat</option>
																			<option value="1">Baroda</option>
																			<option value="2">Navsari</option>
																			<option value="3">Baroda</option>
																			<option value="4">Surat</option> -->
                                </select>
                            </div>

                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                                <label>Estado</label>

                                <select name="IdEstado" id="IdEstado" class="form-control">
                                    <option value="none" disabled="">Seleccionar</option>
                                    <?php foreach ($pdo->query('SELECT IdEstado, NombreEstado FROM estado') as $row) {													
                                                                    echo '<option value="'.$row['IdEstado'].'">'.$row['NombreEstado'].'</option>';
                                                                    }
                                                                  ?>
                                </select>

                            </div>

                            <div class="form-group">
                                <label>Población</label>
                                <select name="IdPoblacion" id="IdPoblacion" class="form-control">
                                    <option value="none" selected="" disabled="">Seleccionar</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Región</label>
                                <input name="Region" id="Region" type="text" class="form-control" placeholder="Región"
                                    required="" maxlength="60">
                            </div>
                        </div>
                    </div>


                    <!--Fin Agregar form dentro del moal-->
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="sucursal_id" id="sucursal_id" />
                    <input type="hidden" name="operation" id="operation" />
                    <input type="submit" name="action" id="action" class="btn btn-primary" value="Agregar" />
                    <button data-dismiss="modal" class="btn btn-danger" href="#">Cancelar</button>
                </div>
            </div>
            <form>
    </div>
</div>
<!--fin modal agregar-->







<?php
        include ("../Master/Footer.php");
        ?>

<script src="../Recursos/sweetalert/sweetalert2.min.js"></script>



<script type="text/javascript" language="javascript">
    $(document).ready(function () {
        $("#IdEstado").change(function () {
            // e.preventDefault();

            $("#IdEstado option:selected").each(function () {
                IdEstado = $(this).val();
                $.post("Combo/Seleccionar_Poblacion.php", {
                        IdEstado: IdEstado
                    },
                    function (data) {
                        $("#IdPoblacion").html(data);
                    });
            });
        });
    });


    $(document).ready(function () {



        $(document).on('submit', '#formulario', function (event) {
            event.preventDefault();
            var datos = $('#formulario').serialize();
            // var Nombre = $('#NombreCurso').val();
            // var Descripcion = $('#DescripcionCurso').val();
            // var Tipo = $('Tipo').val();
            // var Fecha = $('Fecha').val();
            //alert(datos);
            if (Nombre != '' && Descripcion != '') {

                $.ajax({
                    url: "Alta/A.php",
                    method: 'POST',
                    data: new FormData(this),
                    contentType: false,
                    processData: false,
                    success: function (data) {
                        //alert(data);
                        //$('#formulario')[0].reset();
                        if (data == 1) {
                            readCurso();
                            $("#exito").fadeIn();
                            setTimeout(function () {
                                $("#exito").fadeOut();
                            }, 2000);
                            $('#NombreCurso').val('');
                        } else if (data == 2) {
                            readCurso();
                            $("#actu").fadeIn();
                            setTimeout(function () {
                                $("#actu").fadeOut();
                            }, 2000);
                            $('#NombreCurso').val('');
                            // }else{

                            //     $("#error").fadeIn();
                            // setTimeout(function(){
                            // $("#error").fadeOut();
                            // },2000);

                        }

                    }
                });
            }

        });

        $(document).on('click', '.update', function () {
            var sucursal_id = $(this).attr("id");
            $.ajax({
                url: "Editar/Editar_Sucursal.php",
                method: "POST",
                data: {
                    sucursal_id: sucursal_id
                },
                dataType: "json",
                success: function (data) {
                    $('#ModalAgregar').modal('show');
                    $('#Empresa').val(data.NombreEmpresa);
                    $('#NombreSucursal').val(data.NombreSucursal);
                    $('#IdEstado').val(data.NombreEstado);
                    //$('#prueba').val(data.NombreEmpresa);
                    $('#Region').val(data.NombreEmpresa);
                    //$('#last_name').val(data.last_name);
                    $('.modal-title').text("Actualizar puesto");
                    $('#sucursal_id').val(sucursal_id);
                    $('#action').val("Actualizar");
                    $('#operation').val("Edit");


                }
            })
        });





    });
</script>


<script>
    $(document).ready(function () {

        readCurso(); /* it will load products when document loads */

        $(document).on('click', '#Eliminar', function (e) {

            var IdSucursal = $(this).data('id');
            SwalDelete(IdSucursal);
            e.preventDefault();
            //alert(IdPuesto);
        });

    });

    function SwalDelete(IdSucursal) {

        swal({
            title: '¿Estás seguro?',
            text: "Será eliminado permanentemente!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, borralo!',
            showLoaderOnConfirm: true,

            preConfirm: function () {
                return new Promise(function (resolve) {

                    $.ajax({
                            url: 'Eliminar/Eliminar_Sucursal.php',
                            type: 'POST',
                            data: 'delete=' + IdSucursal,
                            dataType: 'json'

                        })
                        .done(function (response) {
                            swal('Eliminado!', response.message, response.status);
                            readCurso();

                        })
                        .fail(function () {
                            swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
                        });
                });
            },
            allowOutsideClick: false
        });

    }

    function readCurso() {
        $('#TablaSucursal').load('Tablas/TablaSucursal.php');
    }
</script>