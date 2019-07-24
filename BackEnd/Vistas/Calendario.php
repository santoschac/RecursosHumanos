<?php
require_once('../Modelo/Conexion.php');

if(isset($_POST['IdSucursal'])){
	$_SESSION['IdSucursal'] = $_POST['IdSucursal'];
}

if(isset($_POST['todos'])){   
	if(isset($_SESSION['IdSucursal'])){
		unset($_SESSION['IdSucursal']);
	}
   
}


if(isset($_SESSION['IdSucursal']))
{
	$IdSucursal= $_SESSION['IdSucursal'];

	$sql = "SELECT v.IdVacaciones, v.Titulo, v.Color, v.FechaInicio, DATE_ADD(v.FechaFinal, INTERVAL 1 DAY) as FechaFinal, v.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno , s.IdSucursal, s.NombreSucursal
	from vacaciones v
	inner join personal p on v.IdPersonal = p.IdPersonal
    inner join sucursal s on p.IdSucursal = s.IdSucursal where s.IdSucursal = $IdSucursal";
	$sentencia = $pdo->prepare($sql);
	$sentencia->execute();
	$vacaciones = $sentencia->fetchAll();
}
else
{
	$sql = "SELECT v.IdVacaciones, v.Titulo, v.Color, v.FechaInicio, DATE_ADD(v.FechaFinal, INTERVAL 1 DAY) as FechaFinal, v.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno
	from vacaciones v
	inner join personal p on v.IdPersonal = p.IdPersonal";
	$sentencia = $pdo->prepare($sql);
	$sentencia->execute();
	$vacaciones = $sentencia->fetchAll();
}




?>
 <!-- Custom CSS -->
 <style>
    body {
        padding-top: 0px;
        
    }
	#calendar {
		max-width: 850px;
	}
	.col-centered{
		float: none;
		margin: 0 auto;
	}
    </style>
