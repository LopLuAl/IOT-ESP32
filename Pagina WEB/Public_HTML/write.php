<?php
include_once 'conexion.php';
$sql_leer = 'SELECT * FROM datos_w';
$gsent = $pdo->prepare($sql_leer);
$gsent->execute();
$resultado = $gsent->fetchAll();

	if ($_POST['1'])   
	{
		$estado_salida = 1 ;
	}elseif ($_POST['2'])
	{
		$estado_salida = 2; 
	}
	elseif ($_POST['3'])
	{
		$estado_salida = 3;
	}
	elseif ($_POST['4'])
	{
		$estado_salida =4;
	}
	foreach($resultado as $dato)
	{	
		if(dato['id'] == $estado_salida)
			dato['estado']=!dato['estado'];
	}
	
	

?>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<link rel="shortcut icon" href="/images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
	
	<title>Recopilacion Datos IOT</title>
  </head>
  <body class = "bg-info">
	<h3 class="text-center">LA INFORMACION SE ACTUALIZA CADA  x MINUTOS</h3>
	<div class="table-responsive-sm">
		<form action="" method="post">
			<table class="table table-sm ">
				<thead>
					<tr>
					  <th scope="col">ARDU_ID</th>
					  <th scope="col">OUT 1</th>
					  <th scope="col">OUT 2</th>
					  <th scope="col">OUT 3</th>
					</tr>
				</thead>
				<tbody>
					<tr>
							<th scope= "row"> </th>
							<td><input class="btn btn-dark" type="button" value="1" name= "1"></td>
							<td><input class="btn btn-dark" type="button" value="2" name="2"></td>
							<td><input class="btn btn-dark" type="button" value="3" name ="3"></td>
					</tr>
				 </tbody>
			</table>
		</form>
		<p class="text-justify"> METAS A ALCANZAR: QUE SE ACTUALIZE SOLA CADA x MINUTOS GUARDAR LOS DATOS EN UN ARCHIVO
		</p>
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>
