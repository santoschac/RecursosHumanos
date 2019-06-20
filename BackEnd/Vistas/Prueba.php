<?php
include("../Master/Header.php");
include("../Modelo/Conexion.php");

$sql= $pdo->prepare("SELECT * FROM puestos");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);

?>


  
    <!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">
    



            <!-- Mobile Menu end -->
            <div class="breadcome-area">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="breadcome-list">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="breadcome-heading">
                                            <form role="search" class="sr-input-func">
                                                <input type="text" placeholder="Buscar..." class="search-int form-control">
                                                <a href="#"><i class="fa fa-search"></i></a>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="#">Home</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Dashboard V.1</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>


                                <b>Se dio de baja</b>
<input type="checkbox" name="check" id="check" value="1" onchange="javascript:showContent()" />
                          

                          <div id="content" style="display: none;">
   contenido del div escondido<br/>
   contenido del div escondido<br/>
   contenido del div escondido<br/>
 </div>
                          
                          
                          
                            </div>
                        </div>
                    </div>

                      
                    
       
        
        
        
        <?php
        include ("../Master/Footer.php");
        ?>


<script type="text/javascript">
    function showContent() {
        element = document.getElementById("content");
        check = document.getElementById("check");
        if (check.checked) {
            element.style.display='block';
        }
        else {
            element.style.display='none';
        }
    }
</script>
  
   
    <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
 

    


    
   
    
    
  
   