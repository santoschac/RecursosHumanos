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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h4>Lista de Sucursales</h4>
                                    
                                
                                <a href="VAlta_Curso.php"><button type="button" class="btn btn-primary" >Agregar Curso</button></a>
                            
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

          
                                       
                                      
        
         
        
        <?php
        include ("../Master/Footer.php");
        ?>

<script src="../Recursos/sweetalert/sweetalert2.min.js"></script>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
   
	

	$(document).on('submit', '#formulario', function(event){
        event.preventDefault();
        var datos = $('#formulario').serialize();
		// var Nombre = $('#NombreCurso').val();
        // var Descripcion = $('#DescripcionCurso').val();
        // var Tipo = $('Tipo').val();
        // var Fecha = $('Fecha').val();
		//alert(datos);
		if(Nombre != '' && Descripcion != '')
		{
			
			$.ajax({
				url:"Alta/Alta_Curso.php",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
				    //alert(data);
					//$('#formulario')[0].reset();
					if(data==1){
					readCurso();
					$("#exito").fadeIn();
					setTimeout(function(){
					$("#exito").fadeOut();
					},2000);
					$('#NombreCurso').val('');
					}
                    else if(data ==2)
                    {
                        readCurso();
					$("#actu").fadeIn();
					setTimeout(function(){
					$("#actu").fadeOut();
					},2000);
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

    $(document).on('click', '.update', function(){
        var curso_id = $(this).attr("id");
    //    alert(curso_id);
		$.ajax({
			url:"Editar/Editar_Curso.php",
			method:"POST",
			data:{curso_id:curso_id},
			dataType:"json",
			success:function(data)
			{
				$('#ModalAgregar').modal('show');
                $('#NombreCurso').val(data.Nombre);
                $('#DescripcionCurso').val(data.Fecha);
                $('Tipo').val(data.Tipo);
                $('Fecha').val(data.Fecha);
				//$('#last_name').val(data.last_name);
				$('.modal-title').text("Actualizar puesto");
				$('#curso_id').val(curso_id);
				$('#action').val("Edit");
                $('#operation').val("Edit");

			}
		})
	});
	
	
	
	
});
</script>


<script >

	$(document).ready(function(){
		
		readCurso(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdCurso = $(this).data('id');
			SwalDelete(IdCurso);
            e.preventDefault();
            //alert(IdPuesto);
		});
		
	});
	
	function SwalDelete(IdCurso){
		
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
			   		url: 'Eliminar/Eliminar_Curso.php',
			    	type: 'POST',
			       	data: 'delete='+IdCurso,
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readCurso();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    function readCurso(){
		$('#TablaSucursal').load('Tablas/TablaSucursal.php');	
	}
    
</script>
           