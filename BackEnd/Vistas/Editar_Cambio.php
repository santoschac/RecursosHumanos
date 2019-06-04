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
                                            <li><span class="bread-blod">Actualizar Cambio</span>
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
        <!-- Single pro tab review Start-->
        <div class="single-pro-review-area mt-t-30 mg-b-15">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="product-payment-inner-st">
                            <ul id="myTabedu1" class="tab-review-design">
                                <li class="active"><a href="#description">Actualizar Cambio</a></li>
                                
                            </ul>
                            <div id="myTabContent" class="tab-content custom-product-edit">
                                <div class="product-tab-list tab-pane fade active in" id="description">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                            <div class="review-content-section">
                                                <form id="add-department" action="#" class="add-department">
                                                    <div class="row">
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                                <label>Fecha cambio</label>
                                                                    <input name="finish" id="finish" type="text" class="form-control" placeholder="Fecha cambio">
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Puesto</label>
                                                                    <select name="country" class="form-control">
																			<option value="none" selected="" disabled="">Seleccionar</option>
																			<option value="0">Administrativo Cedis</option>
                                                                            <option value="1">Almacenista</option>
                                                                            <option value="2">Asesoría Técnica</option>
                                                                            <option value="3">Auditoría</option>
                                                                            <option value="4">Auxiliar de Herrajes</option>
                                                                            <option value="5">Auxiliar de Ventas</option>
																		
																		</select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Personal</label>
                                                                <input name="Personal" type="text" class="form-control" placeholder="Personal">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            
                                                            <div class="form-group">
                                                                <label>Empresa</label>
                                                                    <select name="country" class="form-control">
																			<option value="none" selected="" disabled="">Seleccionar</option>
																			<option value="0">Almacen</option>
                                                                            <option value="1">Alpina</option>
                                                                            <option value="2">Alumayab</option>
                                                                            <option value="3">Alumik</option>  
																		</select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Sucursal</label>
                                                                    <select name="country" class="form-control">
																			<option value="none" selected="" disabled="">Seleccionar</option>
																			<option value="0">1</option>
                                                                            <option value="1">2</option>
                                                                            <option value="2">3</option>
                                                                            <option value="3">4</option>  
																		</select>
                                                                </div>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Actualizar</button>
                                                                    <a href="Cambios.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
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