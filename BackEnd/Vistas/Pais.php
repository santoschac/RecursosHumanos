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
                                <h4>Lista de Paises</h4>
                                
                                <div class="add-product">
                                <button type="button" class="btn btn-primary" data-toggle="modal" id="boton_agregar" data-target="#ModalAgregar">Agregar País</button>
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

<div id="TablaPais"></div> <!-- products will be load here -->


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
                                        <h4 class="modal-title">Agregar País</h4>
                                       
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-body">
                                     
                                       <!--Agregar form dentro del moal-->
                                      
                                       <div class="row" >
                                       
                                       <div class="form-group-inner">
                                                        <br/>
                                                        <label>País</label>
                                                        <input type="text" id="NombrePais" name="NombrePais" class="form-control" placeholder="Escriba el nombre del País" required maxlength="50"/>
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
                                        <input type="hidden" name="pais_id" id="pais_id" />
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
		var NombrePais = $('#NombrePais').val();
		
		
			$.ajax({
				url:"Alta/Alta_Pais.php",
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
						readPais();
						$('#ModalAgregar').modal('hide');
						$("#exito").fadeIn();
						setTimeout(function(){
						$("#exito").fadeOut();
						},2000);
						$('#NombrePais').val('');
					}
                    else if(data ==2)
                    {
						readPais();
						$('#ModalAgregar').modal('hide');
						$("#actu").fadeIn();
						setTimeout(function(){
						$("#actu").fadeOut();
						},2000);
						$('#NombrePais').val('');
					}else if(data == 3){
						$('#ModalAgregar').modal('hide');
                        $("#error").fadeIn();
						setTimeout(function(){
						$("#error").fadeOut();
						},2000);
						$('#NombrePais').val('');

                    }

				}
			});
		
		
	});

    $(document).on('click', '.update', function(){
		var pais_id = $(this).attr("id");
		$.ajax({
			url:"Editar/Editar_Pais.php",
			method:"POST",
			data:{pais_id:pais_id},
			dataType:"json",
			success:function(data)
			{
				$('#ModalAgregar').modal('show');
				$('#NombrePais').val(data.NombrePais);
				//$('#last_name').val(data.last_name);
				$('.modal-title').text("Actualizar país");
				$('#pais_id').val(pais_id);
				$('#action').val("Actualizar");
                $('#operation').val("Edit");
                
            
			}
		})
	});
	
	
	
	
});
</script>

   

<script >

	$(document).ready(function(){
		
		readPais(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdPais = $(this).data('id');
			SwalDelete(IdPais);
            e.preventDefault();
            //alert(IdPuesto);
		});
		
	});
	
	function SwalDelete(IdPais){
		
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
			   		url: "Eliminar/Eliminar_Pais.php",
			    	type: 'POST',
			       	data: 'delete='+IdPais,
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readPais();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    function readPais(){
		$('#TablaPais').load('Tablas/TablaPais.php');	
	}
    
</script> 
