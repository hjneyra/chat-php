<!DOCTYPE HTML>
<html>

<head>
 <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
 <script>
function cargarAlumnos() {
  jQuery.ajax({method: "GET", url: "alumnos.json.php", dataType: 'text'}).done(function( responseText ) {
      var json = JSON.parse(responseText);
      var html = "<tr><td>Codigo</td><td>Nombres</td></tr>";
      for (var i=0; i<json.length; i++) {
          html += "<tr><td>" + json[i].codigo + "</td><td>";
          html += json[i].nombres + "</td><td>";
          html += json[i].apellido_paterno + "</td><td>";
          html += json[i].fecha_nacimiento + "</td></tr>";
      }
      jQuery("#alumnos").html(html);
  });
}

function guardarAlumno() {
  var alumno = {
	"codigo": jQuery("#codigo").val(),
	"apellido_paterno": jQuery("#apellido_paterno").val(),
	"nombres":  jQuery("#nombres").val(),
	"fecha_nacimiento":  jQuery("#fecha_nacimiento").val()
  };
  jQuery.ajax({method: "POST", url: "guardar-alumno.json.php", data: JSON.stringify(alumno), dataType: 'text'}).done(function( responseText ) {
	cargarAlumnos();
	//alert(responseText);
  });
}
</script>
</head>

<body>
 <button onclick="cargarAlumnos()">Cargar</button>
 <table id="alumnos" border="1">
 </table>
 <h3>Nuevo Alumno</h3>
 <table id="nuevo-alumno" border="1">
  <tr><td>Codigo</td><td><input id="codigo" /></td></tr>
  <tr><td>Apellido</td><td><input id="apellido_paterno" /></td></tr>
  <tr><td>Nombres</td><td><input id="nombres" /></td></tr>
  <tr><td>Fecha Nacimiento</td><td><input id="fecha_nacimiento" /></td></tr>
 </table>
 <button onclick="guardarAlumno()">Guardar</button>
</body>

</html>