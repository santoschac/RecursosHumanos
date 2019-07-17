
<?php
		$mysqli = new mysqli("localhost", "root", "12345", "bdrecursoshumanos");		
		if ($mysqli->connect_errno) {
		 "Fallo al conectar a MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
		exit();
		}

		?>
<?php
header('Content-type: application/vnd.ms-excel');
header("Content-Disposition: attachment; filename=TablaCentros.xls");
header("Pragma: no-cache");
header("Expires: 0");?>
?>



<head>


<style>
.table{
	border:1px #111 solid;
	border-radius:20;
width:100	%;
}
.td{
	border:0.2px #333 solid;
	color:#000;
	

}	
.th
{
border:0.2px #333 solid;
	color:#000;
  }

div{	border:1px #111 solid;
		font:Arial;
color:#fff;
	background-color:#088A85 ;
}
td
{ 	width:25%;
	text-align:center;
}

</style>

</head>


<table class="table"  cellspacing="0px">
	
	<center>
		<h1 bgcolor="#111">LISTA DE CENTROS </h1>
	</center>

	<tr>

		<th bgcolor="#CEF6D8" class="th" >#</th>
		<th bgcolor="#CEF6D8" class="th" >Municipio</th>
		<th bgcolor="#CEF6D8" class="th" >Cod. Centro</th>
		<th bgcolor="#CEF6D8" class="th" >Director</th>
		<th bgcolor="#CEF6D8" class="th" >Centro</th>
		<th bgcolor="#CEF6D8" class="th" >Direccion</th>
		


	</tr>			
		<?php
		$consulta= "SELECT * FROM cambios";
		if ($resultado = $mysqli->query($consulta)) 
		{
			while ($Centro = mysqli_fetch_object($resultado)) 
			{

				?>


			<tr>

				<td class="td" bgcolor="#eee"><?php echo $Centro->IdCambio ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Centro->FechaInicio?></td>
				<td class="td" bgcolor="#eee"><?php echo $Centro->IdPersonal ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Centro->IdSucursal ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Centro->IdPuesto ?></td>
				<td class="td" bgcolor="#eee"><?php echo $Centro->Descripcion ?></td>
				
				
				
				
			</tr>

				 <?php
			}
		
		$resultado->close();
		}
		$mysqli->close();			

		?>
		
		</tr>

</table>



