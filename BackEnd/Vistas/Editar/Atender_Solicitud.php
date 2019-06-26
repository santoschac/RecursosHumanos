<?php
include('../../Modelo/Conexion.php');

	$IdSolicitudes = $_POST['IdSolicitudes'];
	$FechaAtencion = $_POST['FechaAtencion'];
	$Atendido= $_POST['Atendido'];
	$Estatus = "Atendido";
	
	$IdPersonal = $_POST['IdPersonal'];

	$sql = 'SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, u.Usuario
	from personal p
	inner join usuario u on p.IdUsuario=u.IdUsuario where IdPersonal = ?';
	$sentencia = $pdo->prepare($sql);
	$sentencia->execute(array($IdPersonal));
	$resultado = $sentencia->fetch();

	$NombreCarpeta = $resultado['Usuario'];
	
	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '../../VistasU/Documentos/docs/'; //Declaramos un  variable con la ruta donde guardaremos los archivos
			$directorio = $directorio.'/'.$NombreCarpeta;
			//Validamos si la ruta de destino existe, en caso de no existir la creamos
			if(!file_exists($directorio)){
				mkdir($directorio, 0777) or die("No se puede crear el directorio de extracci&oacute;n");	
			}
			
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, as� como el nombre del archivo
			
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) {	
				//echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
				$sql = 'UPDATE solicitudes SET FechaAtencion=:FechaAtencion, Atendido=:Atendido, Estatus=:Estatus, Documento=:Documento Where IdSolicitudes=:IdSolicitudes';
				$sentencia=$pdo->prepare($sql);
				if($sentencia->execute([':FechaAtencion'=>$FechaAtencion, ':Atendido'=>$Atendido, ':Estatus'=>$Estatus, ':Documento'=>$filename, ':IdSolicitudes'=>$IdSolicitudes]))
				{
				echo 1;
				}else{
					echo 2;
				}

				} else {	
				echo "Ha ocurrido un error, por favor int�ntelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}

	

	
?>