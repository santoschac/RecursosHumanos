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

     <!-- calendar CSS
		============================================ -->
        <link rel="stylesheet" href="css/calendar/fullcalendar.min.css">
    <link rel="stylesheet" href="css/calendar/fullcalendar.print.min.css">
    <!-- datapicker CSS
		============================================ -->
        <link rel="stylesheet" href="css/datapicker/datepicker3.css">


 <!-- Static Table Start -->
 <div class="data-table-area mg-b-15">
     <br/>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="sparkline13-list">
                            <div class="sparkline13-hd">
                                <div class="main-sparkline13-hd">
                                    <h1>Projects <span class="table-project-n">Data</span> Table</h1>
                                </div>
                            </div>


                                    <div class="form-group data-custon-pick data-custom-mg" id="data_5">
                                        <label>Range select</label>
                                        <div class="input-daterange input-group" id="datepicker">
                                            <input type="text" class="form-control" name="start" value="05/14/2014" />
                                            <span class="input-group-addon">to</span>
                                            <input type="text" class="form-control" name="end" value="05/22/2014" />
                                        </div>
                                    </div>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Static Table End -->

                      
                    
       
        
        
        
        <?php
        include ("../Master/Footer.php");
        ?>


<!-- datapicker JS
		============================================ -->
        <script src="js/datapicker/bootstrap-datepicker.js"></script>
    <script src="js/datapicker/datepicker-active.js"></script>
  
   
    <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
 

    


    
   
    
    
  
   