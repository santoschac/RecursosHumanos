<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");


$message="";

$IdPersonal = $_GET['IdPersonal'];

$sql = 'SELECT * FROM personal WHERE IdPersonal = :IdPersonal';
$sentencia = $pdo->prepare($sql);
$sentencia ->execute([':IdPersonal'=>$IdPersonal]);
$personal = $sentencia->fetch(PDO::FETCH_OBJ);

if(isset($_POST['Nombre']) && isset($_POST["ApellidoPaterno"]) && isset($_POST['ApellidoMaterno']) && isset($_POST['FechaNacimiento'])){
   
    echo $Nombre= $_POST['Nombre'];echo '<br/>';
    echo $ApellidoPaterno = $_POST['ApellidoPaterno'];echo '<br/>';
    echo $ApellidoMaterno = $_POST['ApellidoMaterno'];echo '<br/>';
    echo $Curp = $_POST['Curp'];echo '<br/>';
    echo $Tipo = $_POST['Tipo'];echo '<br/>';
    echo $Direccion = $_POST['Direccion'];echo '<br/>';
    echo $Colonia = $_POST['Colonia'];echo '<br/>';
    echo $Delegacion = $_POST['Delegacion'];echo '<br/>';
    echo $Poblacion = $_POST['Poblacion'];echo '<br/>';
    echo $Estado = $_POST['Estado'];echo '<br/>';
    echo $Pais = $_POST['Pais'];echo '<br/>';
    echo $CodigoPostal = $_POST['CodigoPostal'];echo '<br/>';
    echo $Rfc = $_POST['Rfc'];echo '<br/>';
    echo $Imss = $_POST['Imss'];echo '<br/>';
    echo $FechaNacimiento =  date("Y-m-d", strtotime($_POST['FechaNacimiento'])); echo '<br/>';
    echo $NivelAcademico = $_POST['NivelAcademico'];echo '<br/>';
    echo $Sexo = $_POST['Sexo'];echo '<br/>';
    echo $EstadoCivil = $_POST['EstadoCivil'];echo '<br/>';
    echo $Hijos = $_POST['Hijos'];echo '<br/>';
    echo $Padre = $_POST['Padre'];echo '<br/>';
    echo  $Madre = $_POST['Madre'];echo '<br/>';
    echo  $CentroCosto = $_POST['CentroCosto'];echo '<br/>';
    echo $Departamento = $_POST['Departamento'];echo '<br/>';
    //$Puesto = $_POST['Puesto'];
    echo $Jornada = $_POST['Jornada'];echo '<br/>';
    echo $SueldoDiario = $_POST['SueldoDiario'];echo '<br/>';
    echo $SueldoAnterior = $_POST['SueldoAnterior'];echo '<br/>';
    echo $SueldoActual = $_POST['SueldoActual'];echo '<br/>';
    echo $FechaBaja = date("Y-m-d", strtotime($_POST['FechaBaja']));echo '<br/>';
    echo  $ConceptoBaja = $_POST['ConceptoBaja'];echo '<br/>';
    echo  $FechaAlta = date("Y-m-d", strtotime($_POST['FechaAlta']));echo '<br/>';
    echo $FechaAntiguedad = date("Y-m-d", strtotime($_POST['FechaAntiguedad']));echo '<br/>';
    echo $UltimaModificacion = date("Y-m-d", strtotime( $_POST['UltimaModificacion']));echo '<br/>';
    echo $TipoContrato = $_POST['TipoContrato'];echo '<br/>';
    echo $Usuario = "pruebausuario";echo '<br/>';
    echo $IdPuesto= $_POST['IdPuesto'];echo '<br/>';


    // $sql ="SELECT * FROM personal WHERE Nombre = ?";
    // $sentencia = $pdo->prepare($sql);
    // $sentencia->execute(array($Nombre));
    // $result = $sentencia->fetch();

    // if($result){
    //     $message= "EL personal ya existe";
    // }else{

        $sql1= "UPDATE personal SET Nombre=:Nombre, ApellidoPaterno=:ApellidoPaterno, ApellidoMaterno=:ApellidoMaterno, Curp=:Curp, Tipo=:Tipo, Direccion=:Direccion, Colonia=:Colonia, Delegacion=:Delegacion, Poblacion=:Poblacion, Estado=:Estado,
        Pais=:Pais, CodigoPostal=:CodigoPostal, Rfc=:Rfc, Imss=:Imss, FechaNacimiento=:FechaNacimiento, NivelAcademico=:NivelAcademico, Sexo=:Sexo, EstadoCivil=:EstadoCivil, Hijos=:Hijos, Padre=:Padre, Madre=:Madre, CentroCosto=:CentroCosto, 
        Departemento=:Departamento,Jornada=:Jornada, SueldoDiario=:SueldoDiario, SueldoAnterior=:SueldoAnterior, SueldoActual=:SueldoActual, FechaBaja=:FechaBaja, ConceptoBaja=:ConceptoBaja, FechaAlta=:FechaAlta, FechaAntiguedad=:FechaAntiguedad, UltimaModificacion=:UltimaModificacion,
        TipoContrato=:TipoContrato, Usuario=:Usuario, IdPuesto=:IdPuesto WHERE IdPersonal = :IdPersonal";
        
        $sentencia = $pdo->prepare($sql1);
        if($sentencia ->execute([':Nombre'=> $Nombre, ':ApellidoPaterno'=>$ApellidoPaterno, ':ApellidoMaterno' => $ApellidoMaterno, ':Curp'=>$Curp, ':Tipo'=>$Tipo, ':Direccion'=>$Direccion, ':Colonia'=>$Colonia, ':Delegacion'=>$Delegacion, ':Poblacion'=>$Poblacion,
        ':Estado'=>$Estado, ':Pais' =>$Pais, ':CodigoPostal'=>$CodigoPostal, ':Rfc'=>$Rfc, ':Imss'=>$Imss, ':FechaNacimiento'=>$FechaNacimiento, ':NivelAcademico'=>$NivelAcademico, ':Sexo'=>$Sexo, ':EstadoCivil'=>$EstadoCivil, ':Hijos'=>$Hijos, ':Padre'=>$Padre, 
       ':Madre'=>$Madre, ':CentroCosto'=>$CentroCosto, ':Departamento'=>$Departamento,':Jornada'=>$Jornada, ':SueldoDiario'=>$SueldoDiario, ':SueldoAnterior'=>$SueldoAnterior, ':SueldoActual'=>$SueldoActual, ':FechaBaja'=>$FechaBaja, ':ConceptoBaja'=>$ConceptoBaja, 
       ':FechaAlta'=>$FechaAlta, ':FechaAntiguedad'=>$FechaAntiguedad, ':UltimaModificacion'=>$UltimaModificacion, ':TipoContrato'=>$TipoContrato, ':Usuario'=>$Usuario, ':IdPuesto'=>$IdPuesto, ':IdPersonal'=>$IdPersonal])){
        $message='Datos actualizados con éxito';
       }else{
           echo "error";
       }
   // }
}

