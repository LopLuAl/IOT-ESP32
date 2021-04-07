<?php
include_once 'conexion.php';
if ((isset($_GET['temp'])) && (isset($_GET['hum']))&&(isset($_GET['id']))&&(isset($_GET['lux'])))
{

  $temp = $_GET['temp'];
  $hum  = $_GET['hum'];
	$lux  = $_GET['lux'];
	$id   = $_GET['id'];
	echo $temp;
	echo'<br>';
	echo $hum ;
	echo'<br>';
	echo $lux;
	echo'<br>';
	echo $id;
	echo'<br>';
	$sql_modificar= 'UPDATE devices SET temp=?,hum=?,lux=? WHERE id=?';
	$sentencia_modificar = $pdo->prepare($sql_modificar);
	$sentencia_modificar->execute(array($temp,$hum,$lux,$id));
	//http://plataformaiot.000webhostapp.com/insert.php?temp=20.20&hum=30
	//http://plataformaiot.000webhostapp.com/edit.php?temp=20.20&hum=30&id=1&lux=23

	//echo $temp;
	//echo $hum;
	//insert.php?temp=20.20&hum=30

}
?>
