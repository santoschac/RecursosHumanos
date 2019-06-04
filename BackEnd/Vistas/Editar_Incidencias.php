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
                                       
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <ul class="breadcome-menu">
                                            <li><a href="index.php">Inicio</a> <span class="bread-slash">/</span>
                                            </li>
                                            <li><span class="bread-blod">Actualizar Incidencia</span>
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
                                <li class="#"><a href="#description">Actualizar Incidencias</a></li>
                                
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
                                                            <label>Fecha incidencia</label>
                                                                    <input name="finish" id="finish" type="text" class="form-control" placeholder="Fecha incidencia">
                                                                </div>
                                                                <div class="form-group res-mg-t-15">
                                                                    <textarea name="Descripcion" placeholder="Descripcion" maxlength="300"></textarea>
                                                                </div>
                                                            <div class="form-group">
                                                            <label>Personal</label>
                                                                <input name="Personal" type="text" class="form-control" placeholder="Personal">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                                            <div class="form-group">
                                                            <label>Reporta</label>
                                                                <input name="Reporta" type="text" class="form-control" placeholder="Reporta">
                                                            </div>
                                                            <div class="form-group">
                                                            <label>Autoriza</label>
                                                                    <select name="city" class="form-control">
																			<option value="none" selected="" disabled="">Seleccionar</option>
																			<option value="0">Surat</option>
																			<option value="1">Baroda</option>
																			<option value="2">Navsari</option>
																			<option value="3">Baroda</option>
																			<option value="4">Surat</option>
																		</select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label>Accidente(choferes)</label>
                                                                    <select name="city" class="form-control">
																			<option value="none" selected="" disabled="">Seleccionar</option>
																			<option value="0">Responsable</option>
																			<option value="1">Afectado</option>
																			
																		</select>
                                                                </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="payment-adress">
                                                            <button class="btn btn-primary waves-effect waves-light" type="submit">Actualizar</button>
                                                            <a href="Incidencias.php"  class="btn btn-success waves-effect waves-light">Regresar</a>
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