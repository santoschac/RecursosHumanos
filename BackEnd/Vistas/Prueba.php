<?php
 include ("../Master/Header.php");

 if(isset($_POST['Fecha'])){

    $Anio = date("Y", strtotime($_POST['Fecha'])) ;
    $Mes = date("m", strtotime($_POST['Fecha'])) ;

    echo $Anio;
    echo $Mes;
 }else{

 }
?>


<form method="post" action="#">
<div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div class="sparkline16-list responsive-mg-b-30">
                            <div class="sparkline16-hd">
                                <div class="main-sparkline16-hd">
                                    <h1>Data picker</h1>
                                </div>
                            </div>
                            <div class="sparkline16-graph">
                                <div class="date-picker-inner">
                                   
                                    
                                    
                                    <div class="form-group data-custon-pick" id="data_4">
                                        <label>Month select</label>
                                        <div class="input-group date">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                            <input type="text" name="Fecha" id="Fecha" class="form-control" value="<?php echo date("d/m/Y")?>">
                                        </div>
                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
</div>
<input type="submit">
</form>



<?php
 include ("../Master/Footer.php");
?>

<!-- datapicker JS
		============================================ -->
        <script src="../Recursos/js/datapicker/bootstrap-datepicker.js"></script>
    <script src="../Recursos/js/datapicker/datepicker-active.js"></script>