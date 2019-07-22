<?php
include ("../Master/Header.php");
include ("../Modelo/Conexion.php");

$message="";
$IdUsuario = $_SESSION['IdUsuario'];


$sql = 'SELECT * FROM personal WHERE IdUsuario = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($IdUsuario));
$resultado = $sentencia->fetch();



    if (isset($_POST['Contrasena']) ) {

         $Contrasena = $_POST['Contrasena'];

         $Contrasena = password_hash($Contrasena, PASSWORD_DEFAULT);

         $sql = 'UPDATE usuario SET Contrasena=:Contrasena WHERE IdUsuario=:IdUsuario';
         $statement = $pdo->prepare($sql);
         if ($statement->execute([':Contrasena'=>$Contrasena, ':IdUsuario'=>$IdUsuario])) {
            $message='Contraseña actualizada con éxito';
         }
    }

?>


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
                                <li><span class="bread-blod">Mi perfil</span>
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
                        <li class="active"><a href="#description">Mis Perfil</a></li>
                        <li><a href="#reviews"> Cambiar Contraseña</a></li>

                    </ul>
                    <?php
                             if(!empty($message)):?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <?= $message;?>
                                </div>
                                <?php endif;?>
                    <div id="myTabContent" class="tab-content custom-product-edit">
                        <div class="product-tab-list tab-pane fade active in" id="description">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="review-content-section">
                                        <!-- <form id="add-department" action="#" class="add-department"> -->
                                        
                                        <div class="row">
                                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                <div class="form-group">
                                                    <label>Nombre</label>
                                                    <input name="Nombre" type="text" class="form-control"
                                                        placeholder="Nombre" value="<?php echo $resultado['Nombre'] ?>"
                                                        readonly="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Apellido Paterno</label>
                                                    <input name="ApellidoPaterno" type="text" class="form-control"
                                                        placeholder="Apellido Paterno"
                                                        value="<?php echo $resultado['ApellidoPaterno'] ?>" readonly="">
                                                </div>
                                                <label>Apellido Materno</label>
                                                <div class="form-group">
                                                    <input name="ApellidoMaterno" type="text" class="form-control"
                                                        placeholder="Apellido Materno"
                                                        value="<?php echo $resultado['ApellidoMaterno'] ?>" readonly="">
                                                </div>
                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Usuario</label>
                                                        <input name="Usuario" type="text" class="form-control"
                                                            placeholder="Usuario"
                                                            value="<?php echo $_SESSION['Usuario'] ?>" readonly="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Contraseña</label>
                                                        <input value="<?php echo $_SESSION['Contrasena']?>" type="text"
                                                            class="form-control" placeholder="Contraseña" readonly="">
                                                    </div>
                                                            

                                            </div>
                                        </div>
                                        
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="payment-adress">
                                                    <a href="index.php"
                                                        class="btn btn-success waves-effect waves-light">Regresar</a>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="product-tab-list tab-pane fade" id="reviews">
                            <form  method="post">
                                <div class="row">
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="review-content-section">
                                            <div class="row">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="devit-card-custom">
                                                        <div class="form-group">
                                                            <label>Usuario</label>
                                                            <input type="text" class="form-control"
                                                                placeholder="Usuario"
                                                                value="<?php echo $_SESSION['Usuario'] ?>" readonly="">
                                                        </div>
                                                        <!-- <div class="form-group">
                                                                <label>Contraseña</label>
                                                                <input type="Contrasena" class="form-control" placeholder="Contraseña" value="<?php echo $_SESSION['Contrasena'] ?>" readonly="">
                                                            </div> -->
                                                        <div class="form-group">
                                                            <label>Nueva contraseña</label>
                                                            <input type="password" id="Contrasena" name="Contrasena"
                                                                class="form-control" value=""
                                                                placeholder="Nueva Contraseña" required="">
                                                        </div>
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">Aceptar</button>
                                                        <a href="index.php"
                                                            class="btn btn-success waves-effect waves-light">Regresar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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


<?php
include ("../Master/Footer.php");
?>