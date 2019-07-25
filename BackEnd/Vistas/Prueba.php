<!DOCTYPE html>
<html lang="en">
<?php
 include ("../Master/Header.php");
?>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body><br/><br/><br/><br/>

    <?php 
    
    if(isset($_SESSION['IdSucursal'])){
        echo "llego el valor";
    }else{
        echo "no llego el valor";
    }
    
    ;?>

    
<div class="row">
    
    
    <form method="post" action="#" id="formulario">
    &nbsp;&nbsp;&nbsp;<input type="text" name="prueba" id="prueba" value="">

    <button class="btn btn-primary" type="submit">Aceptar</button>
    </form>

</div>
    <br/><br/><br/><br/>
</body>
<?php
 include ("../Master/Footer.php");
?>
</html>

<script type="text/javascript" language="javascript">

$(document).ready(function(){
       
       $(document).on('submit', '#formulario', function(event){
           event.preventDefault();
           var datos = $('#formulario').serialize();
alert(datos);

               $.ajax({
                   url:"Prueba_alta.php",
                   method:'POST',
                   data:new FormData(this),
                   contentType:false,
                   processData:false,
                   success:function(data)
                   {
                     alert(data);
                     //$("#formulario").html(data);
                     
                   }
               });
       });
  
    });
    </script>