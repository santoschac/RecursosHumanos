<?php
include('../../Modelo/Conexion.php');

$IdIncapacidad = $_POST['IdIncapacidad'];
$DiaInicio = date("Y-m-d", strtotime($_POST['DiaInicio']));
$DiaFinal = date("Y-m-d", strtotime($_POST['DiaFinal']));
$Descripcion = $_POST['Descripcion'];
$IdPersonal = $_POST['IdPersonal'];
//$Documento = $_FILES['archivo'];


  $sql = 'SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, u.Usuario
	from personal p
	inner join usuario u on p.IdUsuario=u.IdUsuario where IdPersonal = ?';
	$sentencia = $pdo->prepare($sql);
	$sentencia->execute(array($IdPersonal));
	$resultado = $sentencia->fetch();

	$CarpetaUsuario = $resultado['Usuario'];
	
	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) {
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '../../VistasU/Documentos'; //Declaramos un  variable con la ruta donde guardaremos los archivos	
			$directorio = $directorio.'/'.$CarpetaUsuario;
			
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
      
                $sql = 'UPDATE incapacidad SET DiaInicio=:DiaInicio, DiaFinal=:DiaFinal, Descripcion=:Descripcion, Documento=:Documento, IdPersonal=:IdPersonal where IdIncapacidad=:IdIncapacidad';
				$statement = $pdo->prepare($sql);
						if($statement->execute([':DiaInicio'=> $DiaInicio, ':DiaFinal'=>$DiaFinal, ':Descripcion' => $Descripcion, ':Documento'=>$filename, ':IdPersonal'=>$IdPersonal, ':IdIncapacidad'=>$IdIncapacidad]))
						{
						echo 1;            
						}else{
						echo 2;
						}
        
						

			}else {	
				echo "Ha ocurrido un error, por favor int�ntelo de nuevo.<br>";
			}
			closedir($dir); //Cerramos el directorio de destino
		}
	}



	
	

	
?>