<?php include"../Master/Header.php";?>
    <!-- Bootstrap Core CSS -->
	<!-- <link href="../Recursos/css/bootstrap.min.css" rel="stylesheet"> -->
    
	<!-- FullCalendar -->
	<link href='../Recursos/css/fullcalendar/fullcalendar.css' rel='stylesheet' />

	<div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                 <!---->
                             
                            <div class="row">
                                <div class="col-md-3">
                                    <h4>Calendario de Vacaciones</h4>
                                    <a href="VAlta_Vacaciones.php"><button type="button" class="btn btn-primary" >Agregar</button></a>
                                </div>
                                <form method="post" action="#">
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
                                <div class="col-md-1"><br/>
                                <button class="btn btn-primary" type="submit">Aceptar</button>
                                </div> 
                                </form>
                                <form method="post">
                                <div class="col-md-1">
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
        </div>

    <!-- Page Content -->
    <div class="container">
	
		<div class="breadcome-list single-page-breadcome">

				<div class="row">
					<div class="col-lg-12 text-center">
						<!-- <h3>Calendario de vacaciones</h3> -->
						
						<div id="calendar" class="col-centered"></div>
						<br/>
					</div>
					
				</div>
				<!-- /.row -->
		</div>
		
		
		<!-- Modal -->
		<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="addEvent.php">
			
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Agregar</h4>
			  </div>
			  <div class="modal-body">
			    <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					  <input type="text" name="title" class="form-control" id="title" placeholder="Titulo">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="color" class="form-control" id="color">
									  <option value="">Seleccionar</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
						  <option style="color:#008000;" value="#008000">&#9724; Verde</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
						  <option style="color:#000;" value="#000">&#9724; Negro</option>
						  
						</select>
					</div>
				  </div>
				  <div class="form-group">
					<label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
					<div class="col-sm-10">
					  <input type="text" name="start" class="form-control" id="start" readonly>
					</div>
				  </div>
				  <div class="form-group">
					<label for="end" class="col-sm-2 control-label">Fecha Final</label>
					<div class="col-sm-10">
					  <input type="text" name="end" class="form-control" id="end" readonly>
					</div>
				  </div>
				
			  </div>
			  <div class="modal-footer">
				
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="button" class="btn btn-info" data-dismiss="modal">Cerrar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>
		
		<!-- Modal -->
		<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		  <div class="modal-dialog" role="document">
			<div class="modal-content">
			<form class="form-horizontal" method="POST" action="FuncionCalendario/Editar_Titulo.php">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Modificar</h4>
			  </div>
			  <div class="modal-body">
				
				  <div class="form-group">
					<label for="title" class="col-sm-2 control-label">Titulo</label>
					<div class="col-sm-10">
					  <input type="text" name="Titulo" class="form-control" id="Titulo" placeholder="Titulo">
					</div>
				  </div>
				  <div class="form-group">
					<label for="color" class="col-sm-2 control-label">Color</label>
					<div class="col-sm-10">
					  <select name="Color" class="form-control" id="Color">
						  <option value="">Seleccionar</option>
						  <option style="color:#0071c5;" value="#0071c5">&#9724; Azul oscuro</option>
						  <option style="color:#40E0D0;" value="#40E0D0">&#9724; Turquesa</option>
						  <option style="color:#008000;" value="#008000">&#9724; Verde</option>						  
						  <option style="color:#FFD700;" value="#FFD700">&#9724; Amarillo</option>
						  <option style="color:#FF8C00;" value="#FF8C00">&#9724; Naranja</option>
						  <option style="color:#FF0000;" value="#FF0000">&#9724; Rojo</option>
						  <option style="color:#000;" value="#000">&#9724; Negro</option>
						  
						</select>
					</div>
				  </div>
				    <div class="form-group"> 
						<div class="col-sm-offset-2 col-sm-10">
						  <div class="checkbox">
							<label class="text-danger"><input type="checkbox"  name="delete"> Eliminar</label>
						  </div>
						</div>
					</div>
				  
				  <input type="hidden" name="id" class="form-control" id="id">
				
				
			  </div>
			  <div class="modal-footer">
				
				<button type="submit" class="btn btn-primary">Guardar</button>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
			  </div>
			</form>
			</div>
		  </div>
		</div>

    </div>
    <!-- /.container -->
	<?php include"../Master/Footer.php";?>
    <!-- jQuery Version 1.11.1 -->
	<script src="../Recursos/js/jquery-3.2.1.min.js"></script>
   

    <!-- Bootstrap Core JavaScript -->
	<script src="../Recursos/js/bootstrap.min.js"></script>
   
	
	<!-- FullCalendar -->
	<script src='../Recursos/js/moment.min.js'></script>
	<script src='../Recursos/fullcalendar/fullcalendar.min.js'></script>
	<script src='../Recursos/fullcalendar/fullcalendar.js'></script>
	<script src='../Recursos/fullcalendar/locale/es.js'></script>
		
	<script>
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
	

	$(document).ready(function() {

		var date = new Date();
       var yyyy = date.getFullYear().toString();
       var mm = (date.getMonth()+1).toString().length == 1 ? "0"+(date.getMonth()+1).toString() : (date.getMonth()+1).toString();
       var dd  = (date.getDate()).toString().length == 1 ? "0"+(date.getDate()).toString() : (date.getDate()).toString();
		
		$('#calendar').fullCalendar({
			header: {
				 language: 'es',
				left: 'prev,next today',
				center: 'title',
				right: 'month,basicWeek,basicDay',

			},
			defaultDate: yyyy+"-"+mm+"-"+dd,
			editable: true,
			eventLimit: true, // allow "more" link when too many events
			selectable: true,
			selectHelper: true,
			// select: function(start, end) {
				
			// 	$('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
			// 	$('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
			// 	$('#ModalAdd').modal('show');
			// },
			eventRender: function(event, element) {
				element.bind('dblclick', function() {
					$('#ModalEdit #id').val(event.id);
					$('#ModalEdit #Titulo').val(event.titulo);
					$('#ModalEdit #Color').val(event.color);
					$('#ModalEdit').modal('show');
				});
			},
			eventDrop: function(event, delta, revertFunc) { // si changement de position

				edit(event);

			},
			eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

				edit(event);

			},
			events: [
			<?php foreach($vacaciones as $dato): 
			
				$Inicio = explode(" ", $dato['FechaInicio']);
				$Final = explode(" ", $dato['FechaFinal']);
				if($Inicio[1] == '00:00:00'){
					$Inicio = $Inicio[0];
				}else{
					$Inicio = $dato['FechaInicio'];
				}
				if($Final[1] == '00:00:00'){
					$Final = $Final[0];
				}else{
					$Final = $dato['FechaFinal'];
				}
			?>
				{
					id: '<?php echo $dato['IdVacaciones']; ?>',
					titulo: '<?php echo $dato['Titulo']; ?>',
					title: '<?php echo $dato['Titulo'] ." ". $dato['Nombre'] ." ". $dato['ApellidoPaterno'] ." ". $dato['ApellidoMaterno']; ?>',
					start: '<?php echo $Inicio; ?>',
					end: '<?php echo $Final; ?>',
					color: '<?php echo $dato['Color']; ?>',
				},
			<?php endforeach; ?>
			]
		});
		
		function edit(event){
			start = event.start.format('YYYY-MM-DD HH:mm:ss');
			if(event.end){
				end = event.end.format('YYYY-MM-DD HH:mm:ss');
			}else{
				end = start;
			}
			
			id =  event.id;
			
			Event = [];
			Event[0] = id;
			Event[1] = start;
			Event[2] = end;
			
			$.ajax({
			 url: 'FuncionCalendario/Editar_Fecha.php',
			 type: "POST",
			 data: {Event:Event},
			 success: function(rep) {
					if(rep == 'OK'){
						alert('Dato guardado correctamente');
					}else{
						alert('No se pudo guardar. Inténtalo de nuevo.'); 
					}
				}
			});
		}
		
	});

</script>

<!-- </body>

</html> -->
