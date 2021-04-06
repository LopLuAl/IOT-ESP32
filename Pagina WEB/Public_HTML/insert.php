<?php
include_once 'conexion.php';
if ((isset($_GET['temp'])) && (isset($_GET['hum']))) 
{
 
    $temp = $_GET['temp'];
    $hum = $_GET['hum'];
	$lux= 0;
	$id = 0;
	$sql_agregar= 'INSERT INTO  datos (id,temp,hum,lux) VALUES (?,?,?,?)';
	$sentencia_agregar = $pdo->prepare($sql_agregar);
	$sentencia_agregar->execute(array($id,$temp,$hum,$lux));
	//http://plataformaiot.000webhostapp.com/insert.php?temp=20.20&hum=30
	
	//echo $temp;
	//echo $hum;
	//insert.php?temp=20.20&hum=30
 
}
?>