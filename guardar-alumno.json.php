<?php
ini_set( 'display_errors', 0 );

header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "academico";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "INSERT INTO alumno (codigo, nombres, apellido_paterno, fecha_nacimiento) ";
$sql .= " VALUES ('" . $data["codigo"] . "', '" . $data["nombres"] . "', '";
$sql .= $data["apellido_paterno"] . "', '" . $data["fecha_nacimiento"] . "')";

$result = $conn->query($sql);
if ($result === TRUE) {
	echo '{"codigo": "' . $data["codigo"] . '"}';
}
else {
	echo '{"error": "No se pudo insertar el alumno"}';
}
$conn->close();
?>