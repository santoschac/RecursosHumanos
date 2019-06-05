<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");

$message="";

$IdCurso= $_GET['IdCurso'];
$sql = 'SELECT * FROM cursos WHERE IdCurso=:IdCurso';
$sentencia = $pdo->prepare($sql);
$sentencia->execute([':IdCurso'=>$IdCurso]);
$cursos = $sentencia->fetch(PDO::FETCH_OBJ);

// $IdCurso= $_GET['IdCurso'];
// $sql = 'SELECT * FROM cursos WHERE IdCurso=:IdCurso';
// $statement = $pdo->prepare($sql);
// $statement->execute([':IdCurso'=> $IdCurso]);
// $cursos = $statement->fetch(PDO::FETCH_OBJ);


if(isset($_POST['NombreCurso']) && isset($_POST['DescripcionCurso']) && isset($_POST['Tipo']) && isset($_POST['Fecha'])){


    $Nombre = $_POST['NombreCurso'];
    $Descripcion = $_POST['DescripcionCurso'];
    $Tipo = $_POST['Tipo'];
    $Fecha = $_POST['Fecha'];

    // $sql = 'SELECT * FROM cursos WHERE Nombre = ?';
    // $sentencia = $pdo->prepare($sql);
    // $sentencia ->execute(array($Nombre));
    // $result = $sentencia->fetch();

    // if($result){
    //     $message="El curso ya existe";
    // }else{

        $sql = 'UPDATE cursos SET Nombre=:Nombre, DescripcionCurso=:DescripcionCurso, Tipo=:Tipo, Fecha=:Fecha WHERE IdCurso=:IdCurso';
        $sentencia=$pdo->prepare($sql);
        if($sentencia->execute([':Nombre'=>$Nombre, ':DescripcionCurso'=>$Descripcion, ':Tipo'=>$Tipo, ':Fecha'=>$Fecha, ':IdCurso'=>$IdCurso])){
            $message="Datos Actualizados con éxito";
        }
   // }


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
                                <li><a href="index.php">Inicio</a> <span class="bread-slash">/</span>
                                </li>
                                <li><span class="bread-blod">Actualizar Curso</span>
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
                        <li class="active"><a href="#description">Actualizar Curso</a></li>

                    </ul>

                    <?php if($message=="Datos Actualizados con éxito"):?>
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <?= $message;?>
                    </div>
                    <?php endif;?>

                    <?php if ($message=="El curso ya existe"):?>
                    <div class="alert alert-danger alert-mg-b">
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
                                        <form method="POST" class="add-department">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                    <div class="form-group">
                                                        <label>Nombre del Curso</label>
                                                        <input name="NombreCurso" id="NombreCurso" type="text"
                                                            value="<?= $cursos->Nombre;?>" class="form-control"
                                                            placeholder="Nombre del curso" required="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Tipo de capacitación</label>
                                                        <select name="Tipo" id="Tipo" class="form-control">
                                                            <option value="<?= $cursos->Tipo;?>" disabled="">Seleccionar
                                                            </option>
                                                            <option value="Interna">Interna</option>
                                                            <option value="Externa">Externa</option>

                                                        </select>
                                                    </div>

                                                </div>
                                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">


                                                    <div class="form-group">
                                                        <label>Fecha del Curso</label>
                                                        <div class="input-group date">
                                                            <span class="input-group-addon"><i
                                                                    class="fa fa-calendar"></i></span>
                                                            <input type="date" name="Fecha" id="Fecha"
                                                                class="form-control"
                                                                value="<?=date("Y-m-d", strtotime( $cursos->Fecha)); ?>">
                                                        </div>
                                                    </div>

                                                    <div class="form-group res-mg-t-15">
                                                        <label>Descripción</label>
                                                        <textarea name="DescripcionCurso" id="DescripcionCurso"
                                                            placeholder="Describa el curso" required=""
                                                            maxlength="200"><?=$cursos->DescripcionCurso;?></textarea>
                                                    </div>

                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <div class="payment-adress">
                                                        <button type="submit"
                                                            class="btn btn-primary waves-effect waves-light">Guardar</button>
                                                        <a href="Cursos.php"
                                                            class="btn btn-success waves-effect waves-light">Regresar</a>
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