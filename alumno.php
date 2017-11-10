<!DOCTYPE HTML>
<html>

<head>
 <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
 <script>
function cargarAlumnos() {
  jQuery.ajax({method: "GET", url: "alumnos.php?id=2", dataType: 'text'}).done(function( responseText ) {
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
</script>
</head>

<body>
 <button onclick="cargarAlumnos()">Cargar</button>
 <table id="alumnos" border="1">
 </table>
</body>

</html>