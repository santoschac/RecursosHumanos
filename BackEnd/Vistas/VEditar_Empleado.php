<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");


$IdPersonal= $_GET['IdPersonal'];

$sql1 = 'SELECT p.Codigo, p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, p.Curp, p.Tipo, p.Direccion, p.Colonia, p.Delegacion, p.CodigoPostal, p.Rfc, p.Imss, p.FechaNacimiento, p.NivelAcademico, p.Sexo, p.EstadoCivil, p.Hijos, p.Padre, p.Madre, 
p.Departamento, p.SueldoDiario, p.SueldoAnterior, p.SueldoActual, p.FechaBaja, p.ConceptoBaja, p.FechaAlta, p.FechaAntiguedad, p.UltimaModificacion, p.TipoContrato, p.Telefono, p.IdPuesto, p.IdUsuario, p.IdSucursal, p.IdPoblacion, po.NombrePoblacion, e.IdEstado, e.NombreEstado, pa.IDPais, pa.NombrePais, s.NombreSucursal, em.IdEmpresa, Em.NombreEmpresa,
u.Usuario, u.Contrasena, u.IdTipoUsuario
FROM personal p
inner join usuario u on p.IdUsuario=u.IdUsuario
inner join poblacion po on p.IdPoblacion = po.IdPoblacion
inner join estado e on po.IdEstado = e.IdEstado
inner join pais pa on e.IDPais = pa.IDPais
inner join sucursal s on p.IdSucursal = s.IdSucursal
inner join empresa em on s.IdEmpresa = em.IdEmpresa where IdPersonal= :IdPersonal';
$sentencia = $pdo->prepare($sql1);
$sentencia ->execute([':IdPersonal'=>$IdPersonal]);
$empleado = $sentencia->fetch(PDO::FETCH_OBJ);


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
                                      
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">Inicio</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><a href="Empleados.php">Empleados</a> <span class="bread-slash">/</span>
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
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#personales">Datos Personales</a></li>
                                <li><a href="#DireccionId">Dirección</a></li>
                                <li><a href="#LaboralID">Laboral</a></li>
                                <li><a href="#UsuarioId">Usuario</a></li>
                                
                               
                            </ul>
                           
                              <!--Alertas-->
                              <div class="alert alert-success" id="exito" style="display:none">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  Datos Actualizados con éxito
                              </div>
                              <div class="alert alert-danger alert-mg-b" id="error" style="display:none">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  El Empleado ya existe
                              </div>
                             <!--Fin alertas-->

                            <form method="POST" id="formulario">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="personales">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <div id="dropzone1" class="pro-ad addcoursepro">
                                                <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>Código</label>
                                                                   <input name="Codigo" id="Codigo" type="text" value="<?=$empleado->Codigo?>" class="form-control" placeholder="Código" required="" maxlength="27">
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Nombres</label>
                                                                <input name="IdPersonal" id="IdPersonal" value="<?php echo $IdPersonal?>" type="hidden" class="form-control" required="" >                                                                
                                                                   <input name="Nombre" id="Nombre" value="<?=$empleado->Nombre;?>" type="text" class="form-control" placeholder="Nombre" required="" maxlength="60">
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Apellido Paterno</label>
                                                                    <input name="ApellidoPaterno" id="ApellidoPaterno" value="<?=$empleado->ApellidoPaterno?>" type="text" class="form-control" placeholder="Apellido Paterno" required="" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Apellido Materno</label>
                                                                    <input name="ApellidoMaterno" id="ApellidoMaterno" value="<?=$empleado->ApellidoMaterno?>" type="text" class="form-control" placeholder="Apellido Materno" required="" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label><strong>Fecha de nacimiento</strong></label>
                                                                    <div class="input-group date"><span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                        <input type="date" name="FechaNacimiento" id="FechaNacimiento" class="form-control" value="<?= date("Y-m-d", strtotime($empleado->FechaNacimiento) ); ?>">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Sexo</label>
                                                                    <select name="Sexo" id="Sexo" class="form-control" required>
																		<option value=""  disabled="">Seleccionar</option>
																		<option value="Masculino" <?php if("Masculino" === $empleado->Sexo): echo "Selected"; endif;?>>Masculino</option>
																		<option value="Femenino" <?php if("Femenino" === $empleado->Sexo): echo "Selected"; endif;?>>Femenino</option>
																	</select>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Nivel Académico</label>
                                                                    <input name="NivelAcademico" id="NivelAcademico" value="<?= $empleado->NivelAcademico?>" type="text" class="form-control"
                                                                        placeholder="Nivel Academico" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Rfc</label>                                                                
                                                                    <input name="Rfc" id="Rfc" value="<?= $empleado->Rfc?>"  type="text" class="form-control" placeholder="Rfc" maxlength="13" required>
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                            

                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                               
                                                                <div class="form-group">
                                                                    <label>Curp</label>
                                                                    <input name="Curp" id="Curp" value="<?= $empleado->Curp?>" type="text" class="form-control" placeholder="Curp" maxlength="18" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>IMSS</label>
                                                                    <input name="Imss" id="Imss" value="<?=$empleado->Imss?>" type="text" class="form-control" placeholder="IMSS" maxlength="11" required>
                                                                </div>
                                                                
                                                                <div class="form-group">
                                                                <label>Padre</label>
                                                                    <input name="Padre" name="Padre" id="Padre" value="<?= $empleado->Padre?>" type="text" class="form-control" placeholder="Nombre completo del Padre" maxlength="60">
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Madre</label>
                                                                    <input name="Madre" name="Madre" id="Madre" value="<?= $empleado->Madre?>" type="text" class="form-control" placeholder="Nombre completo de la  Madre" maxlength="60">
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Estado Civil</label>
                                                                <select name="EstadoCivil" id="EstadoCivil" class="form-control" required>
                                                                    <option value="" disabled="">Seleccionar</option>
                                                                    <option value="Soltero(a)" <?php if("Soltero(a)" === $empleado->EstadoCivil): echo "Selected"; endif;?>>Soltero(a)</option>
                                                                    <option value="Comprometido(a)"  <?php if("Comprometido(a)" === $empleado->EstadoCivil): echo "Selected"; endif;?>>Comprometido(a)</option>
                                                                    <option value="Casado(a)"  <?php if("Casado(a)" === $empleado->EstadoCivil): echo "Selected"; endif;?>>Casado(a)</option>
                                                                    <option value="Unión libre o unión de hecho"  <?php if("Unión libre o unión de hecho" === $empleado->EstadoCivil): echo "Selected"; endif;?>>Unión libre o unión de hecho</option>
                                                                    <option value="Divorciado(a)"  <?php if("Divorciado(a)" === $empleado->EstadoCivil): echo "Selected"; endif;?>>Divorciado(a)</option>
                                                                    <option value="Viudo(a)"  <?php if("Viudo(a)" === $empleado->EstadoCivil): echo "Selected"; endif;?>>Viudo(a)</option>

                                                                </select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Hijos</label>
                                                                    <input name="Hijos" id="Hijos" value="<?=$empleado->Hijos;?>" type="text" class="form-control" placeholder="Número de Hijos" maxlength="2" onkeypress="return numeros(event)">
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Teléfono</label>
                                                                    <input name="Telefono" id="Telefono" value="<?= $empleado->Telefono?>" type="text" class="form-control" placeholder="Teléfono" maxlength="10" onkeypress="return numeros(event)">
                                                                </div>
                                                                
                                                                
                                                            </div>
                                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress">
                                                        <a href="Empleados.php" class="btn btn-success waves-effect waves-light">Regresar</a>
                                                    </div>
                                                </div>
                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="DireccionId">
                                <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            <div class="form-group">
                                                                <label>País</label>
                                                                <select name="IdPais" id="IdPais" class="form-control" required>
                                                                    <option value="" selected="" disabled="">Seleccionar</option>
                                                                    <?php foreach ($pdo->query('SELECT IDPais, NombrePais FROM pais') as $row):?>												
                                                                     <option value="<?php echo $row['IDPais']?>" <?php if($row['IDPais']===$empleado->IDPais): echo "Selected"; endif;?>><?php echo $row['NombrePais']?></option>
                                                                    
                                                                <?php endforeach; ?>
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Estado</label>
                                                                <select name="IdEstado" id="IdEstado" class="form-control" required>
                                                                    <option value="" selected="" disabled="">Seleccionar</option>
                                                                    <?php foreach ($pdo->query('SELECT IdEstado, NombreEstado FROM estado') as $row): ?>													
                                                                      <option value="<?php echo $row['IdEstado']?>" <?php if($row['IdEstado']===$empleado->IdEstado): echo "Selected"; endif;?>><?php echo $row['NombreEstado']?></option>
                                                                    
                                                                <?php endforeach; ?>
                                                                </select>

                                                            </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Población</label>
                                                                <select name="IdPoblacion" id="IdPoblacion" class="form-control" required>
                                                                    <option value="" selected="" disabled="">Seleccionar</option>
                                                                    <?php foreach ($pdo->query('SELECT IdPoblacion, NombrePoblacion FROM poblacion') as $row): ?>													
                                                                      <option value="<?php echo $row['IdPoblacion']?>" <?php if($row['IdPoblacion']===$empleado->IdPoblacion): echo "Selected"; endif;?>><?php echo $row['NombrePoblacion']?></option>
                                                                    
                                                                <?php endforeach; ?>
                                                                </select>

                                                            </div>
                                                          
                                                                
                                                                <div class="form-group">
                                                                <label>Delegación</label>
                                                                    <input name="Delegacion" id="Delegacion" value="<?= $empleado->Delegacion?>" type="text" class="form-control" placeholder="Delegacion" maxlength="49"  required>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            <div class="form-group">
                                                                <label>Código Postal</label>
                                                                    <input name="CodigoPostal" id="CodigoPostal" value="<?=$empleado->CodigoPostal?>" type="text" class="form-control" placeholder="Código Postal" maxlength="5" onkeypress="return numeros(event)" required>
                                                                </div>
                                                               
                                                                <div class="form-group">
                                                                <label>Colonia</label>
                                                                    <input name="Colonia" id="Colonia" value="<?= $empleado->Colonia?>" type="text" class="form-control" placeholder="Colonia" maxlength="70" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Dirección</label>
                                                                    <input name="Direccion" id="Direccion" value="<?= $empleado->Direccion?>" type="text" class="form-control" placeholder="Dirección" maxlength="70" required>
                                                                </div>
                                                                
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress">
                                                        <a href="Empleados.php" class="btn btn-success waves-effect waves-light">Regresar</a>
                                                    </div>
                                                </div>
                                            </div>
                                </div>
                                <div class="product-tab-list tab-pane fade" id="UsuarioId">
                                     <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                                       
                                                                
                                                                <div class="form-group">
                                                                <label>Usuario</label>
                                                                <input type="hidden" name="IdUsuario" id="IdUsuario" value="<?=$empleado->IdUsuario?>" required>
                                                                    <input name="Usuario" id="Usuario" value="<?= $empleado->Usuario?>" onkeypress="return validar(event)" onkeyup="this.value=this.value.toUpperCase()"  type="text" class="form-control" placeholder="Usuario" maxlength="49"  required>
                                                                </div>                                                                                                                               
                                                  
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label"
                                                                    for="password">Contraseña</label>
                                                                <div class="input-group custom-go-button">
                                                                    <input type="password" name="Contrasena"
                                                                        id="Contrasena" class="form-control"
                                                                        placeholder="******" required="" value="<?=$empleado->Contrasena?>"
                                                                        maxlength="40">
                                                                    <span class="input-group-btn"><button
                                                                            class="btn btn-primary" type="button"
                                                                            onclick="mostrarContrasena()"><span
                                                                                class="glyphicon glyphicon-eye-open"></span></button></span>
                                                                </div>
                                                                <br />
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
                                </div>
                                <div class="product-tab-list tab-pane fade" id="LaboralID">
                                <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            <div class="form-group">
                                                                <label>Tipo</label>
                                                                    <select name="Tipo" id="Tipo" class="form-control" required>
																		<option value=""  disabled="">Seleccionar</option>
																		<option value="Empleado" <?php if("Empleado"=== $empleado->Tipo): echo "Selected"; endif;?>>Empleado</option>
																	</select>
                                                                </div>
                                                           
                                                                <div class="form-group">
                                                                <label>Departamento</label>
                                                                    <input name="Departamento" id="Departamento" value="<?=$empleado->Departamento?>" type="text" class="form-control" placeholder="Departamento" maxlength="60" required>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Sueldo Diario</label>
                                                                    <input name="SueldoDiario" id="SueldoDiario" value="<?= $empleado->SueldoDiario?>" type="text" class="form-control" placeholder="Sueldo Diario" maxlenght="10" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Sueldo Anterior</label>
                                                                    <input name="SueldoAnterior" id="SueldoAnterior" value="<?=$empleado->SueldoAnterior?>" type="text" class="form-control"
                                                                        placeholder="Sueldo Anterior" maxlenght="10" required>
                                                                </div>
                                                                <div class="form-group">
                                                                    <label>Sueldo Actual</label>
                                                                    <input name="SueldoActual" id="SueldoActual" value="<?= $empleado->SueldoActual?>" type="text" class="form-control" placeholder="Sueldo Actual" maxlenght="10" required>
                                                                </div>

                                                                <div class="form-group">
                                                                    <!-- <label><strong>Fecha Alta</strong></label> -->
                                                                    <div class="input-group date">
                                                                        <!-- <span class="input-group-addon"><i class="fa fa-calendar"></i></span>--><input type="hidden" name="FechaAlta" id="FechaAlta" class="form-control" value="<?= date("Y-m-d", strtotime($empleado->FechaAlta));?>">
                                                                    </div>
                                                                </div>

                                                                <div class="form-group">
                                                                    <!--<label><strong>Ultima Modificación</strong></label>-->
                                                                    <div class="input-group date">
                                                                        <input type="hidden" name="UltimaModificacion" id="UltimaModificacion" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                                                    </div>
                                                                </div>
                                                  
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>Empresa</label>
                                                                <select name="Empresa" id="Empresa" class="form-control" required>
                                                                    <option value="" selected="" disabled="">Seleccionar</option>
                                                                    <?php foreach ($pdo->query('SELECT IdEmpresa, NombreEmpresa FROM empresa') as $row): ?>													
                                                                      <option value="<?php echo $row['IdEmpresa']?>" <?php if($row['IdEmpresa']===$empleado->IdEmpresa): echo "Selected"; endif;?>><?php echo $row['NombreEmpresa']?></option>
                                                                    
                                                                <?php endforeach; ?>
                                                                </select>

                                                            </div>
                                                            <div class="form-group">
                                                                <label>Sucursal</label>
                                                                <select name="IdSucursal" id="IdSucursal" class="form-control" required>
                                                                    <option value="" selected="" disabled="">Seleccionar</option>
                                                                    <?php foreach ($pdo->query('SELECT IdSucursal, NombreSucursal FROM sucursal') as $row): ?>													
                                                                      <option value="<?php echo $row['IdSucursal']?>" <?php if($row['IdSucursal']===$empleado->IdSucursal): echo "Selected"; endif;?>><?php echo $row['NombreSucursal']?></option>
                                                                    
                                                                <?php endforeach; ?>
                                                                </select>

                                                            </div>                                                          
                                                      
                                                          
                                                            <div class="chosen-select-single mg-b-20">
                                                                <label><strong>Puesto</strong></label>
                                                                    <select name="IdPuesto" id="IdPuesto" required data-placeholder="Seleccionar" class="chosen-select" tabindex="-1">
                                                                    <option value="">Seleccionar</option>';
                                                                   <?php  foreach ($pdo->query('SELECT IdPuesto, NombrePuesto FROM puestos') as $row):?>												
                                                                    <option value="<?php echo $row['IdPuesto']?>" <?php if($row['IdPuesto']=== $empleado->IdPuesto): echo'selected'; endif;?> ><?php echo $row['NombrePuesto']?> </option>
                                                                <?php endforeach;?>
                                                                    </select>
                                                                
                                                            </div>
                                                           
                                                            <div class="form-group">
                                                            <label>¿Se tiene dado de baja?</label>
                                                            <input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
                                                            </div>
                                                            <div id="content" style="display: none;">
                                                            <div class="form-group ">
                                                                <label><strong>Fecha Baja</strong></label>
                                                                <div class="input-group date">
                                                                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                    <input name="FechaBaja" id="FechaBaja" type="date" class="form-control" value="<?= date("Y-m-d", strtotime($empleado->FehaBaja));?>">
                                                                </div>
                                                            </div>
                                                            <div class="form-group res-mg-t-15">
                                                                <label>Concepto Baja</label>
                                                                <textarea name="ConceptoBaja" id="ConceptoBaja"
                                                                    placeholder="Concepto Baja" ><?=$empleado->ConceptoBaja?></textarea>
                                                            </div>
                                                        </div>

                                                            

                                                            <div class="form-group">

                                                                <div class="form-group">
                                                                    <label><strong>Fecha de Antigüedad</strong></label>
                                                                    <div class="input-group date">
                                                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                        <input name="FechaAntiguedad" id="FechaAntiguedad" type="date" class="form-control" value="<?= date("Y-m-d", strtotime($empleado->FechaAntiguedad));?>">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label><strong>Tipo Contrato</strong></label>
                                                                        <select name="TipoContrato" id="TipoContrato" class="form-control" required>
                                                                            <option value="" disabled="">Seleccionar</option>
                                                                            <option value="Fijo" <?php if("Fijo"=== $empleado->TipoContrato): echo "Selected"; endif;?>>Fijo</option>
                                                                            <option value="Temporal" <?php if("Temporal"=== $empleado->TipoContrato): echo "Selected"; endif;?>>Temporal</option>

                                                                        </select>
                                                                    </div>

                                                                </div>
                                                        </div>
                                </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress">
                                                        <a href="Empleados.php" class="btn btn-success waves-effect waves-light">Regresar</a>
                                                    </div>
                                                </div>
                                            </div>
                                                        

                            </div>
                            
                            </form>
                           
                        </div>
                    </div>
                </div><br/>
            </div>
        </div>
         <!--End Single pro tab review Start-->
  
    

