
<?php
$target1 = 0;
$target2 = 0;
$target3 = 0;
$s_1;
$s_2;
$s_3;
$c_1="\"btn btn-success\"";
$c_2="\"btn btn-success\"";
$c_3="\"btn btn-success\"";

$textfile = "LEDstate.txt";

$fileLocation = $textfile;
$fh = fopen($fileLocation, "w+") or die("Alvgo Fallo"); // Esto abre el archivo .txt para escribir y remplaza su contenido
//CAMBIAR EL NOMBRE DE LA BASE DE DATOS ACA TAMBIEN!
$conn = new mysqli("127.0.0.1", "root", "", "id");
if ($conn->connect_error) {
    die("error: " . $conn->connect_error);
}
$result = $conn->query("SELECT * FROM devices WHERE `ID`=1;");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $target1 = $row["Target1"];
        $target2 = $row["Target2"];
        $target3 = $row["Target3"];
    }
}

$stringToWrite = "$target1 $target2 $target3"; // Escribe 1 o 0 dependiendo de la respuesta obtenida en index.html
fwrite($fh, $stringToWrite); // Escribe sobre el archivo .txt
if ((isset($_GET['temp'])) && (isset($_GET['hum']))&&(isset($_GET['lux'])))
{

    $temp = $_GET['temp'];
    $hum  = $_GET['hum'];
	  $lux  = $_GET['lux'];
    $conn->query("UPDATE devices SET temp=$temp WHERE `ID`=1");
    $conn->query("UPDATE devices SET hum=$hum WHERE `ID`=1");
    $conn->query("UPDATE devices SET lux=$lux WHERE `ID`=1");
}/*
echo $temp;
echo'<br>';
echo $hum ;
echo'<br>';
echo $lux;
echo'<br>';*/

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["target1"])) {
        if ($target1 === "1") {
            $conn->query("UPDATE devices SET Target1=0 WHERE `ID`=1");
            $target1="0";
        } else if ($target1 === "0") {
            $conn->query("UPDATE devices SET Target1=1 WHERE `ID`=1");
            $target1="1";
        }
    } else if (isset($_POST["target2"])) {
        if ($target2 === "1") {
            $conn->query("UPDATE devices SET Target2=0 WHERE `ID`=1");
            $target2="0";
        } else if ($target2 === "0") {
            $conn->query("UPDATE devices SET Target2=1 WHERE `ID`=1");
            $target2="1";
        }
    } else if (isset($_POST["target3"])) {
        if ($target3 === "1") {
            $conn->query("UPDATE devices SET Target3=0 WHERE `ID`=1");
            $target3="0";
        } else if ($target3 === "0") {
            $conn->query("UPDATE devices SET Target3=1 WHERE `ID`=1");
            $target3="1";
        }
    }
}
if ($target1==="1"):
  $c_1="\"btn btn-danger\"";
else:
  $c_1="\"btn btn-success\"";
endif;
if ($target2==="1"):
  $c_2="\"btn btn-danger\"";
else:
  $c_2="\"btn btn-success\"";
endif;
if ($target3==="1"):
  $c_3="\"btn btn-danger\"";
else:
  $c_3="\"btn btn-success\"";
endif;
echo"<div class=\"text-center\">";
echo "<Button variant=\"success\" size=\"lg\" class=".$c_1."> ". $target1 ."  </Button>";
echo "<Button variant=\"success\" size=\"lg\" class=".$c_2."> ". $target2 ."  </Button>";
echo "<Button variant=\"success\" size=\"lg\" class=".$c_3."> ". $target3 ."  </Button>";
echo"</div>";
$conn->close();
fclose($fh);

?>
