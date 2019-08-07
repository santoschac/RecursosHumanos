<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");

if(isset($_POST['todos'])){   
    unset($_SESSION['IdSucursal']);
   
}
?>

   <!-- Sweet Alert
		============================================ -->
        <link rel="stylesheet" href="../Recursos/sweetalert/sweetalert2.min.css" type="text/css" />

<?php if($_SESSION['IdTipoUsuario']==1){ ?>
    <!-- Mobile Menu end -->
    <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                 <!---->
                             
                            <div class="row">
                                <div class="col-md-3">
                                <h4>Vacaciones</h4>
                                <a href="VAlta_Vacaciones.php"><button type="button" class="btn btn-primary" >Agregar</button></a>
                                
                                  </div>
                                <form method="post" action="#" id="formulariotabla">
                                <div class="col-md-3">
                                    <label>Empresa</label>
                                    <select name="IdEmpresa" id="IdEmpresa" class="form-control" required>
                                      <option value="" selected="" disabled="">Seleccionar</option>
                                       <?php foreach ($pdo->query('SELECT IdEmpresa, NombreEmpresa from empresa')as $dato){?>
                                       <option value="<?php echo $dato['IdEmpresa'];?>"> <?php echo $dato['NombreEmpresa']; ?> </option>
                                       <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                <label>Sucursal</label>
                                                            <select name="IdSucursal" id="IdSucursal"class="form-control" required>
                                                                <option value="" selected="" disabled="">Seleccionar</option>
                                                            </select>           
                                </div>
                                <div class="col-md-1"><br/>
                                <button class="btn btn-primary" type="submit">Aceptar</button>
                                </div> 
                                </form>
                                <form method="post">
                                <div class="col-md-1"><br/>
                                <input type="hidden" name="todos" id="todos" value="todos">
                                <button class="btn btn-success" type="submit">Ver todos</button>
                                </div>
                                </form>
                                
                               
                                
                            <!---->
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                <!-- <h4>Vacaciones</h4>
                                <a href="VAlta_Vacaciones.php"><button type="button" class="btn btn-primary" >Agregar</button></a>
                                <div class="add-product">
                                             <a href="Calendario.php">Calendario</a>
                                        </div>
                                </div> -->
                                
                                <a href="Calendario.php"><button type="button" class="btn btn-primary" >Calendario</button></a>
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

<div id="TablaVacaciones"></div> <!-- products will be load here -->


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
<?php }else{echo "<br/><h1>No se puede acceder a este sitio</h1>";}?>

<script src="../Recursos/sweetalert/sweetalert2.min.js"></script>

   

<script >

	$(document).ready(function(){
		
		readVacaciones(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdVacaciones = $(this).data('id');
			SwalDelete(IdVacaciones);
            e.preventDefault();
            //alert(IdPuesto);
		});
		
	});
	
	function SwalDelete(IdVacaciones){
		
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
			   		url: "Eliminar/Eliminar_Vacaciones.php",
			    	type: 'POST',
			       	data: 'delete='+IdVacaciones,
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readVacaciones();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    function readVacaciones(){
		$('#TablaVacaciones').load('Tablas/TablaVacaciones.php');	
	}
    $(document).ready(function () {
        $("#IdEmpresa").change(function () {
            // e.preventDefault();

            $("#IdEmpresa option:selected").each(function () {
                IdEmpresa = $(this).val();
                
                $.post("Combo/Seleccionar_Sucursal.php", {
                    IdEmpresa: IdEmpresa
                    },
                    function (data) {
                        
                        $("#IdSucursal").html(data);
                    });
            });
        });
    });

    $(document).ready(function(){
       
       $(document).on('submit', '#formulariotabla', function(event){
           event.preventDefault();
           var datos = $('#formulariotabla').serialize();

               $.ajax({
                   url:"Tablas/TablaVacaciones.php",
                   method:'POST',
                   data:new FormData(this),
                   contentType:false,
                   processData:false,
                   success:function(data)
                   {
                     $("#TablaVacaciones").html(data);
                   }
               });
       });
  
    });
    
</script> 