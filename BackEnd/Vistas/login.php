<!doctype html>
<html class="no-js" lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Login</title>
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
  <!--background="fondo.gif"-->
  <!--[if lt IE 8]>
		<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
	<![endif]-->
  <div class="error-pagewrap">
    <div class="error-page-int">
      <div class="text-center m-b-md custom-login">
        <h3>INICIAR SESIÓN</h3>
        <!-- <p>This is the best app ever!</p> -->
      </div>
      <div class="content-error">
        <div class="hpanel">
          <div class="panel-body">
            <form action="../Modelo/Checar_Login.php" method="post">
              <div class="form-group">
                <label class="control-label" for="username">Usuario</label>
                <input type="text" placeholder="Primera letra del nombre y apellido paterno
                                " title="Por favor ingrese su nombre de usuario" required="" value="" name="Usuario"
                  id="Usuario" class="form-control" onkeyup="this.value=this.value.toUpperCase()" maxlength="40">

              </div>
             

              <div class="form-group">
                <label class="control-label" for="password">Contraseña</label>
                <div class="input-group custom-go-button">
                  <input type="password" name="Contrasena" id="Contrasena" class="form-control" placeholder="******"
                    required="" value="" maxlength="40">
                  <span class="input-group-btn"><button class="btn btn-primary" type="button"
                      onclick="mostrarContrasena()"><span class="glyphicon glyphicon-eye-open"></span></button></span>
                </div>
                <br />
              </div>
              
              <?php
                                if(isset($_GET["creado"]) && $_GET["creado"] == 'true')
                                {
                                   echo "<div class='alert alert-success' role='alert'>
                                   Usuario Creado exitosamente.
                                   </div>";
                                }
                                if(isset($_GET["error"]) && $_GET["error"] == 'true')
                                {
                                  echo "<div class='alert alert-danger alert-mg-b' role='alert'>
                                  Usuario o Contraseña incorrectos.
                                   </div>";
                                }
                                ?>

              <button class="btn btn-success btn-block loginbtn" type="submit">Iniciar</button>
              <!-- <a class="btn btn-default btn-block" href="Registro.php">Registrarse</a> -->

            </form>
           
          </div>

        </div>
 
      </div>
      <div class="text-center login-footer">
       
      </div>
    </div>
  </div>


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