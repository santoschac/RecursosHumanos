<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Registro</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- favicon
		============================================ -->
    <link rel="shortcut icon" type="image/x-icon" href="../Recursos/img/favicon1.png">
    <!-- Google Fonts
		============================================ -->
    <link href="https://fonts.googleapis.com/css?family=Play:400,700" rel="stylesheet">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/bootstrap.min.css">
    <!-- Bootstrap CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/font-awesome.min.css">
    <!-- owl.carousel CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/owl.carousel.css">
    <link rel="stylesheet" href="../Recursos/css/owl.theme.css">
    <link rel="stylesheet" href="../Recursos/css/owl.transitions.css">
    <!-- animate CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/animate.css">
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/normalize.css">
    <!-- main CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/main.css">
    <!-- morrisjs CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/morrisjs/morris.css">
    <!-- mCustomScrollbar CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/scrollbar/jquery.mCustomScrollbar.min.css">
    <!-- metisMenu CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/metisMenu/metisMenu.min.css">
    <link rel="stylesheet" href="../Recursos/css/metisMenu/metisMenu-vertical.css">
    <!-- calendar CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="../Recursos/css/calendar/fullcalendar.print.min.css">
    <!-- forms CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/form/all-type-forms.css">
    <!-- style CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/style.css">
    <!-- responsive CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/responsive.css">
    <!-- modernizr JS
		============================================ -->
    <script src="../Recursos/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body style="background-image: url(../Recursos/img/fondo/fondo1.jpg);">
<!-- style="background-color:#0071BB;" -->
    <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
	<div class="error-pagewrap">
		<div class="error-page-int">
			<div class="text-center m-b-md custom-login">
				<h3>REGISTRO DE USUARIO</h3>
				<!-- <p>This is the best app ever!</p> -->
			</div>
			<div class="content-error">
				<div class="hpanel">
                    <div class="panel-body">
                        <form action="../Modelo/Registrar_Usuario.php" method="post">
                            <div class="form-group">
                                <label class="control-label" for="usuario">Usuario</label>
                                <input type="text" id="Usuario" name="Usuario" placeholder="Primera letra del nombre y apellido paterno" title="Por favor ingrese su nombre de usuario" required="" value="" class="form-control" onkeyup="this.value=this.value.toUpperCase()" maxlength="30">
                                
                            </div>
                            <div class="form-group">
                              <label class="control-label" for="password">Contraseña</label>
                              <div class="input-group custom-go-button">
                                <input type="password" name="Contrasena" id="Contrasena" class="form-control"
                                  placeholder="******" required="" value="" maxlength="30">
                                <span class="input-group-btn"><button class="btn btn-primary" type="button"
                                    onclick="mostrarContrasena()"><span
                                      class="glyphicon glyphicon-eye-open"></span></button></span>
                              </div>
                              
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="contrasena">Nombre</label>
                                <input type="text"  title="Por favor ingrese su Nombre" placeholder="Nombre" required="" value="" name="Nombre" id="Nombre" class="form-control" maxlength="30">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="ApellellidoPaterno">Apellellido Paterno</label>
                                <input type="text" id="ApellidoPaterno" name="ApellidoPaterno" title="Por favor ingrese su apellido paterno" placeholder="Apellellido Paterno" required="" value="" class="form-control" maxlength="35">
                                
                            </div>
                            <div class="form-group">
                                <label class="control-label" for="ApellellidoMaterno">Apellellido Materno</label>
                                <input type="text" id="ApellidoMaterno" name="ApellidoMaterno" title="Por favor ingrese su apellido materno" placeholder="Apellellido Materno" required="" value=""  class="form-control" maxlength="35">
                                
                            </div>
                            <!-- <div class="checkbox login-checkbox">
                               <p class="help-block small">(if this is a private computer)</p> 
                            </div> -->
                            <?php
                            if(isset($_GET["existe"]) && $_GET["existe"] == 'true')
                            {
                               
                               echo "<div class='alert alert-danger alert-mg-b' role='alert'>
                              El nombre de usuario ya existe.
                               </div>";
                            }
                            ?>
										
                               
                            
                            <button class="btn btn-success btn-block loginbtn" type="submit">Registrarse</button>
                            <a class="btn btn-default btn-block" href="login.php">ya tengo cuenta</a>                           
                            
                        </form>
                    </div>
                </div>
			</div>
			<div class="text-center login-footer">
				<!-- <p>Copyright © 2018. All rights reserved. Template by <a href="https://colorlib.com/wp/templates/">Colorlib</a></p> -->
			</div>
		</div>   
    </div>

    <script>
        function mostrarContrasena(){
            var tipo = document.getElementById("Contrasena");
            if(tipo.type == "password"){
                tipo.type = "text";
            }else{
                tipo.type = "password";
            }
        }
      </script>
    <!-- jquery
		============================================ -->
    <script src="../Recursos/js/vendor/jquery-1.12.4.min.js"></script>
    <!-- bootstrap JS
		============================================ -->
    <script src="../Recursos/js/bootstrap.min.js"></script>
    <!-- wow JS
		============================================ -->
    <script src="../Recursos/js/wow.min.js"></script>
    <!-- price-slider JS
		============================================ -->
    <script src="../Recursos/js/jquery-price-slider.js"></script>
    <!-- meanmenu JS
		============================================ -->
    <script src="../Recursos/js/jquery.meanmenu.js"></script>
    <!-- owl.carousel JS
		============================================ -->
    <script src="../Recursos/js/owl.carousel.min.js"></script>
    <!-- sticky JS
		============================================ -->
    <script src="../Recursos/js/jquery.sticky.js"></script>
    <!-- scrollUp JS
		============================================ -->
    <script src="../Recursos/js/jquery.scrollUp.min.js"></script>
    <!-- mCustomScrollbar JS
		============================================ -->
    <script src="../Recursos/js/scrollbar/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="../Recursos/js/scrollbar/mCustomScrollbar-active.js"></script>
    <!-- metisMenu JS
		============================================ -->
    <script src="../Recursos/js/metisMenu/metisMenu.min.js"></script>
    <script src="../Recursos/js/metisMenu/metisMenu-active.js"></script>
    <!-- tab JS
		============================================ -->
    <script src="../Recursos/js/tab.js"></script>
    <!-- icheck JS
		============================================ -->
    <script src="../Recursos/js/icheck/icheck.min.js"></script>
    <script src="../Recursos/js/icheck/icheck-active.js"></script>
    <!-- plugins JS
		============================================ -->
    <script src="../Recursos/js/plugins.js"></script>
    <!-- main JS
		============================================ -->
    <script src="../Recursos/js/main.js"></script>
    <!-- tawk chat JS
		============================================ -->
    <!-- <script src="../Recursos/js/tawk-chat.js"></script> -->
</body>

</html>