<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");


$message="";

 if(isset($_POST['Nombre']) && isset($_POST['ApellidoPaterno']) && isset($_POST['ApellidoMaterno']) && isset($_POST['Curp']) && isset($_POST['Direccion']) ){
    
    
   
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
    
    echo $Usuario1=$Nombre[0] + $ApellidoPaterno;
    $Usuario="pruebausuario";
    $IdTipoUsuario=2;
    
    //verificar si el personal existe

    $sql = 'SELECT * FROM personal WHERE Nombre = ?';
    $sentencia = $pdo->prepare($sql);
    $sentencia->execute(array($Nombre));
    $result = $sentencia->fetch();
 
    if($result){
        $message = "El personal ya existe";
    }else{

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
                $message="Personal agregado con éxito";
    
            }  
              
                 

    }
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
                                            <li><span class="bread-blod">Agregar Empleado</span>
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
                             if(($message=="Personal agregado con éxito")):?>
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
                                                                   <input name="Nombre" id="Nombre" type="text" class="form-control" placeholder="Nombre" required="" maxlength="60">
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Apellido Paterno</label>
                                                                    <input name="ApellidoPaterno" id="ApellidoPaterno" type="text" class="form-control" placeholder="Apellido Paterno" required="" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Apellido Materno</label>
                                                                    <input name="ApellidoMaterno" id="ApellidoMaterno" type="text" class="form-control" placeholder="Apellido Materno" required="" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label><strong>Fecha de nacimiento</strong></label>
                                                                    <div class="input-group date">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-calendar"></i></span>
                                                                        <input type="date" name="FechaNacimiento"
                                                                            id="FechaNacimiento" class="form-control"
                                                                            value="<?php echo date("Y-m-d"); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Sexo</label>
                                                                    <select name="Sexo" id="Sexo" class="form-control">
																		<option value="none" selected="" disabled="">Seleccionar</option>
																		<option value="Masculino">Masculino</option>
																		<option value="Femenino">Femenino</option>
																	</select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nivel Academico</label>
                                                                    <input name="NivelAcademico" id="NivelAcademico"
                                                                        type="text" class="form-control"
                                                                        placeholder="Nivel Academico" maxlength="60"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Rfc</label>                                                                
                                                                    <input name="Rfc" id="Rfc" type="text" class="form-control" placeholder="Rfc" maxlength="13" required>
                                                                </div>
                                                  
                                                  
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            <div class="form-group">
                                                                    <label>Curp</label>
                                                                    <input name="Curp" id="Curp" type="text"
                                                                        class="form-control" placeholder="Curp"
                                                                        maxlength="18" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>IMSS</label>
                                                                    <input name="Imss" id="Imss" type="text"
                                                                        class="form-control" placeholder="IMSS"
                                                                        maxlength="11" required>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                <label>Padre</label>
                                                                    <input name="Padre" name="Padre" id="Padre" type="text" class="form-control" placeholder="Nombre completo del Padre" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Madre</label>
                                                                    <input name="Madre" name="Madre" id="Madre" type="text" class="form-control" placeholder="Nombre completo de la  Madre" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Estado Civil</label>
                                                                <select name="EstadoCivil" id="EstadoCivil" class="form-control">
                                                                    <option value="none" selected="" disabled="">
                                                                        Seleccionar</option>
                                                                    <option value="Soltero(a)">Soltero(a)</option>
                                                                    <option value="Comprometido(a)">Comprometido(a)</option>
                                                                    <option value="Casado(a)">Casado(a)</option>
                                                                    <option value="Unión libre o unión de hecho">Unión libre o unión de hecho</option>
                                                                    <option value="Divorciado(a)">Divorciado(a)</option>
                                                                    <option value="Viudo(a)">Viudo(a)</option>

                                                                </select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Hijos</label>
                                                                    <input name="Hijos" id="Hijos" type="text" class="form-control" placeholder="Número de Hijos" maxlength="2" onkeypress="return numeros(event)" required>
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
                                                                <label>Pais</label>

                                                                <select name="IdPais" id="IdPais"
                                                                    class="form-control">
                                                                    <option value="none" selected="" disabled="">Seleccionar</option>
                                                                    <?php foreach ($pdo->query('SELECT IDPais, NombrePais FROM pais') as $row) {													
                                                                    echo '<option value="'.$row['IDPais'].'">'.$row['NombrePais'].'</option>';
                                                                    }
                                                                  ?>
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Estado</label>
                                                                <select name="IdEstado" id="IdEstado" class="form-control">
                                                                    <option value="none" selected="" disabled="">Seleccionar</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Población</label>
                                                                <select name="IdPoblacion" id="IdPoblacion" class="form-control">
                                                                    <option value="none" selected="" disabled="">Seleccionar</option>
                                                                </select>
                                                            </div>
                                                                
                                                                <div class="form-group">
                                                                <label>Delegación</label>
                                                                    <input name="Delegacion" id="Delegacion" type="text" class="form-control" placeholder="Delegacion" maxlength="49"  required>
                                                                </div>
                                                  
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>Código Postal</label>
                                                                    <input name="CodigoPostal" id="CodigoPostal" type="text" class="form-control" placeholder="Código Postal" maxlength="5" onkeypress="return numeros(event)" required>
                                                                </div>
                                                               
                                                                <div class="form-group">
                                                                <label>Colonia</label>
                                                                    <input name="Colonia" id="Colonia" type="text" class="form-control" placeholder="Colonia" maxlength="70" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Dirección</label>
                                                                    <input name="Direccion" id="Direccion" type="text" class="form-control" placeholder="Dirección" maxlength="70" required>
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
																		<option value="none" selected="" disabled="">Seleccionar</option>
																		<option value="Empleado">Empleado</option>
																		
																	</select>
                                                                </div>
                                                           
                                                                <div class="form-group">
                                                                <label>Departamento</label>
                                                                    <input name="Departamento" id="Departamento" type="text" class="form-control" placeholder="Departamento" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Sueldo Diario</label>
                                                                    <input name="SueldoDiario" id="SueldoDiario" type="text" class="form-control" placeholder="Sueldo Diario" maxlenght="10" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Sueldo Anterior</label>
                                                                    <input name="SueldoAnterior" id="SueldoAnterior"
                                                                        type="text" class="form-control"
                                                                        placeholder="Sueldo Anterior" maxlenght="10"
                                                                        required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Sueldo Actual</label>
                                                                    <input name="SueldoActual" id="SueldoActual"
                                                                        type="text" class="form-control"
                                                                        placeholder="Sueldo Actual" maxlenght="10"
                                                                        required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label><strong>Fecha Alta</strong></label>
                                                                    <div class="input-group date">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-calendar"></i></span>
                                                                        <input type="date" name="FechaAlta"
                                                                            id="FechaAlta" class="form-control"
                                                                            value="<?php echo date("Y-m-d"); ?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <label><strong>Ultima Modificación</strong></label>
                                                                    <div class="input-group date">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-calendar"></i></span>
                                                                        <input type="date" name="UltimaModificacion"
                                                                            id="UltimaModificacion" class="form-control"
                                                                            value="<?php echo date("Y-m-d"); ?>">
                                                                    </div>
                                                                </div>
                                                  
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="chosen-select-single mg-b-20">
                                                                <label><strong>Sucursal</strong></label>
                                                                <?php 
                                                                    echo '<select name="IdSucursal" id="IdSucursal" data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1">';
                                                                    echo '<option value="">Seleccionar</option>';
                                                                    foreach ($pdo->query('SELECT IdSucursal, NombreSucursal FROM sucursal') as $row) {													
                                                                    echo '<option value="'.$row['IdSucursal'].'">'.$row['NombreSucursal'].'</option>';
                                                                    }
                                                                    echo'</select>';
                                                                ?>
                                                            </div>
                                                            <div class="chosen-select-single mg-b-20">
                                                                <label><strong>Puesto</strong></label>
                                                                <?php 
                                                                    echo '<select name="IdPuesto" id="IdPuesto" data-placeholder="Choose a Country..." class="chosen-select" tabindex="-1">';
                                                                    echo '<option value="">Seleccionar</option>';
                                                                    foreach ($pdo->query('SELECT IdPuesto, NombrePuesto FROM puestos') as $row) {													
                                                                    echo '<option value="'.$row['IdPuesto'].'">'.$row['NombrePuesto'].'</option>';
                                                                    }
                                                                    echo'</select>';
                                                                ?>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jornada</label>
                                                                <input name="Jornada" id="Jornada" type="text"
                                                                    class="form-control" placeholder="Jornada" required>
                                                            </div>

                                                            <div class="form-group ">
                                                                <label><strong>Fecha Baja</strong></label>
                                                                <div class="input-group date">
                                                                    <span class="input-group-addon"><i
                                                                            class="fa fa-calendar"></i></span>
                                                                    <input name="FechaBaja" id="FechaBaja" type="date"
                                                                        class="form-control"
                                                                        value="<?php echo date("Y-m-d"); ?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group res-mg-t-15">
                                                                <label>Concepto Baja</label>
                                                                <textarea name="ConceptoBaja" id="ConceptoBaja"
                                                                    placeholder="Concepto Baja" required></textarea>
                                                            </div>

                                                            <div class="form-group">

                                                                <div class="form-group">
                                                                    <label><strong>Fecha de Antigüedad</strong></label>
                                                                    <div class="input-group date">
                                                                        <span class="input-group-addon"><i
                                                                                class="fa fa-calendar"></i></span>
                                                                        <input name="FechaAntiguedad"
                                                                            id="FechaAntiguedad" type="date"
                                                                            class="form-control"
                                                                            value="<?php echo date("Y-m-d"); ?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label><strong>Tipo Contrato</strong></label>
                                                                        <select name="TipoContrato" id="TipoContrato"
                                                                            class="form-control">
                                                                            <option value="none" selected=""
                                                                                disabled="">Seleccionar</option>
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
                                                                    <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
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
  
       </body> <br/>
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
    
  
    
    <script type="text/javascript" language="javascript" >

$(document).ready(function () {
        $("#IdPais").change(function () {
            // e.preventDefault();

            $("#IdPais option:selected").each(function () {
                IdPais = $(this).val();
                $.post("Combo/Seleccionar_Estado.php", {
                    IdPais: IdPais
                    },
                    function (data) {
                        $("#IdEstado").html(data);
                    });
            });
        });
    });


    $(document).ready(function () {
        $("#IdEstado").change(function () {
            // e.preventDefault();

            $("#IdEstado option:selected").each(function () {
                IdEstado = $(this).val();
                $.post("Combo/Seleccionar_Poblacion.php", {
                    IdEstado: IdEstado
                    },
                    function (data) {
                        $("#IdPoblacion").html(data);
                    });
            });
        });
    });

    </script>