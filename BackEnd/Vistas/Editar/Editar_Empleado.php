<?php

include("../../Modelo/Conexion.php");

    $IdPersonal= $_POST['IdPersonal'];

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
    //$FechaAntiguedad = date("Y-m-d", strtotime($_POST['FechaAntiguedad']));
    $UltimaModificacion = date("Y-m-d", strtotime( $_POST['UltimaModificacion']));
    $TipoContrato = $_POST['TipoContrato'];
    $Telefono=$_POST['Telefono'];
    $IdPuesto= $_POST['IdPuesto'];
    $IdSucursal = $_POST['IdSucursal'];
    $IdPoblacion = $_POST['IdPoblacion'];
    
    
   
    $sql = 'UPDATE personal SET Nombre= :Nombre, ApellidoPaterno= :ApellidoPaterno, ApellidoMaterno= :ApellidoMaterno, Curp= :Curp, Tipo= :Tipo, Direccion= :Direccion, Colonia= :Colonia, Delegacion = :Delegacion, 
    CodigoPostal = :CodigoPostal, Rfc= :Rfc, Imss= :Imss, FechaNacimiento= :FechaNacimiento, NivelAcademico= :NivelAcademico, Sexo= :Sexo, EstadoCivil= :EstadoCivil, Hijos= :Hijos, Padre= :Padre, Madre= :Madre,
    Departamento= :Departamento, SueldoDiario= :SueldoDiario, SueldoAnterior= :SueldoAnterior, SueldoActual= :SueldoActual, FechaBaja= :FechaBaja, ConceptoBaja= :ConceptoBaja, FechaAlta= :FechaAlta, 
    UltimaModificacion= :UltimaModificacion, TipoContrato= :TipoContrato, Telefono=:Telefono, IdPuesto= :IdPuesto, IdSucursal= :IdSucursal, IdPoblacion= :IdPoblacion WHERE IdPersonal= :IdPersonal';
    
    $statement =$pdo->prepare($sql);
    
    if($statement->execute([':Nombre'=>$Nombre, ':ApellidoPaterno'=>$ApellidoPaterno, ':ApellidoMaterno'=>$ApellidoMaterno,':Curp'=>$Curp, ':Tipo'=>$Tipo, ':Direccion'=>$Direccion, ':Colonia'=>$Colonia, ':Delegacion'=> $Delegacion, 
    ':CodigoPostal'=>$CodigoPostal, ':Rfc'=>$Rfc, ':Imss'=>$Imss, ':FechaNacimiento'=>$FechaNacimiento, ':NivelAcademico'=>$NivelAcademico, ':Sexo'=>$Sexo, ':EstadoCivil'=>$EstadoCivil, ':Hijos'=>$Hijos, ':Padre'=>$Padre, ':Madre'=>$Madre, 
    ':Departamento'=>$Departamento, ':SueldoDiario'=>$SueldoDiario, ':SueldoAnterior'=>$SueldoAnterior, ':SueldoActual'=>$SueldoActual, ':FechaBaja'=>$FechaBaja, ':ConceptoBaja'=>$ConceptoBaja, ':FechaAlta'=>$FechaAlta, 
    ':UltimaModificacion'=>$UltimaModificacion, ':TipoContrato'=>$TipoContrato, ':Telefono'=>$Telefono, ':IdPuesto'=>$IdPuesto, ':IdSucursal'=>$IdSucursal, ':IdPoblacion'=>$IdPoblacion, ':IdPersonal'=>$IdPersonal])){
      echo 1;
     
    }else{
      echo 2;
    }

   

    
    
?>