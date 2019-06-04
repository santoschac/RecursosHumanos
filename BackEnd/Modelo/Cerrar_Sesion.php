/* Destruir sesión de usuario actual */

<?php
session_start();
session_unset($_SESSION['Usuario']);
session_destroy();

header('location: ../Vistas/login.php');
?>