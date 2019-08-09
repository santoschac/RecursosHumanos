<?php
    session_start();
    require_once "../../Modelo/Conexion.php";
    require_once "../../ClasesExcel/PHPExcel/IOFactory.php";
   // $usuario = $_SESSION['Usuario'];

    
    if (isset($_POST['operacion'])) {
        if ($_POST['operacion'] == "Agregar") {
            // print_r ($_FILES);
            $archivo=$_FILES['excel']['name'];
            $destino="../Excel/".$archivo;

            if (copy($_FILES['excel']['tmp_name'],$destino)) {

                if (file_exists("../Excel/".$archivo)) {
                    
                    $objPHPExcel = PHPExcel_IOFactory::load("../Excel/".$archivo);
        
                    $objPHPExcel->setActiveSheetIndex(0);
            
                    $numfilas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); ?>
                    
                
                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-key-events="true" data-cookie="true"
                        data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                        <tr>
                           
                            <th>IdPersonal</th>
                            <th>Nombre</th>
                            <th>Porcentaje(%)</th>
                            <th>Monto Cobranza($)</th>
                            <th>Monto Comisión($)</th>
                            <th>Fecha</th>
                            
                            
                        </tr>
                    <?php
            
                        
                     $ArregloPorcentaje= array();
                     $ArregloComision = array();
                     $ArregloNombre = array();

                    for ($i=2; $i <= $numfilas ; $i++) { 

                        
                        $id = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();$id=strtoupper($id);                       
                        $montocobra = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();$montocobra=strtoupper($montocobra);                        
                        $fecha = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();$fecha=strtoupper($fecha);
                       

                        $sql1 = 'SELECT IdPersonal, Nombre, ApellidoPaterno, ApellidoMaterno, porcentajecomision from personal where IdPersonal = ?';
                        $statement= $pdo->prepare($sql1);
                        $statement ->execute(array($id));
                        $resultado = $statement->fetch();

                        $ArregloPorcentaje=$resultado['porcentajecomision'];

                        $ArregloComision= ($ArregloPorcentaje * $montocobra)/100;

                        $ArregloNombre = $resultado['Nombre'] ." ". $resultado['ApellidoPaterno'] ." ". $resultado['ApellidoMaterno'];
                        
                        ?>
                        <tr>

                        
                            
                            <td><?php echo $id; ?></td>
                            <td><?php echo $ArregloNombre; ?></td>
                            <td><?php echo $ArregloPorcentaje ." %"?></td>
                            <td><?php echo "$ ". $montocobra ;?></td>
                            <td><?php echo "$ ". $ArregloComision; ?></td>
                            <td><?php echo $fecha; ?></td>
                           
                           
                        </tr>
                    <?php
                    } ?>
                    </table>  

                    <?php
                }
            } else {
                echo "Error Al Cargar el Archivo";
            } 

            ?>

            <!-- data table JS
            ============================================ -->
            <script src="../Recursos/js/data-table/bootstrap-table.js"></script>
           
        <?php
        }

        if ($_POST['operacion'] == "Guardar") {
            // print_r ($_FILES);
            $archivo=$_FILES['excel']['name'];

            if (file_exists("../Excel/".$archivo)) {

                $objPHPExcel = PHPExcel_IOFactory::load("../Excel/".$archivo);

                $objPHPExcel->setActiveSheetIndex(0);
    
                $numfilas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    

                $ArregloPorcentaje= array();
                $ArregloComision = array();

                for ($i=2; $i <= $numfilas ; $i++) { 

                    
                    $id = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();$id=strtoupper($id);                       
                    $montocobra = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();$montocobra=strtoupper($montocobra);                        
                    $fecha = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();$fecha=strtoupper($fecha);
                   

                    $sql1 = 'SELECT IdPersonal, porcentajecomision from personal where IdPersonal = ?';
                    $statement= $pdo->prepare($sql1);
                    $statement ->execute(array($id));
                    $resultado = $statement->fetch();

                    $ArregloPorcentaje=$resultado['porcentajecomision'];

                    $ArregloComision= ((binary)$ArregloPorcentaje * (binary)$montocobra)/100;
                   

                    $sql_agregar = "INSERT INTO comision (Porcentaje, MontoCobranza, MontoComision, Fecha, IdPersonal) 
                    VALUE ('$ArregloPorcentaje','$montocobra','$ArregloComision','$fecha','$id')";
                    $sentencia_agregar = $pdo->prepare($sql_agregar);
                    $sentencia_agregar->execute(array($sql_agregar));

                }
          

                if ($sentencia_agregar){ unlink("../Excel/".$archivo); ?>
                
                    <script>
                        Swal.fire({
                            position: 'top-end',
                            type: 'success',
                            title: 'Datos Guardados',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        setTimeout('document.location.reload()',1000);                        
                    </script>
                    
                <?php   
                } else{ ?>
                
                    <script>
                        Swal.fire({
                            title: 'Error!',
                            text: 'Error al guardar los datos',
                            type: 'error',
                            confirmButtonText: 'Cool'
                        })
                        setTimeout('document.location.reload()',1000);
                    </script>
                <?php                 
                }
            } else { ?>
                <script>
                    Swal.fire({
                        type: 'error',
                        title: 'Oops...',
                        text: 'Error en el proceso!',
                    })
                    setTimeout('document.location.reload()',1000);
                </script>
            <?php
            }
        }
    }
?>