<?php
	include_once 'conexion.php';
	$sql_leer = 'SELECT * FROM usuarios';
	$gsent = $pdo->prepare($sql_leer);
	$gsent->execute();
	$resultado = $gsent->fetchAll();
	if($_POST)
	{
		$usuario=$_POST['user_nname'];
		$clave=$_POST['cl_ave'];
		foreach($resultado as $dato)
		{
			if (($dato['username'] == $usuario)&&($dato['clave']==$clave))
			{
				echo "<script type='text/javascript'>window.top.location='https://plataformaiot.000webhostapp.com/conectar.php/';</script>";
			    $flag=0;
			}
			$flag= 1;
		}
		if ($flag == 1)
		{
		    echo "<script type='text/javascript'>window.top.location='https://plataformaiot.000webhostapp.com/';</script>";
		    exit;
		}
	}
	

?>
<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="shortcut icon" href="./images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="./images/favicon.ico" type="image/x-icon">
    <title>Ingreso a la Base de Datos</title>
  </head>
  <body>
    <div class="container mt-5 ">
			<div class = "col-auto">
				<h2 class="text-center">DATOS DE ACCESO</h2>
				<form method="POST">
					<input type="text" class="form-control mt-3" name="user_nname" placeholder="USUARIO"  required>
					<input type="password" class="form-control mt-3" name="cl_ave" placeholder="CLAVE" required >
					<button class="btn btn-primary mt-3 btn-block">LOG IN!</button>
				</form>
			</div>
		</div>
		<p class="text-center">Usuario:admin Clave:1234</p>	
	</div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
  </body>
</html>