<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");


$IdSolicitudes = $_GET['IdSolicitudes'];
$sql = 'SELECT s.IdSolicitudes, s.Descripcion, s.FechaSolicitud, s.FechaAtencion, s.Atendido, 
s.Estatus, s.IdPersonal, s.Solicitud, p.Nombre , p.ApellidoPaterno, p.ApellidoMaterno
from solicitudes s
inner join personal p on s.IdPersonal = p.IdPersonal where IdSolicitudes = :IdSolicitudes';
$sentencia = $pdo->prepare($sql);
$sentencia ->execute([':IdSolicitudes'=>$IdSolicitudes]);
$solicitudes = $sentencia->fetch(PDO::FETCH_OBJ);

if(isset($_GET['Respuesta'])){
    $Respuesta = "si";
}



?>


<!-- forms CSS
	============================================ -->
    <link rel="stylesheet" href="../Recursos/css/all-type-forms.css">


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
                                <li><a href="Solicitudes.php">Solicitudes</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Atender solicitud</span>
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
                        <li class="active"><a href="#description">Atender Solicitud</a></li>

                    </ul>
                        <!--Alertas-->
                            <div class="alert alert-success" id="exito" style="display:none">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                Solicitud atendida con éxito
                            </div>

                            <div class="alert alert-danger alert-mg-b" id="error" style="display:none">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               Error al realizar la solicitud 
                            </div>

                            <div class="alert alert-warning alert-mg-b" id="existe" style="display:none">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                               Existe un archivo con el mismo nombre.
                            </div>
                             
                        <!--Fin alertas-->


                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                   
                                        <form method="POST" id="formulario" class="add-department">
                                            <div class="row">
                                            <input type="hidden" name="Respuesta" id="Respuesta" value="<?php if(isset($_GET['Respuesta'])){ echo $Respuesta; }?>">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <input type="hidden" name="IdSolicitudes" id="IdSolicitudes" value="<?php echo $IdSolicitudes?>">
                                                <div class="form-group">
                                                        <label>Fecha Solicitud</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                            <input type="date" name="Fecha" id="Fecha" class="form-control" value="<?=date("Y-m-d", strtotime( $solicitudes->FechaSolicitud)); ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Personal</label>    
                                                        <input type="hidden" name="IdPersonal" id="IdPersonal" value="<?= $solicitudes->IdPersonal?>" >                                                    
                                                        <input name="Personal" id="Personal" type="text" value="<?= $solicitudes->Nombre ." ". $solicitudes->ApellidoPaterno ." ". $solicitudes->ApellidoMaterno?>" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Solicitud</label>
                                                        
                                                        <input name="Solicitud" id="Solicitud" type="text" value="<?= $solicitudes->Solicitud;?>" class="form-control" readonly>
                                                    </div>
                                                    <div class="form-group res-mg-t-15">
                                                        <label>Descripción</label>
                                                        <textarea name="Descripcion" id="Descripcion"
                                                            placeholder="Descripcion" required="" maxlength="200" readonly><?=$solicitudes->Descripcion;?></textarea>
                                                    </div>
                          

                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

                                                

                                                    

                                                    <div class="form-group">
                                                        <label>Fecha atención</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i
                                                                    class="fa fa-calendar"></i></span>
                                                            <input type="date" name="FechaAtencion" id="FechaAtencion"
                                                                class="form-control" value="<?=date("Y-m-d")?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Atendido</label>
                                                        
                                                        <input name="Atendido" id="Atendido" type="text" value="<?php echo $_SESSION['Usuario'];?>" class="form-control" readonly>
                                                    </div>
                                                    <label><strong>Documentos</strong></label>
                                                    <div class="file-upload-inner ts-forms">
                                                    
                                                        <div class="input prepend-big-btn">
                                                        
                                                            <label class="icon-right" for="prepend-big-btn">
                                                                <i class="fa fa-download"></i>
                                                            </label>
                                                            <div class="file-button">
                                                                Seleccionar 
                                                                <input type="file" class="form-control" id="archivo[]" name="archivo[]"  required onchange="document.getElementById('prepend-big-btn').value = this.value;">
                                                            </div>
                                                            <input type="text" id="prepend-big-btn"
                                                                placeholder="          Ningún archivo seleccionado" readonly >
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress">
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">Guardar</button>
                                                        <a href="Solicitudes.php" class="btn btn-success waves-effect waves-light">Regresar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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


<?php
include ("../Master/Footer.php");
?>

<script type="text/javascript" language="javascript" >
$(document).ready(function(){
   
	

   $(document).on('submit', '#formulario', function(event){
       event.preventDefault();
       var datos = $('#formulario').serialize();
       
     // alert(datos);
           $.ajax({
               url:"Editar/Atender_Solicitud.php",
               method:'POST',
               data:new FormData(this),
               contentType:false,
               processData:false,
               success:function(data)
               {
                   //alert(data);
                   //$('#formulario')[0].reset();
                   if(data==1){
                   //readCurso();
                   $("#exito").fadeIn();
                   setTimeout(function(){
                   $("#exito").fadeOut();
                   },2000);
                   $('#formulario')[0].reset();
                   }
                   else if(data==2)
                   {
                    $("#error").fadeIn();
                   setTimeout(function(){
                   $("#error").fadeOut();
                   },2000);
                   }
                   else if(data==3)
                   {
                    $("#existe").fadeIn();
                   setTimeout(function(){
                   $("#existe").fadeOut();
                   },2000);
                   }

               }
           });
   });
   
});
</script>