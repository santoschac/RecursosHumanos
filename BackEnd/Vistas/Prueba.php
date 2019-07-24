<?php include "../Master/Header.php"; ?>

<!-- normalize CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">


    <!-- colorpicker CSS
		============================================ -->
        <link rel="stylesheet" href="../Recursos/css/colorpicker/colorpicker.css">

 
        
        <div class="form-group data-custon-pick">
                                                            <label><strong>Fecha Inicio</strong></label>
                                                            <div class="input-group date">
                                                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                                                <input type="date" name="FechaInicio" id="FechaInicio" class="form-control" value="<?php echo date("Y-m-d"); ?>">
                                                            </div>
                                                        </div>
             <?php echo "hola mundo";
             echo $fechainicio = "24-07-2019";
             echo $fechavencida = "22-07-2019";

             if($fechavencida<$fechainicio){
                 echo "la fecha ya vencio";
             }else{
                 echo "la fecha no ha vencido";
             }
             
             ?>
                                                        
<?php include "../Master/Footer.php"; ?>

 <!-- data table JS
		============================================ -->
        <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

        <script src="../Recursos/js/data-table/tableExport.js"></script>
        <script src="../Recursos/js/data-table/bootstrap-table-export.js"></script>


        <!-- colorpicker JS
		============================================ -->
    <script src="../Recursos/js/colorpicker/jquery.spectrum.min.js"></script>
    <script src="../Recursos/js/colorpicker/color-picker-active.js"></script>