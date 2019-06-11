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
                                <h4>Lista de Cambios</h4>
                                
                                <div class="add-product">
                                <button type="button" class="btn btn-primary" data-toggle="modal" id="boton_agregar" data-target="#ModalAgregar">Agregar Cambio</button>
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

<div id="TablaCambio"></div> <!-- products will be load here -->


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
                                <form method="post" id="formulario" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Agregar puesto</h4>
                                       
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-body">
                                     
                                       <!--Agregar form dentro del moal-->
                                      
                                       <div class="row" >
                                       
                                       <div class="form-group-inner">
                                                        <br/>
                                                        <label>Nombre del Puesto</label>
                                                        <input type="text" id="NombrePuesto" name="NombrePuesto" class="form-control" placeholder="Escriba el nombre del puesto" required maxlength="50"/>
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
                                        <input type="hidden" name="puesto_id" id="puesto_id" />
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
		$('.modal-title').text("Agregar Puesto");
		$('#action').val("Agregar");
		$('#operation').val("Add");
        
		
	});
	

	$(document).on('submit', '#formulario', function(event){
		event.preventDefault();
		var Nombre = $('#NombrePuesto').val();
		
		
		if(Nombre != '')
		{
			
			$.ajax({
				url:"Alta/Alta_Puestos.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
				    //alert(data);
					//$('#formulario')[0].reset();
					if(data==1){
					readPuesto();
					$('#ModalAgregar').modal('hide');
					$("#exito").fadeIn();
					setTimeout(function(){
					$("#exito").fadeOut();
					},2000);
					$('#NombrePuesto').val('');
					}
                    else if(data ==2)
                    {
						readPuesto();
						$('#ModalAgregar').modal('hide');
					$("#actu").fadeIn();
					setTimeout(function(){
					$("#actu").fadeOut();
					},2000);
					$('#NombrePuesto').val('');
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

    $(document).on('click', '.update', function(){
		var puesto_id = $(this).attr("id");
		$.ajax({
			url:"Editar/Editar_Puesto.php",
			method:"POST",
			data:{puesto_id:puesto_id},
			dataType:"json",
			success:function(data)
			{
				$('#ModalAgregar').modal('show');
				$('#NombrePuesto').val(data.NombrePuesto);
				//$('#last_name').val(data.last_name);
				$('.modal-title').text("Actualizar puesto");
				$('#puesto_id').val(puesto_id);
				$('#action').val("Actualizar");
                $('#operation').val("Edit");
                
            
			}
		})
	});
	
	
	
	
});
</script>

   

<script >

	$(document).ready(function(){
		
		readCambio(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdPuesto = $(this).data('id');
			SwalDelete(IdPuesto);
            e.preventDefault();
            //alert(IdPuesto);
		});
		
	});
	
	function SwalDelete(IdPuesto){
		
		swal({
			title: '¿Estás seguro?',
			text: "Será eliminado permanentemente!",
			type: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Si, borralo!',
			showLoaderOnConfirm: true,
			 
			preConfirm: function() {
			  return new Promise(function(resolve) {
			        
			     $.ajax({
			   		url: "Eliminar/Eliminar_Puesto.php",
			    	type: 'POST',
			       	data: 'delete='+IdPuesto,
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readPuesto();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    function readCambio(){
		$('#TablaCambio').load('Tablas/TablaCambio.php');	
	}
    
</script> 

