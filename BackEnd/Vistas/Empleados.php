<?php
include ("../Master/Header.php");
include ("../Modelo/Conexion.php");

?>
         
          <!-- Sweet Alert
		============================================ -->
        <link rel="stylesheet" href="../Recursos/sweetalert/sweetalert2.min.css" type="text/css" />


                   <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                 <!---->
                             
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Lista de Empleados</h4>
                                    <a href="VAlta_Empleado.php"><button type="button" class="btn btn-primary" >Agregar Empleado</button></a>
                                </div>
                                <form method="post" action="Tablas/TablaPersonal.php">
                                <div class="col-md-3">
                                                            <label>Empresa</label>
                                                            <?php
                                                            $sql = $pdo->prepare('SELECT IdEmpresa, NombreEmpresa FROM empresa') ;
                                                            $sql->execute();
                                                            $result=$sql->fetchAll(PDO::FETCH_ASSOC);
                                                            
                                                            ?>
                                                            <select name="IdEmpresa" id="IdEmpresa" class="form-control" required>
                                                            <option value="" selected="" disabled="">Seleccionar</option>
                                                                <?php foreach ($result as $dato) {?>
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
                                <div class="col-md-3"><br/>
                                <button class="btn btn-primary" type="submit">Aceptar</button>
                                <br/><br/>
                                </div>
                                </form>
                            <!---->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
         <!-- Static Table Start -->
         <div class="data-table-area mg-b-15">
         
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                <!-- <h4>Lista de Empleados</h4>
                                </div>
                                <a href="VAlta_Empleado.php"><button type="button" class="btn btn-primary" >Agregar Empleado</button></a>
                             -->
                            
                            </div>
                             <!---->
                             <!-- <br/>
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Lista de Empleados</h4>
                                    <a href="VAlta_Empleado.php"><button type="button" class="btn btn-primary" >Agregar Empleado</button></a>
                                </div>
                                <div class="col-md-3">
                                                            <label>Empresa</label>
                                                            <?php
                                                            $sql = $pdo->prepare('SELECT IdEmpresa, NombreEmpresa FROM empresa') ;
                                                            $sql->execute();
                                                            $result=$sql->fetchAll(PDO::FETCH_ASSOC);
                                                            
                                                            ?>
                                                            <select name="IdEmpresa" id="IdEmpresa" class="form-control" required>
                                                            <option value="" selected="" disabled="">Seleccionar</option>
                                                                <?php foreach ($result as $dato) {?>
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
                                <div class="col-md-3"><br/>
                                <button class="btn btn-primary">Aceptar</button>
                                <br/><br/>
                                </div>
                                <br/> -->
                            <!---->
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">                                                
                                    
                                    <!--tabla-->
                                    <div id="TablaPersonal"></div>
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
		
		readPersonal(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdPersonal = $(this).data('id');
            var IdUsuario = $(this).data('idd');
            //alert(IdUsuario);
			SwalDelete(IdPersonal, IdUsuario);
            e.preventDefault();
           // alert(IdPersonal);
		});
		
	});
	
	function SwalDelete(IdPersonal, IdUsuario){
		
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
			        
                var params = {
    "delete" : IdPersonal,
    "IdUsuario" : IdUsuario
};
			     $.ajax({
			   		url: 'Eliminar/Eliminar_Personal.php',
			    	type: 'POST',
			       	data: params, 
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readPersonal();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    function readPersonal(){
		$('#TablaPersonal').load('Tablas/TablaPersonal.php');	
	}
    
</script>