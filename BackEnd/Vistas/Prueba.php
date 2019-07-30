<?php
 include ("../Master/Header.php");

 if(isset($_POST['hora'])){

    echo $_POST['hora'];
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
                            <input type="time" name="hora" id="hora" >
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