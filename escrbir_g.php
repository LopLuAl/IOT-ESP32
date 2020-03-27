
<?php
$target1 = 0;
$target2 = 0;
$target3 = 0;
$conn = new mysqli("127.0.0.1", "root", "", "luciano");
if ($conn->connect_error) {
    die("error: " . $conn->connect_error);
}
$result = $conn->query("SELECT Target1, Target2, Target3 FROM devices WHERE `ID`=1;");
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $target1 = $row["Target1"];
        $target2 = $row["Target2"];
        $target3 = $row["Target3"];
    }
}
echo "Target 1: " . $target1 . "<br>";
echo "Target 2: " . $target2 . "<br>";
echo "Target 3: " . $target3 . "<br>";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["target1"])) {
        if ($target1 === "1") {
            $conn->query("UPDATE devices SET Target1=0 WHERE `ID`=1");
        } else if ($target1 === "0") {
            $conn->query("UPDATE devices SET Target1=1 WHERE `ID`=1");
        }
    } else if (isset($_POST["target2"])) {
        if ($target2 === "1") {
            $conn->query("UPDATE devices SET Target2=0 WHERE `ID`=1");
        } else if ($target2 === "0") {
            $conn->query("UPDATE devices SET Target2=1 WHERE `ID`=1");
        }
    } else if (isset($_POST["target3"])) {
        if ($target3 === "1") {
            $conn->query("UPDATE devices SET Target3=0 WHERE `ID`=1");
        } else if ($target3 === "0") {
            $conn->query("UPDATE devices SET Target3=1 WHERE `ID`=1");
        }
    }
}
$conn->close();

?>