?>
    
    <!-- datapicker CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/datapicker/datepicker3.css">    
    
    <!-- chosen CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/chosen/bootstrap-chosen.css">
        
       
      <!-- Mobile Menu end -->
      <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list single-page-breadcome">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <!-- <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div> -->
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">Inicio</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Actualizar Empleado</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <br/>
            <div class="container-fluid">
            <form method="post" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                <!--Informacion basica-->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                        <h4>Información del empleado</h4>
                        <p>Complete con precisón la siguiente información para asegurarnos de mantener un registro actualizado de la información personal de nuestros empleados.</p>
                            

                        <?php
                             if(($message=="Datos actualizados con éxito")):?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <?= $message;?>
                                </div>
                                <?php endif;?>
                                
                                <?php
                                if(($message=="El personal ya existe")):?>
                                <div class="alert alert-danger alert-mg-b">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                    <?= $message;?>
                            </div>
                                <?php endif;?>


                        <ul id="myTabedu1" class="tab-review-design">
                            <br/>
                                <li class="active"><a href="#description">Información Básica</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                    
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                   
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                <div class="form-group">
                                                                <label>Nombres</label>
                                                                   <input name="Nombre" id="Nombre" type="text" class="form-control" value="<?=$personal->Nombre?>" placeholder="Nombre" required="" maxlength="60">
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Apellido Paterno</label>
                                                                    <input name="ApellidoPaterno" id="ApellidoPaterno" type="text" class="form-control" value="<?=$personal->ApellidoPaterno?>" placeholder="Apellido Paterno" required="" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Apellido Materno</label>
                                                                    <input name="ApellidoMaterno" id="ApellidoMaterno" type="text" class="form-control" value="<?=$personal->ApellidoMaterno?>" placeholder="Apellido Materno" required="" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Rfc</label>                                                                
                                                                    <input name="Rfc" id="Rfc" type="text" class="form-control" placeholder="Rfc" maxlength="13" value="<?=$personal->Rfc?>" required>
                                                                </div>
                                                  
                                                  
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                                <div class="form-group">
                                                             <label><strong>Fecha de nacimiento</strong></label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="date" name="FechaNacimiento" id="FechaNacimiento" class="form-control" value="<?=$personal->FechaNacimiento?>"  >
                                        </div>
                                    </div>
                                                               
                                                            <div class="form-group">
                                                     
                                                            <label>Nivel Academico</label>
                                                                    <input name="NivelAcademico" id="NivelAcademico" type="text" value="<?=$personal->NivelAcademico?>" class="form-control" placeholder="Nivel Academico" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Curp</label>
                                                                    <input name="Curp" id="Curp" type="text" class="form-control" placeholder="Curp" value="<?=$personal->Curp?>" maxlength="18" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>IMSS</label>
                                                                    <input name="Imss"  id="Imss" type="text" class="form-control" placeholder="IMSS" value="<?=$personal->Imss?>" maxlength="11" required>
                                                                </div>
                                                                
                                                               
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <!--Fin Informacion basica-->
              
                <!--Informacion Personal-->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                         
                        <ul id="myTabedu1" class="tab-review-design">
                            
                                <li class="active"><a href="#description">Información Personal</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                    
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                   
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                            <div class="form-group">
                                                                <label>Padre</label>
                                                                    <input name="Padre" name="Padre" id="Padre" value="<?=$personal->Padre?>" type="text" class="form-control" placeholder="Nombre completo del Padre" maxlength="60" required>
                                                                </div>
                                                                <label>Estado Civil</label>
                                                                <select name="EstadoCivil" id="EstadoCivil" class="form-control">
                                                                    <option value="<?=$personal->EstadoCivil?>" disabled="">
                                                                        Seleccionar</option>
                                                                    <option value="Soltero(a)">Soltero(a)</option>
                                                                    <option value="Casado(a)">Casado(a)</option>
                                                                    <option value="Divorciado(a)">Divorciado(a)</option>
                                                                    <option value="Viudo(a)">Viudo(a)</option>

                                                                </select>
                                                                </div>


                                                                <div class="form-group">
                                                                <label>Hijos</label>
                                                                    <input name="Hijos" id="Hijos" type="text" class="form-control" placeholder="Número de Hijos" value="<?=$personal->Hijos?>" maxlength="2" onkeypress="return numeros(event)" required>
                                                                </div>


                                                                </div>
                                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                    <div class="form-group">
                                                                        <label>Madre</label>
                                                                        <input name="Madre" id="Madre" value="<?=$personal->Madre?>" type="text" class="form-control" placeholder="Nombre completo de la Madre" maxlength="60" required>
                                                                    </div>
                                                                    
                                                                    <div class="form-group">
                                                                <label>Sexo</label>
                                                                    <select name="Sexo" id="Sexo" class="form-control">
																		<option value="<?=$personal->Sexo?>" disabled="">Seleccionar</option>
																		<option value="Masculino">Masculino</option>
																		<option value="Femenino">Femenino</option>
																	</select>
                                                                </div>
                                                                  
                                                            </div>
                                                               
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
               
                <!--Fin Informacion Personal-->

                <!--Informacion Direccion-->
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                         
                        <ul id="myTabedu1" class="tab-review-design">
                            
                                <li class="active"><a href="#description">Información sobre la Ubicación</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                    
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                    <form action="#" class="dropzone dropzone-custom needsclick add-professors" id="demo1-upload">
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            <div class="form-group">
                                                                <label>País</label>
                                                                    <select name="Pais" id="Pais" class="form-control">
																		<option value="<?=$personal->Pais?>" disabled="">Seleccionar</option>
																		<option value="México">México</option>
																		<option value="Chile">Chile</option>
                                                                        <option value="Venezuela">Venezuela</option>
																	</select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Población</label>
                                                                    <select name="Poblacion"  id="Poblacion" class="form-control">
																			<option value="<?=$personal->Poblacion?>" disabled="">Seleccionar</option>
																			<option value="0">Gujarat</option>
																			<option value="1">Maharastra</option>
																			<option value="2">Rajastan</option>
																			<option value="3">Maharastra</option>
																			<option value="4">Rajastan</option>
																			<option value="5">Gujarat</option>
																		</select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Código Postal</label>
                                                                    <input name="CodigoPostal" id="CodigoPostal" value="<?=$personal->CodigoPostal?>" type="text" class="form-control" placeholder="Código Postal" maxlength="5" onkeypress="return numeros(event)" required>
                                                                </div>
                                                                
                                                  
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>Estado</label>
                                                                    <select name="Estado"  id="Estado" class="form-control">
																			<option value="<?=$personal->Estado?>" disabled="">Seleccionar</option>
																			<option value="0">Yucatán</option>
																			<option value="1">Campeche</option>
																		
																		</select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Delegación</label>
                                                                    <select name="Delegacion" id="Delegacion" class="form-control">
																			<option value="<?=$personal->Delegacion?>" disabled="">Seleccionar</option>
																			<option value="0">Surat</option>
																			<option value="1">Baroda</option>
																			<option value="2">Navsari</option>
																			<option value="3">Baroda</option>
																			<option value="4">Surat</option>
																		</select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Colonia</label>
                                                                    <input name="Colonia" id="Colonia" value="<?=$personal->Colonia?>" type="text" class="form-control" placeholder="Colonia" maxlength="70" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Dirección</label>
                                                                    <input name="Direccion" id="Direccion" value="<?=$personal->Direccion?>" type="text" class="form-control" placeholder="Dirección" maxlength="70" required>
                                                                </div>
                                                            
                                                               
                                                                
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
               
                <!--Fin Informacion Direccion-->

                 <!--Informacion laboral-->
                 <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                         
                        <ul id="myTabedu1" class="tab-review-design">
                            
                                <li class="active"><a href="#description">Información Laboral</a></li>
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                    
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad">
                                                   
                                                        <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            <div class="form-group">
                                                                <label>Tipo</label>
                                                                    <select name="Tipo" id="Tipo" class="form-control">
																		<option value="<?=$personal->Tipo?>" disabled="">Seleccionar</option>
																		<option value="Empleado">Empleado</option>
																		
																	</select>
                                                                </div>
                                                            <div class="form-group">
                                                                <label>Centro costo</label>
                                                                    <input name="CentroCosto" id="CentroCosto" value="<?=$personal->CentroCosto?>" type="text" class="form-control" placeholder="Centro costo" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Departamento</label>
                                                                    <input name="Departamento" id="Departamento" value="<?=$personal->Departamento?>" type="text" class="form-control" placeholder="Departamento" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Sueldo Diario</label>
                                                                    <input name="SueldoDiario" id="SueldoDiario" value="<?=$personal->SueldoDiario?>" type="text" class="form-control" placeholder="Sueldo Diario" maxlenght="10" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Sueldo Anterior</label>
                                                                    <input name="SueldoAnterior" id="SueldoAnterior" value="<?=$personal->SueldoAnterior?>" type="text" class="form-control" placeholder="Sueldo Anterior" maxlenght="10" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Sueldo Actual</label>
                                                                    <input name="SueldoActual" id="SueldoActual" type="text" value="<?=$personal->SueldoActual?>" class="form-control" placeholder="Sueldo Actual" maxlenght="10" required>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                        <label><strong>Fecha Alta</strong></label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="date" name="FechaAlta" id="FechaAlta" class="form-control" value="<?=date("Y-m-d", strtotime($personal->FechaAlta)) ?>">
                                        </div>
                                    </div>
                                                                
                                                                <div class="form-group">
                                        <label><strong>Ultima Modificación</strong></label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="date" name="UltimaModificacion" id="UltimaModificacion" class="form-control" value="<?= date("Y-m-d", strtotime($personal->UltimaModificacion ))?>">
                                        </div>
                                    </div>
                                                  
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            <div class="chosen-select-single mg-b-20">
                                                                <label><strong>Puesto</strong></label>                                                                
                                                                <?php 
                                                                
                                                                    echo '<select name="IdPuesto" id="IdPuesto" data-placeholder="Seleccionar..." class="chosen-select" tabindex="-1">';
                                                                    echo '<option value="">Seleccionar</option>';
                                                                    foreach ($pdo->query('SELECT IdPuesto, NombrePuesto FROM puestos') as $row) {													
                                                                    echo '<option value="'.$row['IdPuesto'].'">'.$row['NombrePuesto'].'</option>';
                                                                    }
                                                                    echo'</select>';
                                                                ?>
                                                            </div>



                                                                <div class="form-group">
                                                                <label>Jornada</label>
                                                                    <input name="Jornada" id="Jornada" value="<?=$personal->Jornada?>" type="text" class="form-control" placeholder="Jornada" required>
                                                                </div>
                                                                <!-- <div class="form-group">
                                                                <label>Fecha Baja</label>
                                                                    <input name="FechaBaja" id="finish1" type="text" class="form-control" placeholder="Fecha Baja">
                                                             </div> -->
                                                             <div class="form-group ">
                                                             <label><strong>Fecha Baja</strong></label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input name="FechaBaja" id="FechaBaja" type="date" class="form-control" value="<?=date("Y-m-d", strtotime($personal->FechaBaja))?>" >
                                        </div>
                                    </div>
                                                                <div class="form-group res-mg-t-15">
                                                                <label>Concepto Baja</label>
                                                                    <textarea name="ConceptoBaja" id="ConceptoBaja" placeholder="Concepto Baja" required><?=$personal->ConceptoBaja?></textarea>
                                                                </div>
                                                            
                                                                <div class="form-group">
                                                                <!-- <label>Fecha de Antigüedad</label>
                                                                    <input name="FechaAntiguedad" id="finish2" type="text" class="form-control" placeholder="Fecha Antigüedad">
                                                                </div> -->
                                                                <div class="form-group">
                                                             <label><strong>Fecha de Antigüedad</strong></label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="date" name="FechaAntiguedad"  id="FechaAntiguedad"  class="form-control" value="<?= date("Y-m-d", strtotime($personal->FechaAntiguedad))?>"  >
                                        </div>

                                                                
                                                                <div class="form-group">
                                                                <label><strong>Tipo Contrato</strong></label>
                                                                    <select name="TipoContrato" id="TipoContrato" class="form-control">
																			<option value="<?=$personal->TipoContrato?>" disabled="">Seleccionar</option>
																			<option value="Fijo">Fijo</option>
																			<option value="Temporal">Temporal</option>
																		
																		</select>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                                            <div class="col-lg-12">
                                                                <div class="payment-adress">
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Actualizar</button>
                                                                    <a href="Empleados.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    </form>
                        </div>
                        
                    </div>
                    
               
                </div>
                <!--Fin Informacion laboral-->
               
               
            </div>
        </div>
        <br/>

  
       </body>
        <?php
        include ("../Master/Footer.php");
        ?>

        <!-- validar solo numeros
		============================================ -->
        <script>
        function numeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " 0123456789";
    especiales = [8,37,39,46];
 
    tecla_especial = false
    for(var i in especiales){
 if(key == especiales[i]){
     tecla_especial = true;
     break;
        } 
    }
 
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
}</script>

    <!-- datapicker JS
		============================================ -->
    <script src="../Recursos/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="../Recursos/js/datapicker/datepicker-active.js"></script>
 
    <!-- chosen JS
		============================================ -->
    <script src="../Recursos/js/chosen/chosen.jquery.js"></script>
    <script src="../Recursos/js/chosen/chosen-active.js"></script>
    
  
    
    