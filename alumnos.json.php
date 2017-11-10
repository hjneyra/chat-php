<?php
header("Content-Type: text/javascript");

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "academico";
 
$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT codigo, nombres, apellido_paterno, apellido_materno, fecha_nacimiento FROM alumno";
$result = $conn->query($sql);
$alumnos = array();

while($row = $result->fetch_assoc()) {
    $codigo = $row["codigo"];
    $item = '{"codigo": "' . $codigo . '", "nombres": "' . $row["nombres"];
    $item .= '", "apellido_paterno": "' . $row["apellido_paterno"];
    $item .= '", "apellido_materno": "' . $row["apellido_materno"];
    $item .= '", "fecha_nacimiento": "' . $row["fecha_nacimiento"]. '"}';
    array_push($alumnos, $item);
}
echo "[" . implode(", ", $alumnos) . "]";

$conn->close();
?>