<?php
 include ("../Master/Footer.php");
?>

    <!-- datapicker JS
		============================================ -->
    <script src="../Recursos/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="../Recursos/js/datapicker/datepicker-active.js"></script>
 
    <!-- chosen JS
		============================================ -->
    <script src="../Recursos/js/chosen/chosen.jquery.js"></script>
    <script src="../Recursos/js/chosen/chosen-active.js"></script>

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
}

</script>
    

    
<script type="text/javascript" language="javascript" >
 $(document).ready(function () {
        $("#Empresa").change(function () {
            // e.preventDefault();

            $("#Empresa option:selected").each(function () {
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


    $(document).ready(function(){
       

       $(document).on('submit', '#formulario', function(event){
           event.preventDefault();
           var datos = $('#formulario').serialize();

               $.ajax({
                   url:"Editar/Editar_Empleado.php",
                   method:'POST',
                   data:new FormData(this),
                   contentType:false,
                   processData:false,
                   success:function(data)
                   {
                    //alert(data);
                       if(data==1){
                       $("#exito").fadeIn();
                       setTimeout(function(){
                       $("#exito").fadeOut();
                       },3000);
                       $('#formulario')[0].reset();

                       }
                       else if(data==2)
                       {
                        $("#error").fadeIn();
                       setTimeout(function(){
                       $("#error").fadeOut();
                       },3000);
                       }
    
                   }
               });
       });
  
    });
    </script>
      <script>
    function mostrarContrasena() {
      var tipo = document.getElementById("Contrasena");
      if (tipo.type == "password") {
        tipo.type = "text";
      } else {
        tipo.type = "password";
      }
    }
  </script>
    
    
  <!--ocultar y mostrar un div con un checkbox-->
<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>