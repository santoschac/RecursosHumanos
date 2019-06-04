<?php
include("../Master/Header.php");
include ("../Modelo/Conexion.php");

$message = "";

if (isset($_POST['NombrePuesto']) ) {

  $NombrePuesto = $_POST['NombrePuesto'];

  //Para verificar si el usuario existe
$sql = 'SELECT * FROM puestos WHERE NombrePuesto = ?';
$sentencia = $pdo->prepare($sql);
$sentencia->execute(array($NombrePuesto));
$resultado = $sentencia->fetch();


if ($resultado) {
  $message='El nombre ya existe';
    
}else{

    $sql = 'INSERT INTO puestos (NombrePuesto) VALUES (:NombrePuesto)';

    $statement = $pdo->prepare($sql);
    if ($statement->execute([':NombrePuesto'=>$NombrePuesto])) {
       $message='Datos insertados con éxito';
    }
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
                                        <!-- <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Search..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div> -->
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">inicio</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Agregar Puesto</span>
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
        <!-- Basic Form Start -->
        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="sparkline8-list mt-b-30">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Agregar Puesto</h1>
                                </div>

                                <?php
                             if($message=="Datos insertados con éxito"):?>
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    <?= $message;?>
                                </div>
                                <?php endif;?>
                                
                                <?php
                                if(($message=="El nombre ya existe")):?>
                                <div class="alert alert-danger alert-mg-b">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                    <?= $message;?>
                            </div>
                                <?php endif;?>

                            </div>
                            <div class="sparkline8-graph">
                                <div class="basic-login-form-ad">
                                   
                                    <div class="row" >
                                        <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                
                                                <form method="post">
                                                
                                                    <div class="form-group-inner">
                                                        <br/>
                                                        <label>Nombre del Puesto</label>
                                                        <input type="text" id="NombrePuesto" name="NombrePuesto" class="form-control" placeholder="Escriba el nombre del puesto" required="" maxlength="50"/>
                                                        <br/>
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Guardar</button>
                                                            <a href="Puestos.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
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

        <!-- Basic Form End-->
        
 <?php
        include ("../Master/Footer.php");
        ?>