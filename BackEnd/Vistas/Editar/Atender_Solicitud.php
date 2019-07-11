<?php
include('../../Modelo/Conexion.php');

 $IdSolicitudes = $_POST['IdSolicitudes'];
 $FechaAtencion = $_POST['FechaAtencion'];
 $Atendido= $_POST['Atendido'];
 $Estatus = "Atendido";
	
 $IdPersonal = $_POST['IdPersonal'];

	$sql1 = 'SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, u.Usuario
	from personal p
	inner join usuario u on p.IdUsuario=u.IdUsuario where IdPersonal = ?';
	$sentencia1 = $pdo->prepare($sql1);
	$sentencia1->execute(array($IdPersonal));
	$resultado = $sentencia1->fetch();

	$CarpetaUsuario = $resultado['Usuario'];

	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '../../VistasU/Documentos/Solicitudes'; //Declaramos un  variable con la ruta donde guardaremos los archivos	
			$directorio = $directorio.'/'.$CarpetaUsuario;
			
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");
					
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, as� como el nombre del archivo
			
			
			
			$sql3 = 'SELECT s.IdSolicitudes, s.Solicitud,  s.Estatus, s.Documento, s.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, u.Usuario
			from solicitudes s 
			inner join personal p on s.IdPersonal = p.IdPersonal
			inner join usuario u on p.IdUsuario = u.IdUsuario where Documento = ? and Usuario = ? ';
    	$sentencia3 = $pdo->prepare($sql3);
    	$sentencia3 ->execute(array($filename, $CarpetaUsuario  ));
    	$result = $sentencia3->fetch();


		if($result){
			echo 3;
		}else{
			

			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				//echo "El archivo $filename se ha almacenado en forma exitosa.<br>";

				if(isset($_POST['Respuesta'])){

					if($_POST['Respuesta'] == "si"){

						// eliminar el archio localmente
		$sql4 = 'SELECT p.Nombre , p.ApellidoPaterno, p.ApellidoMaterno, u.IdUsuario, u.Usuario, s.IdSolicitudes, s.Solicitud, s.Descripcion, s.FechaSolicitud, s.FechaAtencion, s.Atendido, s.VigenteImms, s.Estatus, s.Documento, s.IdPersonal
		from personal p
		inner join usuario u on p.IdUsuario = u.IdUsuario
		inner join solicitudes s on p.IdPersonal = s.IdPersonal where IdSolicitudes = ?';
		$sentencia4 = $pdo->prepare($sql4);
		$sentencia4->execute(array($IdSolicitudes));
		$result = $sentencia4->fetch();

		$NombreCarpeta = $result['Usuario'];
		$NombreDocumento = $result['Documento'];
		
		unlink('../../VistasU/Documentos/'.$NombreCarpeta.'/'.$NombreDocumento);
					}
					
				}
				



				$sql5 = 'UPDATE solicitudes SET FechaAtencion=:FechaAtencion, Atendido=:Atendido, Estatus=:Estatus, Documento=:Documento Where IdSolicitudes=:IdSolicitudes';
				$sentencia5=$pdo->prepare($sql5);
				if($sentencia5->execute([':FechaAtencion'=>$FechaAtencion, ':Atendido'=>$Atendido, ':Estatus'=>$Estatus, ':Documento'=>$filename, ':IdSolicitudes'=>$IdSolicitudes]))
				{
				echo 1;
				}else{
					echo 2;
				}

				}
				else 
				{	
					echo "Ha ocurrido un error, por favor int�ntelo de nuevo.<br>";
				}
			closedir($dir); //Cerramos el directorio de destino
		 }

		}
			
	}
	
	

	
?>