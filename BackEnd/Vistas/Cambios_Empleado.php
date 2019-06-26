<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");

$IdPersonal = $_GET['IdPersonal'];

$sql= $pdo->prepare("SELECT  c.IdCambio, c.FechaInicio, c.IdPersonal, c.IdSucursal, pu.NombrePuesto, s.NombreSucursal, e.NombreEmpresa, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno
from cambios c
inner join puestos pu on c.IdPuesto = pu.IdPuesto
inner join sucursal s on c.IdSucursal = s.IdSucursal
inner join empresa e on s.IdEmpresa = e.IdEmpresa
inner join personal p on c.IdPersonal = p.IdPersonal where c.IdPersonal = $IdPersonal");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);




$sql1 = 'SELECT * from personal WHERE IdPersonal = :IdPersonal';
$sentencia = $pdo->prepare($sql1);
$sentencia ->execute([':IdPersonal'=>$IdPersonal]);
$empleado = $sentencia->fetch(PDO::FETCH_OBJ);

?>
        
   <!-- Sweet Alert
		============================================ -->
        <link rel="stylesheet" href="../Recursos/sweetalert/sweetalert2.min.css" type="text/css" />

        <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">

<!-- Static Table Start -->
<div class="data-table-area mg-b-15">
         <br/>
            <div class="container-fluid" >
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                <h4>Cambios de: <?php echo $empleado->Nombre ." ". $empleado->ApellidoPaterno ." ". $empleado->ApellidoMaterno?></h4>
                                
                                
                                <!-- <a href="VAlta_Cambio.php"><button type="button" class="btn btn-primary" >Agregar Cambio</button></a>
                             -->
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

                                <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="true" data-show-refresh="true" data-key-events="true" data-show-toggle="true" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Personal</th>
                                            <th>Fecha inicio</th>
                                            <th>Empresa</th>
                                            <th>Sucursal</th>                                                              
                                            <th>Puesto</th>                         
                                            <!-- <th>Configuración</th> -->
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdCambio']; ?></td>
                                                <td><?php echo $dato['Nombre'] ." ". $dato['ApellidoPaterno'] ." ". $dato['ApellidoMaterno'] ?></td>
                                                <td><?php echo date("d-m-Y", strtotime( $dato['FechaInicio'])); ?></td>
                                                <td><?php echo $dato['NombreEmpresa']; ?></td>
                                                <td><?php echo $dato['NombreSucursal']; ?></td>
                                                <td><?php echo $dato['NombrePuesto']; ?></td>
                                               
                                                <!-- <td>
                                                    <a href="VEditar_Cambio.php?IdCambio=<?php echo $dato['IdCambio']; ?>"><button  title="Editar" class="pd-setting-ed"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdCambio']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td> -->
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>

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

 <!-- data table JS
		============================================ -->
        <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

    



    
   

<script >

	$(document).ready(function(){
		
		readCambio(); /* it will load products when document loads */
		
		$(document).on('click', '#Eliminar', function(e){
			
			var IdCambio = $(this).data('id');
			SwalDelete(IdCambio);
            e.preventDefault();
            //alert(IdPuesto);
		});
		
	});
	
	function SwalDelete(IdCambio){
		
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
			   		url: "Eliminar/Eliminar_Cambio.php",
			    	type: 'POST',
			       	data: 'delete='+IdCambio,
                    dataType: 'json'
                      
			     })
			     .done(function(response){
			     	swal('Eliminado!', response.message, response.status);
                     readCambio();
                    
			     })
			     .fail(function(){
			     	swal('Oops...', 'Algo salió mal con el ajax. !', 'error');
			     });
			  });
		    },
			allowOutsideClick: false			  
		});	
		
	}

    // function readCambio(){
	// 	$('#TablaCambioEmpleado').load('Tablas/TablaCambioEmpleado.php');	
	// }
    
</script> 

