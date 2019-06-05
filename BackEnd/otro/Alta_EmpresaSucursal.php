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
                                            <li><span class="bread-blod">Agregar Empresa-Sucursal</span>
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
                                <li class="active"><a href="#description">Agregar Empresa/Sucursal</a></li>
                                
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
                                                                <label>Empresa</label>
                                                                <input name="Empresa" type="text" class="form-control" placeholder="Empresa" required="" maxlength="40">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Clave empresa</label>
                                                                <input name="ClaveEmpresa" type="text" class="form-control" placeholder="ClaveEmpresa" required="" maxlength="10">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Sucursal</label>
                                                                    <select name="city" class="form-control">
																			<option value="none" selected="" disabled="">Seleccionar</option>
																			<option value="0">1</option>
																			<option value="1">2</option>
																			<option value="2">3</option>
																			<option value="3">4</option>
																			<option value="4">5</option>
																		</select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Nombre</label>
                                                                <input name="Nombre" type="text" class="form-control" placeholder="Nombre" required="" maxlength="60">
                                                            </div>
                                                            
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                        <div class="form-group">
                                                                <label>Estado</label>
                                                                    <select name="country" class="form-control">
																			<option value="none" selected="" disabled="">Seleccionar Estado</option>
																			<option value="0">Yucatán</option>
																			<option value="1">Campeche</option>
																		
																		</select>
                                                                </div>
                                                            
                                                            <div class="form-group">
                                                                <label>Población</label>
                                                                    <select name="state" class="form-control">
																			<option value="none" selected="" disabled="">Seleccionar Población</option>
																			<option value="0">Gujarat</option>
																			<option value="1">Maharastra</option>
																			<option value="2">Rajastan</option>
																			<option value="3">Maharastra</option>
																			<option value="4">Rajastan</option>
																			<option value="5">Gujarat</option>
																		</select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Región</label>
                                                                <input name="Region" type="text" class="form-control" placeholder="Región" required="" maxlength="60">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                            <button type="submit" class="btn btn-primary waves-effect waves-light">Guardar</button>
                                                                    <a href="EmpresaSucursal.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
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