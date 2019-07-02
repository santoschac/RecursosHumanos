<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");

?>
        
   <!-- Sweet Alert
		============================================ -->
        <link rel="stylesheet" href="../Recursos/sweetalert/sweetalert2.min.css" type="text/css" />


<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
         <br/>
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                <h4>Lista de Poblaciones</h4>
                                
                                <div class="add-product">
                                <button type="button" class="btn btn-primary" data-toggle="modal" id="boton_agregar" data-target="#ModalAgregar">Agregar Población</button>
                            </div>
                                </div>
							</div>
							    <!--Alertas-->
                                <div class="alert alert-success" id="exito"  style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Datos insertados con éxito
                                </div>

                                <div class="alert alert-success" id="actu"  style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Datos actualizados con éxito
                                </div>

                                <div class="alert alert-danger alert-mg-b" id="error"  style="display:none">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                    El nombre ya existe
                            </div>
                                <!--Fin alertas-->
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">

<div id="TablaPoblacion"></div> <!-- products will be load here -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <br>
        <!-- Static Table End -->

        <style>
    #mdialTamanio{
      width: 35% !important;
      
      }
  </style>
        <!--modal Agregar-->
        <div id="ModalAgregar" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog" id="mdialTamanio">
                                <form method="post" id="formulario" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Agregar Población</h4>
                                       
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-body">
                                     
                                       <!--Agregar form dentro del modal-->
                                      
                                       <div class="row" >
                                       
                                       <div class="form-group-inner">

									   <div class="form-group">
                                                                <label>Pais</label>

                                                                <select name="IdPais" id="IdPais" class="form-control" required>
                                                                    <option value="" selected="" disabled="" >Seleccionar</option>
                                                                    <?php foreach ($pdo->query('SELECT IDPais, NombrePais FROM pais') as $row):?>													
                                                                     <option value="<?php echo $row['IDPais']?>"><?php echo $row['NombrePais']?></option>

                                                                <?php endforeach; ?>
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Estado</label>
                                                                <select name="IdEstado" id="IdEstado" class="form-control" required>
                                                                    <option value="" selected="" disabled="" required>Seleccionar</option>
                                                                </select>
                                                            </div>
									   


                                                        <label>Población</label>
                                                        <input type="text" id="NombrePoblacion" name="NombrePoblacion" class="form-control" placeholder="Escriba el nombre de la población" required maxlength="50"/>
                                                        <br/>
                                                    </div>
                                                    <!-- <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Guardar</button>
                                                            <a href="Puestos.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
                                                        </div>
                                                    </div> -->
                                       
                                        </div>
                                        
                                       <!--Fin Agregar form dentro del moal-->
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="poblacion_id" id="poblacion_id" />
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



    
<script type="text/javascript" language="javascript" >

$(document).ready(function () {
        $("#IdPais").change(function () {
            // e.preventDefault();

            $("#IdPais option:selected").each(function () {
                IdPais = $(this).val();
                $.post("Combo/Seleccionar_Estado.php", {
                    IdPais: IdPais
                    },
                    function (data) {
                        $("#IdEstado").html(data);
                    });
            });
        });
    });


$(document).ready(function(){
    $('#boton_agregar').click(function(){
		$('#formulario')[0].reset();
		$('.modal-title').text("Agregar Población");
		$('#action').val("Agregar");
		$('#operation').val("Add");
        
		
	});
	

	$(document).on('submit', '#formulario', function(event){
		event.preventDefault();
		var datos = $('#formulario').serialize();
		
//alert(datos);
			$.ajax({
				url:"Alta/Alta_Poblacion.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
				    //alert(data);
					//$('#formulario')[0].reset();
					if(data==1)
					{
						readPoblacion();
						$('#ModalAgregar').modal('hide');
						$("#exito").fadeIn();
						setTimeout(function(){
						$("#exito").fadeOut();
						},2000);
						$('#formulario')[0].reset();
					}
                    else if(data ==2)
                    {
						readPoblacion();
						$('#ModalAgregar').modal('hide');
						$("#actu").fadeIn();
						setTimeout(function(){
						$("#actu").fadeOut();
						},2000);
						$('#formulario')[0].reset();
					}else if(data == 3){
						$('#ModalAgregar').modal('hide');
                        $("#error").fadeIn();
						setTimeout(function(){
						$("#error").fadeOut();
						},2000);
						$('#formulario')[0].reset();

                    }

				}
			});
		
	});

    $(document).on('click', '.update', function(){
		var poblacion_id = $(this).attr("id");
		//alert(poblacion_id);
		$.ajax({
			url:"Editar/Editar_Poblacion.php",
			method:"POST",
			data:{poblacion_id:poblacion_id},
			dataType:"json",
			success:function(data)
			{
				$('#ModalAgregar').modal('show');
			    $('#IDPais').val(data.IDPais);
				//$('#IdEstado').val(data.IdEstado);
				$('#NombrePoblacion').val(data.NombrePoblacion);				
				$('.modal-title').text("Actualizar Población");
				$('#poblacion_id').val(poblacion_id);
				$('#action').val("Actualizar");
                $('#operation').val("Edit");
                $('#formulario')[0].reset();
                
            
			}
		})
	});
	
	
	
	
});
</script>

   

<script >

	$(document).ready(function(){
		
		readPoblacion(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdPoblacion = $(this).data('id');
			SwalDelete(IdPoblacion);
            e.preventDefault();
            //alert(IdPuesto);
		});
		
	});
	
	function SwalDelete(IdPoblacion){
		
		swal({
			title: '¿Estás seguro?',
			text: "Será eliminado permanentemente",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Aceptar',
			showLoaderOnConfirm: true,
			 
			preConfirm: function() {
			  return new Promise(function(resolve) {
			        
			     $.ajax({
			   		url: "Eliminar/Eliminar_Poblacion.php",
			    	type: 'POST',
			       	data: 'delete='+IdPoblacion,
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readPoblacion();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    function readPoblacion(){
		$('#TablaPoblacion').load('Tablas/TablaPoblacion.php');	
	}
    
</script> 

