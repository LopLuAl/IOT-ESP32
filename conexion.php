<?php
	
	$link = 'mysql:host=localhost;dbname=id8322777_usuarios';
	$usuario = 'id8322777_users';
	$pass = 'pepito123';
	try{
		$pdo =  new PDO($link,$usuario,$pass);	
    }
	catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
	}	
?>

