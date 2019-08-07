<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");
?>

<?php if($_SESSION['IdTipoUsuario']==1){ ?>
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
                                            <li><a href="Cursos.php">Cursos</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Agregar Curso</span>
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
                                <li class="active"><a href="#description">Agregar Curso</a></li>
                                
                            </ul>
                              <!--Alertas-->
                              <div class="alert alert-success" id="exito"  style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Datos insertados con éxito
                                </div>

                                <div class="alert alert-danger alert-mg-b" id="error"  style="display:none">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                    El curso ya existe
                            </div>
                             
                             <!--Fin alertas-->



                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form id="formulario" method="POST" class="add-department">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                                <label>Nombre del Curso</label>
                                                                <input name="NombreCurso" id="NombreCurso" type="text" class="form-control" placeholder="Nombre del curso" required="" maxlength="33">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Tipo de capacitación</label>
                                                                    <select name="Tipo" id="Tipo" class="form-control" required>
																			<option value="" selected="" disabled="">Seleccionar</option>
																			<option value="Interna">Interna</option>
																			<option value="Externa">Externa</option>
																			
																		</select>
                                                                </div>
                                                                
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        

                                                                <div class="form-group">
                                                             <label>Fecha del Curso</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="date" name="Fecha" id="Fecha" class="form-control" value="<?php echo date("Y-m-d"); ?>" >
                                        </div>
                                    </div>

                                    <div class="form-group res-mg-t-15">
                                                                    <label>Descripción</label>
                                                                    <textarea name="DescripcionCurso" id="DescripcionCurso" placeholder="Describa el curso" required="" maxlength="198"></textarea>
                                                                </div>
                                                                
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                                                    <a href="Cursos.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
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
<?php }else{echo "<br/><h1>No se puede acceder a este sitio</h1>";}?>
<script type="text/javascript" language="javascript" >
$(document).ready(function(){
   
	

   $(document).on('submit', '#formulario', function(event){
       event.preventDefault();
       var datos = $('#formulario').serialize();
       
       //alert(datos);
       if(datos != '' )
       {
           
           $.ajax({
               url:"Alta/Alta_Curso.php",
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
                   $("#error").fadeIn();
                   setTimeout(function(){
                   $("#error").fadeOut();
                   },2000);
                   
                   }
                   else if(data==2)
                   {
                    $("#exito").fadeIn();
                   setTimeout(function(){
                   $("#exito").fadeOut();
                   },2000);
                   $('#formulario')[0].reset();
                   
                   }

               }
           });
        
       }
       
   });

});
</script>