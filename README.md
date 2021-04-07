# IOT-ESP32

Al subirlo a una pagina nueva junto con la base de datos tener en cuenta:
Modificar en conexion.php 
  $link = 'mysql:host=localhost;dbname=id';
  $usuario = 'root';
  $pass = '';
 Por lo que este en phpmyadmin del host
 y en escribir_g.php
 $conn = new mysqli("127.0.0.1", "root", "", "id");
 Por lo que este en phpmyadmin del host
 
Del lado del ESP
 
const char* ssid        = "F";
const char* password    = "xxxxxx";
const char* host        = "iotet12.000webhostapp.com";

ssid: Nombre de la red wifi a la que se conectara el esp
password: contraseña del la red
host: url que nos dio el host
