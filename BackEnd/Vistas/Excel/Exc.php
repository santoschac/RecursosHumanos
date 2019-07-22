<?php
    session_start();
    require_once "../../Modelo/Conexion.php";
    require_once "../../ClasesExcel/PHPExcel/IOFactory.php";
    $usuario = $_SESSION['Usuario'];

    
    if (isset($_POST['operacion'])) {
        if ($_POST['operacion'] == "Agregar") {
            // print_r ($_FILES);
            $archivo=$usuario."_".$_FILES['excel']['name'];
            $destino="../Excel/".$archivo;

            if (copy($_FILES['excel']['tmp_name'],$destino)) {

                if (file_exists("../Excel/".$archivo)) {
                    
                    $objPHPExcel = PHPExcel_IOFactory::load("../Excel/".$archivo);
        
                    $objPHPExcel->setActiveSheetIndex(0);
            
                    $numfilas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow(); ?>
                    
                
                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-key-events="true" data-cookie="true"
                        data-cookie-id-table="saveId" data-click-to-select="true" data-toolbar="#toolbar">
                        <tr>
                            <th>codigo</th>
                            <th>Nombre</th>
                            <th>Horas</th>
                            <th>Fecha</th>
                            <th>HoraInicio</th>
                            <th>HoraFinal</th>
                            
                        </tr>
                    <?php
            
                    for ($i=2; $i <= $numfilas ; $i++) { 

                        $cod = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
                        $nom = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
                        $horas = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
                        $fecha = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                        $horainicio = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                        $horafinal = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue();
                        
                        ?>
                        <tr>
                            <td><?php echo $cod; ?></td>
                            <td><?php echo $nom; ?></td>
                            <td><?php echo $horas; ?></td>
                            <td><?php echo $fecha ;?></td>
                            <td><?php echo $horainicio; ?></td>
                            <td><?php echo $horafinal; ?></td>
                           
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
            $archivo=$usuario."_".$_FILES['excel']['name'];

            if (file_exists("../Excel/".$archivo)) {

                $objPHPExcel = PHPExcel_IOFactory::load("../Excel/".$archivo);

                $objPHPExcel->setActiveSheetIndex(0);
    
                $numfilas = $objPHPExcel->setActiveSheetIndex(0)->getHighestRow();
    
                for ($i=1; $i <= $numfilas ; $i++) { 

                    $cod = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
                    $nom = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
                    $horas = $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
                    $fecha = $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                    $horainicio = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                    $horafinal = $objPHPExcel->getActiveSheet()->getCell('F'.$i)->getCalculatedValue(); 
                   

                    $sql_agregar = "INSERT INTO horasextras (Codigo, Nombre, HorasTrabajadas, Fecha, HoraInicio, HoraFinal) 
                    VALUE ('$cod','$nom','$horas','$fecha','$horainicio','$horafinal')";
                    $sentencia_agregar = $pdo->prepare($sql_agregar);
                    $sentencia_agregar->execute(array($sql_agregar));

                }
          

                if ($sentencia_agregar){ ?>
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
                } else { 
                ?>
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