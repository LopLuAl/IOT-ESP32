<?php
//SI CAMBIO DE PAGINA WEB AL SUBIR CAMBIAR LINK
	$link = 'mysql:host=localhost;dbname=id';
	$usuario = 'root';
	$pass = '';
	try{
		$pdo =  new PDO($link,$usuario,$pass);
    }
	catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
	}
?>
