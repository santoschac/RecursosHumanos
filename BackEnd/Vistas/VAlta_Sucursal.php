<?php
include("../Master/Header.php");
?>


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
                                            <li><a href="Sucursal.php">Sucursal</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Agregar Sucursal</span>
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
                                <li class="active"><a href="#description">Agregar Sucursal</a></li>
                                
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
                                    La sucursal ya existe
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
                                                                <label>Empresa</label>
                                                                 
                                                                  <select name="IdEmpresa" id="Empresa" class="form-control" required>
																  <option value="" selected="" disabled="" required>Seleccionar</option>
                                                                  <?php foreach ($pdo->query('SELECT IdEmpresa, NombreEmpresa FROM empresa') as $row) {													
                                                                    echo '<option value="'.$row['IdEmpresa'].'">'.$row['NombreEmpresa'].'</option>';
                                                                    }
                                                                    ?> 
                                                                    </select>
                                                                   
                                                                </div>
                                                            
                                                                <div class="form-group">
                                                                <label>Nombre Sucursal</label>
                                                                <input name="NombreSucursal" id="NombreSucursal" type="text" class="form-control" placeholder="Nombre de la sucursal" required="" maxlength="60">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                                <label>Estado</label>
                                                               
                                                                  <select name="IdEstado" id="IdEstado" class="form-control" required>
																  <option value="" selected="" disabled="" required>Seleccionar</option>
                                                                  <?php  foreach ($pdo->query('SELECT IdEstado, NombreEstado FROM estado') as $row) {													
                                                                    echo '<option value="'.$row['IdEstado'].'">'.$row['NombreEstado'].'</option>';
                                                                    }
                                                                    ?>
                                                                    </select>
                                                                   
                                                                </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Población</label>
                                                                    <select name="IdPoblacion" id="IdPoblacion" class="form-control" required>
																			<option value="" selected="" disabled="" required>Seleccionar</option>
                                                                    </select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Región</label>
                                                                <input name="Region" id="Region" required type="text" class="form-control" placeholder="Región" maxlength="60">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                            <br/>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                                                    <a href="Sucursal.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
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

<script>

$(document).ready(function () {
    $("#IdEstado").change(function () { 
        // e.preventDefault();

        $("#IdEstado option:selected").each(function () {
            IdEstado = $(this).val();
            $.post("Combo/Seleccionar_Poblacion.php",{ IdEstado: IdEstado},
            function(data){
                $("#IdPoblacion").html(data);
            });            
        });
    });
});

</script>



<script type="text/javascript" language="javascript" >
$(document).ready(function(){
   
	

   $(document).on('submit', '#formulario', function(event){
       event.preventDefault();
       var datos = $('#formulario').serialize();
       
      // alert(datos);
           $.ajax({
               url:"Alta/Alta_Sucursal.php",
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
   });
   
});
</script>