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
                                <h4>Jornadas</h4>
                                
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

<div id="TablaJornada"></div> <!-- products will be load here -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <br>
        <!-- Static Table End -->
		<style>
    #mdialTamanio{
      width: 45% !important;
      
      }
  </style>
        
        <!--modal Agregar-->
        <div id="ModalAgregar" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog" id="mdialTamanio">
                                <form method="post" id="formulario" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Agregar jornada</h4>
                                       
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-body">
                                     
                                       <!--Agregar form dentro del moal-->
									 
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>Día inicio</label><br/>
                                                                <select name="FechaInicio" id="FechaInicio" class="form-control" required>
																			<option value="" selected="" disabled="">Seleccionar</option>
																			<option value="Lunes">Lunes</option>
																			<option value="Martes">Martes</option>
																			<option value="Miercoles" >Miercoles</option>
																			<option value="Jueves" >Jueves</option>
																			<option value="Viernes" >Viernes</option>
																			<option value="Sábado" >Sábado</option>
																			<option value="Domingo" >Domingo</option>
																			
																		</select>
															</div>
															<div class="form-group">
															 <label>Hora inicio</label>
															 <input type="time" name="HoraInicio" id="HoraInicio" class="form-control" value="" required>
														</div>
                                                            
                                                                
														</div>
														
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        

														<div class="form-group">
                                                                <label>Día fin</label>
																<select name="FechaFin" id="FechaFin" class="form-control">
																			<option value="" selected="" disabled="">Seleccionar</option>
																			<option value="Lunes">Lunes</option>
																			<option value="Martes">Martes</option>
																			<option value="Miercoles" >Miercoles</option>
																			<option value="Jueves" >Jueves</option>
																			<option value="Viernes" >Viernes</option>
																			<option value="Sabado" >Sábado</option>
																			<option value="Domingo" >Domingo</option>
																			
																		</select>
                                                                </div>
                                                        

														<div class="form-group">
															 <label>Hora fin</label>
															 <input type="time" name="HoraFin" id="HoraFin" class="form-control" value="" required>
														</div>
                                                                
                                                        </div>
                                                    
                                                   
                                        
                                       <!--Fin Agregar form dentro del moal-->
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="jornada_id" id="jornada_id" />
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
$(document).ready(function(){
    $('#boton_agregar').click(function(){
		$('#formulario')[0].reset();
		$('.modal-title').text("Agregar Jornada");
		$('#action').val("Agregar");
		$('#operation').val("Add");
        
		
	});
	

	$(document).on('submit', '#formulario', function(event){
		event.preventDefault();
		var datos = $('#formulario').serialize();
		
		
			$.ajax({
				url:"Alta/Alta_Jornada.php",
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
						readJornada();
						$('#ModalAgregar').modal('hide');
						$("#exito").fadeIn();
						setTimeout(function(){
						$("#exito").fadeOut();
						},2000);
						//$('#NombrePuesto').val('');
					}
                    else if(data ==2)
                    {
						readJornada();
						$('#ModalAgregar').modal('hide');
						$("#actu").fadeIn();
						setTimeout(function(){
						$("#actu").fadeOut();
						},2000);
						//$('#NombrePuesto').val('');
					}else if(data == 3){
						$('#ModalAgregar').modal('hide');
                        $("#error").fadeIn();
						setTimeout(function(){
						$("#error").fadeOut();
						},2000);
					//	$('#NombrePuesto').val('');

                    }

				}
			});
		
		
	});

    $(document).on('click', '.update', function(){
		var jornada_id = $(this).attr("id");
		$.ajax({
			url:"Editar/Editar_Jornada.php",
			method:"POST",
			data:{jornada_id:jornada_id},
			dataType:"json",
			success:function(data)
			{
				$('#ModalAgregar').modal('show');
				$('#FechaInicio').val(data.FechaInicio);
				$('#FechaFin').val(data.FechaFin);
				$('#HoraInicio').val(data.HoraInicio);
				$('#HoraFin').val(data.HoraFin);
				$('.modal-title').text("Actualizar puesto");
				$('#jornada_id').val(jornada_id);
				$('#action').val("Actualizar");
                $('#operation').val("Edit");
                
            
			}
		})
	});
	
	
	
	
});
</script>

   

<script >

	$(document).ready(function(){
		
		readJornada(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdJornada = $(this).data('id');
			SwalDelete(IdJornada);
            e.preventDefault();
            //alert(IdPuesto);
		});
		
	});
	
	function SwalDelete(IdJornada){
		
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
			   		url: "Eliminar/Eliminar_Jornada.php",
			    	type: 'POST',
			       	data: 'delete='+IdJornada,
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readJornada();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    function readJornada(){
		$('#TablaJornada').load('Tablas/TablaJornada.php');	
	}
    
</script> 

