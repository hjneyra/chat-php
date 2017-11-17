<?php
//ini_set( 'display_errors', 0 );

header("Content-Type: text/javascript");
$data = json_decode(file_get_contents('php://input'), true);

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "chat";

$conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Conexion fallida: %s\n". $conn -> error);

$sql = "SELECT codigo FROM alumno WHERE codigo='" . $data["codigo"] . "'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
	$sql = "UPDATE alumno SET ";
	$sql .= "nombres='" . $data["nombres"] . "',";
	$sql .= "apellido_paterno='" . $data["apellido_paterno"] . "',";
	$sql .= "apellido_paterno='" . $data["apellido_paterno"] . "',";
	$sql .= "fecha_nacimiento='" . $data["fecha_nacimiento"] . "'";
	$sql .= "WHERE codigo='" . $data["codigo"] . "'";
}
else {
	$sql = "INSERT INTO alumno (codigo, nombres, apellido_paterno, fecha_nacimiento) ";
	$sql .= " VALUES ('" . $data["codigo"] . "', '" . $data["nombres"] . "', '";
	$sql .= $data["apellido_paterno"] . "', '" . $data["fecha_nacimiento"] . "')";
}

$result = $conn->query($sql);

if ($result === TRUE) {
	echo '{"codigo": "' . $data["codigo"] . '"}';
}
else {
	echo '{"error": "No se pudo guardar el alumno"}';
}
$conn->close();
?>