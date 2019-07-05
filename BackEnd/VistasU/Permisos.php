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
                                <h4>Permisos</h4>
                                
                                <div class="add-product">
                                <button type="button" class="btn btn-primary" data-toggle="modal" id="boton_agregar" data-target="#ModalAgregar">Agregar</button>
                            </div>
                                </div>
							</div>
							    <!--Alertas-->
                                <div class="alert alert-success" id="exito"  style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Permiso realizada con éxito
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
                                    Error al realizar el permiso
                            </div>
                                <!--Fin alertas-->
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">

<div id="TablaPermisos"></div> <!-- products will be load here -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <br>
        <!-- Static Table End -->
		<style>
    #mdialTamanio{
      width: 50% !important;
      
      }
  </style>
        
        <!--modal Agregar-->
        <div id="ModalAgregar" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog" id="mdialTamanio">
                                <form method="post" id="formulario" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Agregar Permiso</h4>
                                       
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-body">
                                     
                                       <!--Agregar form dentro del moal-->
                                      
                                       <div class="row" >
                                       
                                       <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									   <div class="form-group">
                                                                    <label><strong>Fecha solicitada</strong></label>
                                                                    <div class="input-group date"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                        <input type="date" name="Dia" id="Dia" class="form-control" value="<?php echo date("Y-m-d") ?>">
                                                                    </div>
                                                                </div>
																

									   </div>
									   <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
									   <!-- <div class="form-group">
                                                                <label>Apellido Materno</label>
                                                                    <input name="ApellidoMaterno" id="ApellidoMaterno" value="" type="text" class="form-control" placeholder="Apellido Materno" required="" maxlength="60" required>
                                                                </div> -->
																<div class="form-group">
                                                                <label>Forma de devolución</label>
                                                                    <select name="Devolucion" id="Devolucion" class="form-control" >
																		<option value="" disabled selected >Seleccionar</option>
																		<option value="Cuenta de vacaciones" >Cuenta de vacaciones</option>
																		<option value="Devolución de días">Devolución de días</option>
																	</select>
                                                                </div>
																
										</div>
										<div class="form-group res-mg-t-15">
                                                                <label>Descripción del permiso</label>
                                                                <textarea name="Descripcion" id="Descripcion"
                                                                    placeholder="Descripción del permiso" ></textarea>
                                                            </div>        
                                       
                                        </div>
										
                                        
                                       <!--Fin Agregar form dentro del moal-->
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="permiso_id" id="permiso_id" />
										<input type="hidden" name="operation" id="operation" />
										<input type="submit" name="action" id="action" class="btn btn-primary" value="Agregar" />
                                        <button data-dismiss="modal" class="btn btn-danger" href="#">Cancelar</button>                                       
                                    </div>
                                </div>
                                <form>
                            </div>
                        </div>
						</div>
        <!--fin modal agregar-->




      

<?php
 include ("../Master/Footer.php");
?>

<script src="../Recursos/sweetalert/sweetalert2.min.js"></script>



    
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
    $('#boton_agregar').click(function(){
		$('#formulario')[0].reset();
		$('.modal-title').text("Solicitar Permiso");
		$('#action').val("Agregar");
		$('#operation').val("Add");
        
		
	});
	

	$(document).on('submit', '#formulario', function(event){
		event.preventDefault();
		var datos= $('#formulario').serialize();
		//alert(datos);
		
			
			$.ajax({
				url:"Alta/Alta_Permisos.php",
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
						readPermisos();
						$('#ModalAgregar').modal('hide');
						$("#exito").fadeIn();
						setTimeout(function(){
						$("#exito").fadeOut();
						},2000);
						$('#formulario')[0].reset();
					}
                    else if(data ==2)
                    {
						readPermisos();
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
		var permiso_id = $(this).attr("id");
		$.ajax({
			url:"Editar/Editar_Permisos.php",
			method:"POST",
			data:{permiso_id:permiso_id},
			dataType:"json",
			success:function(data)
			{
				$('#ModalAgregar').modal('show');
				$('#NombrePuesto').val(data.NombrePuesto);
				//$('#last_name').val(data.last_name);
				$('.modal-title').text("Actualizar puesto");
				$('#permiso_id').val(permiso_id);
				$('#action').val("Actualizar");
                $('#operation').val("Edit");
                
            
			}
		})
	});
	
	
	
	
});
</script>

   

<script >

	$(document).ready(function(){
		
		readPermisos(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdPermiso = $(this).data('id');
			SwalDelete(IdPermiso);
            e.preventDefault();
            //alert(IdPuesto);
		});
		
	});
	
	function SwalDelete(IdPermiso){
		
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
			   		url: "Eliminar/Eliminar_Permiso.php",
			    	type: 'POST',
			       	data: 'delete='+IdPermiso,
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readPermisos();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    function readPermisos(){
		$('#TablaPermisos').load('Tablas/TablaPermisos.php');	
	}
    
</script> 