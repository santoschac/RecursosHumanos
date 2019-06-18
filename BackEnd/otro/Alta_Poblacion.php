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
                                            <li><a href="index.php">inicio</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Agregar Población</span>
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
                                    <h1>Agregar Población</h1>
                                </div>
                            </div>
                            <div class="sparkline8-graph">
                                <div class="basic-login-form-ad">
                                   
                                    <div class="row">
                                        <div class="col-lg-10 col-md-6 col-sm-6 col-xs-12">
                                            <div class="basic-login-inner">
                                                
                                                <form action="#">
                                                
                                                    <div class="form-group-inner">
                                                        <label>Población</label>
                                                        <input type="text" class="form-control" placeholder="Población" required="" maxlength="50"/>
                                                    </div>
                                                    <div class="login-btn-inner">
                                                        <div class="inline-remember-me">
                                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Guardar</button>
                                                            <a href="Poblacion.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
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


         <!-- Single pro tab review Start-->
         <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Agregar Curso</a></li>
                                
                            </ul>
                              <!--Alertas-->
                              <div class="alert alert-success" id="exito"  style="display:none">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    Datos insertados con éxito
                                </div>

                                <div class="alert alert-danger alert-mg-b" id="error"  style="display:none">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
                                    El curso ya existe
                            </div>
                             
                             <!--Fin alertas-->



                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form id="formulario" method="POST" class="add-department">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                                <label>País</label>
                                                                País<select name="gender" class="form-control">
																		<option value="none" selected="" disabled="">Seleccionar País</option>
																		<option value="0">México</option>
																		<option value="1">Argentina</option>
																	</select>
                                                                </div>
                                                           </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group-inner">
                                                        <label>Población</label>
                                                        <input type="text" class="form-control" placeholder="Población" required="" maxlength="50"/>
                                                    </div>
                                                                
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                                                    <a href="Cursos.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
                                                            </div>
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
        
        <?php
        include ("../Master/Footer.php");
        ?>