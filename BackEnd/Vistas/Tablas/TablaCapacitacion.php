
<?php

include("../../Modelo/Conexion.php");

session_start();

if(isset($_POST['IdSucursal'])){
    $_SESSION['IdSucursal'] = $_POST['IdSucursal'];
}

if(isset($_SESSION['IdSucursal'])){
    
        $IdSucursal= $_SESSION['IdSucursal'];
        $sql= $pdo->prepare("SELECT c.IdCapacitacion, c.Evaluacion, c.IdPersonal, c.IdCurso, c.FechaCapacitacion, p.Nombre as NombreEmpleado, p.ApellidoPaterno, p.ApellidoMaterno, p.IdSucursal, cu.Nombre
        from capacitacion c 
        inner join personal p on c.IdPersonal = p.IdPersonal
        inner join cursos cu on c.IdCurso = cu.IdCurso where IdSucursal = $IdSucursal ");
        $sql->execute();
        $resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
}
else{
$sql= $pdo->prepare("SELECT c.IdCapacitacion, c.Evaluacion, c.IdPersonal, c.IdCurso, c.FechaCapacitacion, p.Nombre as NombreEmpleado, p.ApellidoPaterno, p.ApellidoMaterno, cu.Nombre
from capacitacion c 
inner join personal p on c.IdPersonal = p.IdPersonal
inner join cursos cu on c.IdCurso = cu.IdCurso ");
$sql->execute();
$resultado=$sql->fetchALL(PDO::FETCH_ASSOC);
}



?>

<!-- normalize CSS
		============================================ -->
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-table.css">
    <link rel="stylesheet" href="../Recursos/css/data-table/bootstrap-editable.css">

 
                                                         
                                    <table id="table" data-toggle="table" data-pagination="true" data-search="true" data-show-columns="true" data-show-pagination-switch="false" data-show-refresh="false" data-key-events="true" data-show-toggle="false" data-resizable="true" data-cookie="true"
                                        data-cookie-id-table="saveId" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
                                        <thead>
                                            <tr>
                                            <th>No</th>
                                            <th>Personal</th>
                                            <th>Curso</th>
                                            <th>Evaluación</th>
                                            <th>Fecha</th>                                                              
                                                                 
                                            <th>Configuración</th>
                                            </tr>
                                        </thead>
                                       
                                        <tbody>
                                        <?php foreach ($resultado as $dato) {?>
                                            <tr>
                                                <td><?php echo $dato['IdCapacitacion']; ?></td>
                                                <td><?php echo $dato['NombreEmpleado'] ." ".$dato['ApellidoPaterno'] ." ". $dato['ApellidoMaterno']; ?></td>
                                                <td><?php echo $dato['Nombre'];?></td>
                                                <td><?php echo $dato['Evaluacion'];?></td>
                                                <td><?php echo date("d-m-Y", strtotime( $dato['FechaCapacitacion'])); ?></td>
                                                
                                               
                                                <td>
                                                    <a href="VEditar_Capacitacion.php?IdCapacitacion=<?php echo $dato['IdCapacitacion']; ?>"><button  title="Editar" class="pd-setting-ed"  ><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button></a>
                                                    <a id="Eliminar" data-id="<?php echo $dato['IdCapacitacion']; ?>" href="javascript:void(0)"><button data-toggle="tooltip" title="Eliminar" class="pd-setting-ed"><i class="fa fa-trash-o" aria-hidden="true"></i></button></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table> <br>
                                

        
        




        
        <!-- data table JS
		============================================ -->
    <script src="../Recursos/js/data-table/bootstrap-table.js"></script>

    


	 
	 
		
	 
	 




    