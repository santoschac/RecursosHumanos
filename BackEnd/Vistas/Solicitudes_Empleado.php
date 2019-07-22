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
                                <div >
                                    <h4>Solicitudes realizadas</h4>
                                    <div class="add-product">
                                <a href="MenuEmpleado.php?IdPersonal=<?php echo $_SESSION['IdPersonal']?>">Regresar</a>
                            </div>
                                
                                <!-- <a href="VAlta_Curso.php"><button type="button" class="btn btn-primary" >Agregar Curso</button></a>-->
                                </div>
                            </div>
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">                                                
                                   
                                   
                                   <!--tabla-->
                                   <div id="TablaSolicitudesEmpleado"></div>
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

<script >

	$(document).ready(function(){
		
		readSolicitudesEmpleado(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdSolicitudes = $(this).data('id');
			SwalDelete(IdSolicitudes);
            e.preventDefault();
            //alert(IdPuesto);
		});
		
	});
	
	function SwalDelete(IdSolicitudes){
		
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
			   		url: 'Eliminar/Eliminar_SolicitudHistorial.php',
			    	type: 'POST',
			       	data: 'delete='+IdSolicitudes,
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readSolicitudesEmpleado();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    function readSolicitudesEmpleado(){
		$('#TablaSolicitudesEmpleado').load('Tablas/TablaSolicitudesEmpleado.php');	
	}
    
</script>