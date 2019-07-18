<?php
include("../../Modelo/Conexion.php");


    $Nombre= $_POST['Nombre'];
    $ApellidoPaterno = $_POST['ApellidoPaterno'];
    $ApellidoMaterno = $_POST['ApellidoMaterno'];
    $Curp = $_POST['Curp'];
    $Tipo = $_POST['Tipo'];
    $Direccion = $_POST['Direccion'];
    $Colonia = $_POST['Colonia'];
    $Delegacion = $_POST['Delegacion'];
    $CodigoPostal = $_POST['CodigoPostal'];
    $Rfc = $_POST['Rfc'];
    $Imss = $_POST['Imss'];
    $FechaNacimiento =  date("Y-m-d", strtotime($_POST['FechaNacimiento'])); 
    $NivelAcademico = $_POST['NivelAcademico'];
    $Sexo = $_POST['Sexo'];
    $EstadoCivil = $_POST['EstadoCivil'];
    $Hijos = $_POST['Hijos'];
    $Padre = $_POST['Padre'];
    $Madre = $_POST['Madre'];
    $Departamento = $_POST['Departamento'];
   
    $SueldoDiario = $_POST['SueldoDiario'];
    $SueldoAnterior = $_POST['SueldoAnterior'];
    $SueldoActual = $_POST['SueldoActual'];
    $FechaBaja = date("Y-m-d", strtotime($_POST['FechaBaja']));

    $ConceptoBaja = $_POST['ConceptoBaja'];
    $FechaAlta = date("Y-m-d", strtotime($_POST['FechaAlta']));
    $FechaAntiguedad = date("Y-m-d", strtotime($_POST['FechaAntiguedad']));
    $UltimaModificacion = date("Y-m-d", strtotime( $_POST['UltimaModificacion']));
    $TipoContrato = $_POST['TipoContrato'];
    
  
    $Telefono = $_POST['Telefono'];
   
    
    
    $IdPuesto= $_POST['IdPuesto'];
    $IdSucursal = $_POST['IdSucursal'];
    $IdPoblacion = $_POST['IdPoblacion'];
  
    $Usuario = $_POST['Usuario'];
    $Contrasena = $_POST['Contrasena'];
    $Contrasena = password_hash($Contrasena, PASSWORD_DEFAULT);

    $IdTipoUsuario=2;
    
    $sql = 'SELECT * FROM usuario WHERE Usuario = ?';
    $sentencia = $pdo->prepare($sql);
    $sentencia ->execute(array($_POST["Usuario"]));
    $resultado = $sentencia->fetch();

  if($resultado){
    echo 2;
  }else{

    $sql1 = 'INSERT INTO usuario (Usuario, Contrasena, IdTipoUsuario) VALUES(:Usuario, :Contrasena, :IdTipoUsuario)';
    $sentencia = $pdo->prepare($sql1);
    $sentencia->execute([':Usuario'=>$Usuario, ':Contrasena'=>$Contrasena, ':IdTipoUsuario'=>$IdTipoUsuario]);

    $IdUsuario = $pdo->lastInsertId();

    $sql = 'INSERT INTO personal (Nombre, ApellidoPaterno, ApellidoMaterno, Curp, Tipo, Direccion, Colonia, Delegacion, CodigoPostal, Rfc, Imss, FechaNacimiento, NivelAcademico, Sexo, EstadoCivil, Hijos, Padre, Madre, Departamento, SueldoDiario, SueldoAnterior, SueldoActual, FechaBaja, ConceptoBaja, FechaAlta, FechaAntiguedad, UltimaModificacion, TipoContrato, Telefono, IdPuesto, IdUsuario, IdSucursal, IdPoblacion )
           VALUES (:Nombre, :ApellidoPaterno, :ApellidoMaterno, :Curp, :Tipo, :Direccion, :Colonia, :Delegacion, :CodigoPostal, :Rfc, :Imss, :FechaNacimiento, :NivelAcademico, :Sexo, :EstadoCivil, :Hijos,:Padre, :Madre, :Departamento, :SueldoDiario, :SueldoAnterior, :SueldoActual, :FechaBaja, :ConceptoBaja, :FechaAlta, :FechaAntiguedad, :UltimaModificacion, :TipoContrato, :Telefono, :IdPuesto, :IdUsuario, :IdSucursal, :IdPoblacion)';
   
    $statement = $pdo->prepare($sql);
    if($statement->execute([':Nombre'=> $Nombre, ':ApellidoPaterno'=>$ApellidoPaterno, ':ApellidoMaterno' => $ApellidoMaterno, ':Curp'=>$Curp, ':Tipo'=>$Tipo, ':Direccion'=>$Direccion, ':Colonia'=>$Colonia, ':Delegacion'=>$Delegacion,':CodigoPostal'=>$CodigoPostal, ':Rfc'=>$Rfc, ':Imss'=>$Imss, ':FechaNacimiento'=>$FechaNacimiento, ':NivelAcademico'=>$NivelAcademico, ':Sexo'=>$Sexo, ':EstadoCivil'=>$EstadoCivil, ':Hijos'=>$Hijos, ':Padre'=>$Padre, 
        ':Madre'=>$Madre, ':Departamento'=>$Departamento, ':SueldoDiario'=>$SueldoDiario, ':SueldoAnterior'=>$SueldoAnterior, ':SueldoActual'=>$SueldoActual, ':FechaBaja'=>$FechaBaja, ':ConceptoBaja'=>$ConceptoBaja, ':FechaAlta'=>$FechaAlta, ':FechaAntiguedad'=>NULL, ':UltimaModificacion'=>$UltimaModificacion, ':TipoContrato'=>$TipoContrato, ':Telefono'=>$Telefono, ':IdPuesto'=>$IdPuesto, ':IdUsuario'=>$IdUsuario, ':IdSucursal'=>$IdSucursal, ':IdPoblacion'=>$IdPoblacion]))
        {
          echo 1;

        }else{
          echo 3;
          $sen ="DELETE from usuario where IdUsuario = $IdUsuario";
          $sentencia = $pdo->prepare($sen);
          $sentencia->execute();
        }
       
  }
?>