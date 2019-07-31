<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");


$IdUsuario= $_GET['IdUsuario'];

$sql1 = 'SELECT * from usuario where IdUsuario= :IdUsuario';
$sentencia = $pdo->prepare($sql1);
$sentencia ->execute([':IdUsuario'=>$IdUsuario]);
$usuarios = $sentencia->fetch(PDO::FETCH_OBJ);


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
                                            <li><span class="bread-blod">Actualizar Usuario</span>
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
                                <li class="active"><a href="#UsuarioId">Usuario</a></li>
                            
                                
                               
                            </ul>
                           
                              <!--Alertas-->
                              <div class="alert alert-success" id="exito" style="display:none">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  Datos Actualizados con éxito.
                              </div>
                              <div class="alert alert-danger alert-mg-b" id="error" style="display:none">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  Error al actualizar los datos.
                              </div>
                             <!--Fin alertas-->

                            <form method="POST" id="formulario">
                            <div id="myTabContent" class="tab-content custom-product-edit">
                               
                               
                            
                                     <div class="row">
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                                                                                       
                                                                <input type="hidden" name="IdUsuario" id="IdUsuario" value="<?php echo $IdUsuario?>">
                                                                <div class="form-group">
                                                                <label>Usuario</label>
                                                                <input type="hidden" name="IdUsuario" id="IdUsuario" value="<?=$empleado->IdUsuario?>" required>
                                                                    <input name="Usuario" id="Usuario" value="<?= $usuarios->Usuario?>" onkeypress="return validar(event)" onkeyup="this.value=this.value.toUpperCase()"  type="text" class="form-control" placeholder="Usuario" maxlength="49"  required>
                                                                </div>                                                                                                                               
                                                                <div class="form-group">
                                                                        <label><strong>Tipo Usuario</strong></label>
                                                                        <select name="IdTipoUsuario" id="IdTipoUsuario" class="form-control" required>
                                                                            <!-- <option value="" selected="" disabled="">Seleccionar</option> -->
                                                                            <option value="1"  <?php if($usuarios->IdTipoUsuario === "1"): echo "Selected"; endif;?>>Administrador</option>
                                                                            <option value="2" <?php if($usuarios->IdTipoUsuario === "2"): echo "Selected"; endif;?>>Empleado</option>

                                                                        </select>
                                                                    </div>
                                                            </div>
                                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            <div class="form-group">
                                                                <label class="control-label"
                                                                    for="password">Nueva Contraseña</label>
                                                                <div class="input-group custom-go-button">
                                                                    <input type="password" name="Contrasena" id="Contrasena" class="form-control" required
                                                                        placeholder="******" maxlength="40">
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

    $(document).ready(function(){
       

       $(document).on('submit', '#formulario', function(event){
           event.preventDefault();
           var datos = $('#formulario').serialize();
           //alert(datos);
           
            $.ajax({
                   url:"Editar/Editar_Usuario.php",
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

<!--script para quitar los espacios-->
<script type="text/javascript">
function validar(e) {
  tecla = (document.all) ? e.keyCode : e.which;
  return tecla!=32;
}
</script>