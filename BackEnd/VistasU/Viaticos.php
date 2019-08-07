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
                                <h4>Viáticos</h4>
                                
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
                                    Solicitud realizada con éxito
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
                                Ocurrio un error
                            </div>
                                <!--Fin alertas-->
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">

<div id="TablaViatico"></div> <!-- products will be load here -->


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <br>
        <!-- Static Table End -->
		<style>
    #mdialTamanio{
      width: 47% !important;
      
      }
  </style>
        
        <!--modal Agregar-->
        <div id="ModalAgregar" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog" id="mdialTamanio">
                                <form method="post" id="formulario" enctype="multipart/form-data">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Nueva Solicitud</h4>
                                       
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                    
                                    <div class="modal-body">
                                     
                                       <!--Agregar form dentro del moal-->
                                      
                                       <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
														<input type="hidden" name="IdPersonal" id="IdPersonal" value="<?php echo $_SESSION['IdPersonal'];?>">
														<div class="form-group">
                                                                <label>Estado</label>
                                                                <select name="IdEstado" id="IdEstado" class="form-control" required>
                                                                    <option value="" selected="" disabled="" >Seleccionar</option>
																	<?php foreach($pdo->query("SELECT IdEstado, NombreEstado from estado") as $row):?>
																	<option value="<?php echo $row['IdEstado'];?>"><?php echo $row['NombreEstado']; ?></option>
																	<?php endforeach;?>
                                                                </select>
                                                            </div>
															<div class="form-group">
                                                                <label>Población</label>
                                                                <select name="IdPoblacion" id="IdPoblacion" class="form-control" required>
                                                                    <option value="" selected="" disabled="" >Seleccionar</option>																	
                                                                </select>
                                                            </div>
                                                                <!-- <div class="form-group res-mg-t-15">
                                                                    <label>Descripción</label>
                                                                    <textarea name="DescripcionCurso" id="DescripcionCurso" placeholder="Realice una breve descripción" required="" maxlength="200"></textarea>
                                                                </div>
                                                                 -->
                                                            
                                                            
                                                                
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        
																<div class="form-group">
																	<label>Fecha</label>
																	<div class="input-group date">
																		<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
																		<input type="date" name="Fecha" id="Fecha" class="form-control" value="<?php echo date("Y-m-d"); ?>" readonly>
																	</div>
																</div>

																<div class="form-group">
                                                                <label>Monto $</label>
                                                                <input type="text" name="Monto" id="Monto" class="form-control" required onkeypress="return numeros(event)" maxlength="6">                                                                     
                                                               </div>

                                    
														</div>
														<div class="form-group res-mg-t-15">
															<label text:aling="left">Motivo</label>
															<textarea name="Motivo" id="Motivo" placeholder="Escriba el motivo" required="" maxlength="200"></textarea>
														</div>
														
                                                    </div>
                                                   
                                       <!--Fin Agregar form dentro del moal-->
                                    </div>
                                    <div class="modal-footer">
                                        <input type="hidden" name="solicitudes_id" id="solicitudes_id" />
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
<!-- validar solo numeros
		============================================ -->
        <script>
        function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}

</script>

    
<script type="text/javascript" language="javascript" >
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


$(document).ready(function(){
    $('#boton_agregar').click(function(){
		$('#formulario')[0].reset();
		$('.modal-title').text("Agregar Viático");
		$('#action').val("Agregar");
		$('#operation').val("Add");
        
		
	});
	

	$(document).on('submit', '#formulario', function(event){
		event.preventDefault();
		
		var datos = $('#formulario').serialize();
		//alert(datos);
			$.ajax({
				url:"Alta/Alta_Viatico.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
				   
					if(data==1)
					{
						
						$('#ModalAgregar').modal('hide');
						$("#exito").fadeIn();
						setTimeout(function(){
						$("#exito").fadeOut();
						},2000);
						readViatico();
					
					}
                    else if(data ==2)
                    {
						
						$('#ModalAgregar').modal('hide');
						$("#actu").fadeIn();
						setTimeout(function(){
						$("#actu").fadeOut();
						},2000);
						readViatico();
						
					}else if(data == 3){
						$('#ModalAgregar').modal('hide');
                        $("#error").fadeIn();
						setTimeout(function(){
						$("#error").fadeOut();
						},2000);
				

                    }

				}
			});
		
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
		
		readViatico(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdViatico = $(this).data('id');
			SwalDelete(IdViatico);
            e.preventDefault();
            //alert(IdPuesto);
		});
		
	});
	
	function SwalDelete(IdViatico){
		
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
			   		url: "Eliminar/Eliminar_Viatico.php",
			    	type: 'POST',
			       	data: 'delete='+IdViatico,
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readViatico();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    function readViatico(){
		$('#TablaViatico').load('Tablas/TablaViatico.php');	
	}
    
</script> 