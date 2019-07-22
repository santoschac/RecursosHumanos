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
                                <h4>Asignar Jornadas</h4>
                                
                                
                               <a href="VAlta_AsignarJornada.php"> <button type="button" class="btn btn-primary" >Asignar</button></a>
                           
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

<div id="TablaAsignarJornada"></div> <!-- products will be load here -->


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
				    
					if(data==1)
					{
						readAsignarJornada();
						$('#ModalAgregar').modal('hide');
						$("#exito").fadeIn();
						setTimeout(function(){
						$("#exito").fadeOut();
						},2000);
						$('#NombrePuesto').val('');
					}
                    else if(data ==2)
                    {
						readAsignarJornada();
						$('#ModalAgregar').modal('hide');
						$("#actu").fadeIn();
						setTimeout(function(){
						$("#actu").fadeOut();
						},2000);
						$('#NombrePuesto').val('');
					}else if(data == 3){
						$('#ModalAgregar').modal('hide');
                        $("#error").fadeIn();
						setTimeout(function(){
						$("#error").fadeOut();
						},2000);
						$('#NombrePuesto').val('');

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
		
		readAsignarJornada(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdAsignarJornada = $(this).data('id');
			SwalDelete(IdAsignarJornada);
            e.preventDefault();
            //alert(IdAsingnarJornada);
		});
		
	});
	
	function SwalDelete(IdAsignarJornada){
	
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
			   		url: "Eliminar/Eliminar_AsignarJornada.php",
			    	type: 'POST',
			       	data: 'delete='+IdAsignarJornada,
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readAsignarJornada();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    function readAsignarJornada(){
		$('#TablaAsignarJornada').load('Tablas/TablaAsignarJornada.php');	
	}
    
</script> 