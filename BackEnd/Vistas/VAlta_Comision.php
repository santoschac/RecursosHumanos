<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");


// $sql= $pdo->prepare("SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, p.Departamento, pu.NombrePuesto, s.NombreSucursal, e.NombreEmpresa, por.IdComisionPorcentaje, por.Porcentaje
// from personal p
// inner join puestos pu on p.IdPuesto= pu.IdPuesto
// inner join sucursal s on p.IdSucursal = s.IdSucursal
// inner join empresa e on s.IdEmpresa = e.IdEmpresa
// inner join comisionporcentaje por on p.IdPersonal = por.IdPersonal");
// $sql->execute();
// $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);


if(isset($_GET['IdComisionPorcentaje'])){

    $IdComisionPorcentaje = $_GET['IdComisionPorcentaje'];
    $sql = 'SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, p.Departamento, pu.NombrePuesto, s.NombreSucursal, e.NombreEmpresa, por.IdComisionPorcentaje, por.Porcentaje
    from personal p
    inner join puestos pu on p.IdPuesto= pu.IdPuesto
    inner join sucursal s on p.IdSucursal = s.IdSucursal
    inner join empresa e on s.IdEmpresa = e.IdEmpresa 
    inner join comisionporcentaje por on p.IdPersonal = por.IdPersonal WHERE IdComisionPorcentaje= :IdComisionPorcentaje';
    $statement = $pdo->prepare($sql);
    $statement-> execute([':IdComisionPorcentaje'=> $IdComisionPorcentaje]);
    $Personal = $statement->fetch(PDO::FETCH_OBJ);
    }

?>

