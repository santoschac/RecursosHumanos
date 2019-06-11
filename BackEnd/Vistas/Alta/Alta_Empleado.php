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
    $Jornada = $_POST['Jornada'];
    $SueldoDiario = $_POST['SueldoDiario'];
    $SueldoAnterior = $_POST['SueldoAnterior'];
    $SueldoActual = $_POST['SueldoActual'];
    $FechaBaja = date("Y-m-d", strtotime($_POST['FechaBaja']));

    $ConceptoBaja = $_POST['ConceptoBaja'];
    $FechaAlta = date("Y-m-d", strtotime($_POST['FechaAlta']));
    $FechaAntiguedad = date("Y-m-d", strtotime($_POST['FechaAntiguedad']));
    $UltimaModificacion = date("Y-m-d", strtotime( $_POST['UltimaModificacion']));
    $TipoContrato = $_POST['TipoContrato'];
    $IdPuesto= $_POST['IdPuesto'];
    $IdSucursal = $_POST['IdSucursal'];
    $IdPoblacion = $_POST['IdPoblacion'];
  
    $Usuario = strtoupper ($Nombre[0] . $ApellidoPaterno);
    //$Usuario = "pruebausuario";

    $IdTipoUsuario=2;
    $sql1 = 'INSERT INTO usuario (Usuario, Contrasena, IdTipoUsuario) VALUES(:Usuario, :Contrasena, :IdTipoUsuario)';
    $sentencia = $pdo->prepare($sql1);
    $sentencia->execute([':Usuario'=>$Usuario, ':Contrasena'=>$Rfc, ':IdTipoUsuario'=>$IdTipoUsuario]);

    $IdUsuario = $pdo->lastInsertId();

    $sql = 'INSERT INTO personal (Nombre, ApellidoPaterno, ApellidoMaterno, Curp, Tipo, Direccion, Colonia, Delegacion, CodigoPostal, Rfc, Imss, FechaNacimiento, NivelAcademico, Sexo, EstadoCivil, Hijos, Padre, Madre, Departamento, Jornada, SueldoDiario, SueldoAnterior, SueldoActual, FechaBaja, ConceptoBaja, FechaAlta, FechaAntiguedad, UltimaModificacion, TipoContrato, IdPuesto, IdUsuario, IdSucursal, IdPoblacion )
           VALUES (:Nombre, :ApellidoPaterno, :ApellidoMaterno, :Curp, :Tipo, :Direccion, :Colonia, :Delegacion, :CodigoPostal, :Rfc, :Imss, :FechaNacimiento, :NivelAcademico, :Sexo, :EstadoCivil, :Hijos,:Padre, :Madre, :Departamento, :Jornada, :SueldoDiario, :SueldoAnterior, :SueldoActual, :FechaBaja, :ConceptoBaja, :FechaAlta, :FechaAntiguedad, :UltimaModificacion, :TipoContrato, :IdPuesto, :IdUsuario, :IdSucursal, :IdPoblacion)';
   
    $statement = $pdo->prepare($sql);
    if($statement->execute([':Nombre'=> $Nombre, ':ApellidoPaterno'=>$ApellidoPaterno, ':ApellidoMaterno' => $ApellidoMaterno, ':Curp'=>$Curp, ':Tipo'=>$Tipo, ':Direccion'=>$Direccion, ':Colonia'=>$Colonia, ':Delegacion'=>$Delegacion,':CodigoPostal'=>$CodigoPostal, ':Rfc'=>$Rfc, ':Imss'=>$Imss, ':FechaNacimiento'=>$FechaNacimiento, ':NivelAcademico'=>$NivelAcademico, ':Sexo'=>$Sexo, ':EstadoCivil'=>$EstadoCivil, ':Hijos'=>$Hijos, ':Padre'=>$Padre, 
        ':Madre'=>$Madre, ':Departamento'=>$Departamento, ':Jornada'=>$Jornada, ':SueldoDiario'=>$SueldoDiario, ':SueldoAnterior'=>$SueldoAnterior, ':SueldoActual'=>$SueldoActual, ':FechaBaja'=>$FechaBaja, ':ConceptoBaja'=>$ConceptoBaja, ':FechaAlta'=>$FechaAlta, ':FechaAntiguedad'=>$FechaAntiguedad, ':UltimaModificacion'=>$UltimaModificacion, ':TipoContrato'=>$TipoContrato, ':IdPuesto'=>$IdPuesto, ':IdUsuario'=>$IdUsuario, ':IdSucursal'=>$IdSucursal, ':IdPoblacion'=>$IdPoblacion]))
        {
          echo 1;

        }  

?>