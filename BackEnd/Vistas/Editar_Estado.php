<?php
include("../Master/Header.php");
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
                                            <li><span class="bread-blod">Actualizar Estado</span>
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
        <!-- Basic Form Start -->
        <div class="basic-form-area mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <div class="sparkline8-list mt-b-30">
                            <div class="sparkline8-hd">
                                <div class="main-sparkline8-hd">
                                    <h1>Actualizar Estado</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="basic-login-form-ad">
                                   
                                    <div class="row">
                                        <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                
                                                <form action="#">
                                                <div class="form-group">
                                                                <label>País</label>
                                                                    <select name="gender" class="form-control">
																		<option value="none" selected="" disabled="">Seleccionar País</option>
																		<option value="0">México</option>
																		<option value="1">Argentina</option>
																	</select>
                                                                </div>
                                                    <div class="form-group-inner">
                                                        <label>Estado</label>
                                                        <input type="text" class="form-control" placeholder="Estado" required="" maxlength="50"/>
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Actualizar</button>
                                                            <a href="Estado.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
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
        <!-- Basic Form End-->
        
        <?php
        include ("../Master/Footer.php");
        ?>