<!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">


    <style>
    #mdialTamanio{
      width: 70% !important;
      
      }
  </style>

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
                                            <li><a href="Comision.php">Comisión</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Agregar Comisión</span>
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
                                <li class="active"><a href="#description">Agregar Comisión</a></li>
                                
                            </ul>
                            
                            <!--Alertas-->
                            <div class="alert alert-success" id="exito" style="display:none">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  Datos insertados con éxito
                              </div>
                              <div class="alert alert-danger alert-mg-b" id="error" style="display:none">
                                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">&times;</span>
                                  </button>
                                  El  ya existe
                              </div>
                             <!--Fin alertas-->
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form  method="POST" id="formulario" class="add-department">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


                                                        <div class="form-group">
                                                            <label class="control-label" for="Personal">Personal</label>
                                                            <input type="hidden" name="IdPersonal" id="IdPersonal" value="<?php if(isset($_GET['IdComisionPorcentaje'])):?><?=$Personal->IdPersonal;?><?php endif;?>" >
                                                            <div class="input-group custom-go-button">
                                                                <input type="text" name="Personal" id="Personal" class="form-control" placeholder="Nombre Personal"
                                                                    required="" value="<?php if(isset($_GET['IdComisionPorcentaje'])):?><?=$Personal->Nombre ." ". $Personal->ApellidoPaterno ." ". $Personal->ApellidoMaterno;?><?php endif;?>"
                                                                    maxlength="60" readonly=""><span class="input-group-btn"><a class="Primary mg-b-10"
                                                                    href="#" data-toggle="modal" data-target="#ModalTablaPersonal"><button class="btn btn-primary" type="button"><span
                                                                    class="glyphicon glyphicon-zoom-in"></span></button></span></a>
                                                            </div>

                                                        </div>
                                                       

                                                        <div class="form-group">
                                                            <label>Empresa</label>
                                                            <input name="EmpresaAnterior" id="EmpresaAnterior" value="<?php if(isset($_GET['IdComisionPorcentaje'])):?><?=$Personal->NombreEmpresa?><?php endif;?>" type="text" class="form-control" placeholder="Empresa anterior" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sucursal</label>
                                                            <input name="SucursalAnterior" id="SucursalAnterior" value="<?php if(isset($_GET['IdComisionPorcentaje'])):?><?=$Personal->NombreSucursal?><?php endif;?>" type="text" class="form-control" placeholder="Sucursal anterior" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Puesto</label>
                                                            <input name="PuestoAnterior" id="PuestoAnterior" value="<?php if(isset($_GET['IdComisionPorcentaje'])):?><?= $Personal->NombrePuesto?><?php endif;?>" type="text" class="form-control" placeholder="Puesto anterior" readonly>
                                                        </div>
                                                       
                                                               
                                                            
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group data-custon-pick">
                                                            <label><strong>Fecha </strong></label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="date" name="Fecha" id="Fecha" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Porcentaje (%)</label>
                                                            <input name="Porcentaje" id="Porcenteje" value="<?php if(isset($_GET['IdComisionPorcentaje'])):?><?=$Personal->Porcentaje?><?php endif;?>" type="text" class="form-control" placeholder="Pocentaje (%)" readonly>
                                                        </div>
                                                        <div class="chosen-select-single mg-b-20">
                                                            <label><strong>Monto comisión</strong></label>
                                                            <input type="text" name="MontoComision" id="MontoComision" class="form-control" required onkeypress="return numeros(event)" maxlength="10">
                                                        </div>
                                                        <div class="chosen-select-single mg-b-20">
                                                            <label><strong>Monto cobrado</strong></label>
                                                            <input type="text" name="MontoCobrado" id="MontoCobrado" class="form-control" required readonly>
                                                        </div>
                                                        <div class="chosen-select-single mg-b-20">
                                                            <!-- <label><strong>IdComisionPorcentaje</strong></label> -->
                                                            <input type="hidden" name="IdComisionPorcentaje" id="IdComisionPorcentaje" class="form-control" value="<?php if(isset($_GET['IdComisionPorcentaje'])):?><?=$Personal->IdComisionPorcentaje?><?php endif;?>" required>
                                                        </div>
                                                        
                                                           
                                                        </div>
                                                        
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                                <br/>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                                                    <a href="Comision.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
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
   

 <!--Modal tabla-->
 <div id="ModalTablaPersonal" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
                            <div class="modal-dialog" id="mdialTamanio">
                                <div class="modal-content">
                                    <div class="modal-header header-color-modal bg-color-1">
                                        <h4 class="modal-title">Lista del personal</h4>
                                        <div class="modal-close-area modal-close-df">
                                            <a class="close" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                                        </div>
                                    </div>
                                     <!---->
                                     <div class="row">
                               
                               <form method="post" action="#" id="formulariotabla">
                               <div class="col-md-1"></div>
                               <div class="col-md-4">
                                   <label>Empresa</label>
                                   <select name="IdEmpresa" id="IdEmpresa" class="form-control" required>
                                     <option value="" selected="" disabled="">Seleccionar</option>
                                      <?php foreach ($pdo->query('SELECT IdEmpresa, NombreEmpresa from empresa')as $dato){?>
                                      <option value="<?php echo $dato['IdEmpresa'];?>"> <?php echo $dato['NombreEmpresa']; ?> </option>
                                      <?php } ?>
                                   </select>
                               </div>
                               <div class="col-md-4">
                               <label>Sucursal</label>
                                                           <select name="IdSucursal" id="IdSucursal"class="form-control" required>
                                                               <option value="" selected="" disabled="">Seleccionar</option>
                                                           </select>           
                               </div>
                               <div class="col-md-3"><br/>
                               <button class="btn btn-primary" type="submit">Aceptar</button>
                               </div> 
                               </form>
                               </div>
                                   <!---->
                                    
               <!-- Static Table Start -->
         <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                           
                        <div class="sparkline13-graph">
                            <div id="tabla" class="datatable-dashv1-list custom-datatable-overright"> 

                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
        <!-- Static Table End -->
 
                                </div>
                            </div>
                        </div>
        <!--Fin modal tabla-->


<?php
 include ("../Master/Footer.php");
?>


<?php }else{echo "<br/><h1>No se puede acceder a este sitio</h1>";}?>
 <!-- data table JS
		============================================ -->
        <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
    
    <script type="text/javascript" language="javascript">

    $(document).ready(function(){
       

       $(document).on('submit', '#formulario', function(event){
           event.preventDefault();
           var datos = $('#formulario').serialize();
//alert(datos);

               $.ajax({
                   url:"Alta/Alta_Comision.php",
                   method:'POST',
                   data:new FormData(this),
                   contentType:false,
                   processData:false,
                   success:function(data)
                   {
                    // alert(data);
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


    $(document).ready(function () {
        $("#IdEmpresa").change(function () {
            // e.preventDefault();

            $("#IdEmpresa option:selected").each(function () {
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

    $(document).ready(function(){
       
       $(document).on('submit', '#formulariotabla', function(event){
           event.preventDefault();
           var datos = $('#formulariotabla').serialize();
//alert(datos);

               $.ajax({
                   url:"TablasModal/TablaPersonalComision.php",
                   method:'POST',
                   data:new FormData(this),
                   contentType:false,
                   processData:false,
                   success:function(data)
                   {
                     //alert(data);
                     $("#tabla").html(data);
                     
                   }
               });
       });
  
    });
    </script>
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