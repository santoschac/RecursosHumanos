<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");

$IdIncapacidad = $_GET['IdIncapacidad'];
$sql1 = 'SELECT i.IdIncapacidad, i.DiaInicio, i.DiaFinal, i.Descripcion, i.Documento, i.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, s.NombreSucursal, e.NombreEmpresa, pu.NombrePuesto
from incapacidad i
inner join personal p on i.IdPersonal = p.IdPersonal
inner join sucursal s on p.IdSucursal = s.IdSucursal
inner join empresa e on s.IdEmpresa = e.IdEmpresa
inner join puestos pu on p.IdPuesto = pu.IdPuesto where IdIncapacidad = :IdIncapacidad';
$sentencia=$pdo->prepare($sql1);
$sentencia->execute(['IdIncapacidad'=>$IdIncapacidad]);
$Incapacidades = $sentencia->fetch(PDO::FETCH_OBJ);


$sql= $pdo->prepare("SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, p.Departamento, pu.NombrePuesto, s.NombreSucursal, e.NombreEmpresa
from personal p
inner join puestos pu on p.IdPuesto= pu.IdPuesto
inner join sucursal s on p.IdSucursal = s.IdSucursal
inner join empresa e on s.IdEmpresa = e.IdEmpresa");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);


if(isset($_GET['IdPersonal'])){

    $IdPersonal = $_GET['IdPersonal'];
    $sql = 'SELECT p.IdPersonal, p.Nombre, p.ApellidoPaterno, p.ApellidoMaterno, p.Departamento, pu.NombrePuesto, s.NombreSucursal, e.NombreEmpresa
    from personal p
    inner join puestos pu on p.IdPuesto= pu.IdPuesto
    inner join sucursal s on p.IdSucursal = s.IdSucursal
    inner join empresa e on s.IdEmpresa = e.IdEmpresa WHERE IdPersonal=:IdPersonal';
    $statement = $pdo->prepare($sql);
    $statement-> execute([':IdPersonal'=> $IdPersonal]);
    $Personal = $statement->fetch(PDO::FETCH_OBJ);
    }


?>

<!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">


 <!-- datapicker CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/datapicker/datepicker3.css">
 <!-- chosen CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/chosen/bootstrap-chosen.css">
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
                                            <li><a href="Incapacidad.php">Incapacidad</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Actualizar Incapacidad</span>
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
                                <li class="active"><a href="#description">Actualizar Incapacidad</a></li>
                                
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
                                                <form  method="POST" id="formulario" class="add-department">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <input type="hidden" name="IdIncapacidad" id="IdIncapacidad" value="<?php echo $IdIncapacidad?>">
                                                        <div class="form-group">
                                                            <label class="control-label" for="Personal">Personal</label>
                                                            <input type="hidden" name="IdPersonal" id="IdPersonal" value="<?php if(isset($_GET['IdIncapacidad'])):?><?=$Incapacidades->IdPersonal;?><?php endif;?><?php if(isset($_GET['IdPersonal'])):?><?=$Incapacidades->IdPersonal;?><?php endif;?>" >
                                                            <div class="form-group">
                                                                <input type="text" name="Personal" id="Personal" class="form-control" placeholder="Nombre Personal" required="" value="<?php if(isset($_GET['IdIncapacidad'])):?><?=$Incapacidades->Nombre ." ". $Incapacidades->ApellidoPaterno ." ". $Incapacidades->ApellidoMaterno;?><?php endif;?><?php if(isset($_GET['IdPersonal'])):?><?=$Personal->Nombre ." ". $Personal->ApellidoPaterno ." ". $Personal->ApellidoMaterno;?><?php endif;?>"
                                                                     maxlength="60" readonly=""><!--<span class="input-group-btn"><a class="Primary mg-b-10"
                                                                    href="#" data-toggle="modal" data-target="#ModalTablaPersonal"><button class="btn btn-primary" type="button"><span
                                                                    class="glyphicon glyphicon-zoom-in"></span></button></span></a> -->
                                                            </div>

                                                        </div>

                                                        <div class="form-group">
                                                            <label>Empresa</label>
                                                            <input name="EmpresaAnterior" id="EmpresaAnterior" value="<?php if(isset($_GET['IdIncapacidad'])):?><?=$Incapacidades->NombreEmpresa?><?php endif;?><?php if(isset($_GET['IdPersonal'])):?><?=$Personal->NombreEmpresa?><?php endif;?>" type="text" class="form-control" placeholder="Empresa anterior" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Sucursal</label>
                                                            <input name="SucursalAnterior" id="SucursalAnterior" value="<?php if(isset($_GET['IdIncapacidad'])):?><?=$Incapacidades->NombreSucursal?><?php endif;?><?php if(isset($_GET['IdPersonal'])):?><?=$Personal->NombreEmpresa?><?php endif;?>" type="text" class="form-control" placeholder="Sucursal anterior" readonly>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Puesto</label>
                                                            <input name="PuestoAnterior" id="PuestoAnterior" value="<?php if(isset($_GET['IdIncapacidad'])):?><?= $Incapacidades->NombrePuesto?><?php endif;?><?php if(isset($_GET['IdPersonal'])):?><?=$Personal->NombreEmpresa?><?php endif;?>" type="text" class="form-control" placeholder="Puesto anterior" readonly>
                                                        </div>
                                                        
                                                               
                                                            
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                       
                                                        <div class="form-group data-custon-pick">
                                                            <label><strong>Día Inicio</strong></label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="date" name="DiaInicio" id="DiaInicio" class="form-control" value="<?= date("Y-m-d", strtotime($Incapacidades->DiaInicio)) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group data-custon-pick">
                                                            <label><strong>Día Final</strong></label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="date" name="DiaFinal" id="DiaFinal" class="form-control" value="<?= date("Y-m-d", strtotime($Incapacidades->DiaFinal)); ?>">
                                                            </div>
                                                        </div>
                                                            <div class="form-group res-mg-t-15">
                                                        <label>Descripción</label>
                                                        <textarea name="Descripcion" id="Descripcion"
                                                            placeholder="Descripcion" required="" maxlength="200" ><?= $Incapacidades->Descripcion?></textarea>
                                                    </div>
                                                    <label><strong>Documentos</strong></label>
                                                    <div class="file-upload-inner ts-forms">
                                                    
                                                        <div class="input prepend-big-btn">
                                                        
                                                            <label class="icon-right" for="prepend-big-btn">
                                                                <i class="fa fa-download"></i>
                                                            </label>
                                                            <div class="file-button">
                                                                Seleccionar 
                                                                <input type="file" class="form-control" id="archivo[]" name="archivo[]" required onchange="document.getElementById('prepend-big-btn').value = this.value;">
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
                                                                <br/>
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Actualizar</button>
                                                                    <a href="Incapacidad.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
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
   <style>
    #mdialTamanio{
      width: 60% !important;
      
      }
  </style>

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
                                    
                                    
               <!-- Static Table Start -->
         <div class="data-table-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                           
                            <div class="sparkline13-graph">
                                <div class="datatable-dashv1-list custom-datatable-overright">                                                
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-key-events="true" data-cookie="true"
                                        data-cookie-id-table="saveId"  data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>                                            
                                            <th>Empresa</th>
                                            <th>Sucursal</th>
                                            <th>Puesto</th>
                                            <th>Departamento</th>
                                            <th>Seleccionar</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdPersonal']; ?></td>
                                                <td><?php echo $dato['Nombre']; ?></td>
                                                <td><?php echo $dato['ApellidoPaterno'] ." ". $dato['ApellidoMaterno']; ?></td>                                                
                                                <td><?php echo $dato['NombreEmpresa']; ?></td>
                                                <td><?php echo $dato['NombreSucursal']; ?></td>
                                                <td><?php echo $dato['NombrePuesto']; ?></td>
                                                <td><?php echo $dato['Departamento']; ?></td>
                                                
                                                <td>
                                                <a href="VEditar_Incapacidad.php?IdPersonal=<?php echo $dato['IdPersonal']; ?>&IdIncapacidad=<?php echo $IdIncapacidad ?>"><button data-toggle="tooltip" class="pd-setting-ed"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button><a>
                                                    
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
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

 <!-- data table JS
		============================================ -->
        <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

  <!-- datapicker JS
		============================================ -->
        <script src="../Recursos/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="../Recursos/js/datapicker/datepicker-active.js"></script>

    <!-- chosen JS
		============================================ -->
        <script src="../Recursos/js/chosen/chosen.jquery.js"></script>
    <script src="../Recursos/js/chosen/chosen-active.js"></script>
    
<script type="text/javascript" language="javascript">
$(document).ready(function(){
       

       $(document).on('submit', '#formulario', function(event){
           event.preventDefault();
           var datos = $('#formulario').serialize();
//alert(datos);

               $.ajax({
                   url:"Editar/Editar_Incapacidad.php",
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
                       else if(data==3)
                       {
                        $("#existe").fadeIn();
                       setTimeout(function(){
                       $("#existe").fadeOut();
                       },3000);
                       }
    
                   }
               });
       });
  
    });

    </script>