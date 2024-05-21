<html>
<head>
<title>Mantentze Elektronikoa</title>

<!-- Titulo grande con logo que si clicas vas a donbosco -->
<header>
   	<center><h1> MANTENTZE ELEKTRONIKOA</h1></center>
</header>

<link rel="stylesheet" href="itxurita.css">

<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
body {
  font-family: Arial, Helvetica, sans-serif;
  background: linear-gradient(to bottom, white, #FFA500); /* Degradado txuritik laranjara */
}

.navbar {
  overflow: hidden;
  background-color: #333;
}

.navbar a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
  background-color: orange;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {
  background-color: #ddd;
}

.dropdown:hover .dropdown-content {
  display: block;
}

.topnav a.split {
  float: right;
  background-color: #04AA6D;
  color: white;
}
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #04AA6D;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
}

.col-25 {
  float: left;
  width: 25%;
  margin-top: 6px;
}

.col-75 {
  float: left;
  width: 75%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

  .success-message {
    background-color: #4CAF50; /* Green background color */
    color: #fff; /* White text color */
    padding: 10px;
    border-radius: 5px; /* Rounded corners */
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
    text-align: center;
  }

  .error-message {
    background-color: #f44336; /* Red background color */
    color: #fff; /* White text color */
    padding: 10px;
    border-radius: 5px; /* Rounded corners */
    font-size: 18px;
    font-weight: bold;
    margin-top: 10px;
    text-align: center;
  }
</style>
</head>
<body>
<div class="navbar">
  <a href="hasiera.html">Hasiera</a>
  <div class="dropdown">
    <button class="dropbtn">Ikasleak 
    </button>
    <div class="dropdown-content">
      <a href="ikaslealta.php">Ikasle alta</a>
      <a href="ikaslezerrenda.php">Ikasle zerrenda</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Irakasleak    
    </button>
    <div class="dropdown-content">
      <a href="irakasleakaetat.php">Irakasle alta eta tabla</a>
      <a href="irakaslezerrenda.php">Irakasle zerrenda</a>
    </div>
  </div> 
  <div class="dropdown">
    <button class="dropbtn">Moduluak 
    </button>
    <div class="dropdown-content">
      <a href="moduluenaetat.php">Moduluen alta eta tabla</a>
      <a href="moduluenlista.php">Moduluen zerrenda</a>
    </div>
  </div> 
   <a href="kontaktua.html" class="split">Kontaktua</a>
   <a href="ebaluazioa.php" class="split">Ebaluazioa</a>
</div>

<div class="container">
<h2>Gure ikastetxean ikasi nahi duzu? Formularioa bete!</h2>
<p>Mantentze-Lan Elektronikoa Teknikarien prestakuntza-eskaintza honi buruzko informazio osoa nahi baduzu, bete eta bidali azpian agertzen den inprimakia.</p>

 <form id="ikasletabla" action="" method="post">
    <label for="NAN">NAN:</label>
    <input type="text" id="NAN" name="NAN" required>

    <label for="izena">Izena:</label>
    <input type="text" id="izena" name="izena" required>

    <label for="jaiotze">Jaiotze-data:</label>
    <input type="date" id="jaiotze" name="jaiotze" required>

    <label for="helbidea">Helbidea:</label>
    <input type="text" id="helbidea" name="helbidea" required>

    <label for="herria">Herria:</label>
    <input type="text" id="herria" name="herria" required>
	
	<label for="emaila">Email-a:</label>
    <input type="email" id="emaila" name="emaila" required>
    <input type="submit" value="Gorde" onclick="guardarDatos()">  
  </form>
 </div>
  
  <!-- Orri-oin -->
<footer>
    <center><p>&copy; 2023 Amaia Beneitez. Todos los derechos reservados.</p></center>
	   <a href="https://elektronikaetatelekomunikazioak.donbosco.eus/">
	   <center><img class="logo" src="Argazkiak/logo.png" alt="Instagram logo"></center>
	   </a>
</footer>

<script>
var datosGuardados = [];

function guardarDatos() {
    var nanInput = document.getElementById('nan');
    var nanValue = nanInput.value.trim();

    // Validar el formato del DNI
    var dniRegex = /^[0-9]{8}[a-zA-Z]$/;
    if (!dniRegex.test(nanValue)) {
        alert('Formato de DNI incorrecto. Debe tener 8 números y una letra.');
        return;
    }

    var emailaInput = document.getElementById('emaila');
    var emailaValue = emailaInput.value.trim();

    // Validar el formato del correo electrónico
    var emailaRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailaRegex.test(emailaValue)) {
        alert('Formato de correo electrónico incorrecto.');
        return;
    }

    // Validar la fecha de nacimiento
    var jaiotzeInput = document.getElementById('jaiotze');
    var jaiotzeValue = jaiotzeInput.value;

    // Obtener la fecha actual para comparar
    var fechaActual = new Date();

    // Convertir la fecha de nacimiento a objeto Date
    var fechaNacimiento = new Date(jaiotzeValue);

    // Verificar si la fecha de nacimiento es válida y anterior a la fecha actual
    if (isNaN(fechaNacimiento.getTime()) || fechaNacimiento >= fechaActual) {
        alert('Fecha de nacimiento no válida.');
        return;
    }

    var nan = document.getElementById('NAN').value;
    var izena = document.getElementById('izena').value;
    var jaiotzeData = document.getElementById('jaiotze').value;
    var helbidea = document.getElementById('helbidea').value;
    var herria = document.getElementById('herria').value;
    var emaila = document.getElementById('emaila').value;

    if (nan && izena && jaiotzeData && helbidea && herria && emaila) {
        var nuevoDato = {
            nan: nan,
            izena: izena,
            jaiotze: jaiotze,
            helbidea: helbidea,
            herria: herria,
            emaila: emaila
        }; 
		
      document.getElementById('ikasletabla').submit();
        datosGuardados.push(nuevoDato);

        // Limpiar los campos después de guardar
        document.getElementById('NAN').value = '';
        document.getElementById('izena').value = '';
        document.getElementById('jaiotze').value = '';
        document.getElementById('helbidea').value = '';
        document.getElementById('herria').value = '';
        document.getElementById('emaila').value = '';

        alert('Dato guardado correctamente.');

        // Actualizar la tabla
        actualizarTabla();
    } else {
        alert('Completa todos los campos antes de guardar.');
    }
}
insert
function descargarDatos() {
    if (datosGuardados.length === 0) {
        alert('No hay datos para descargar.');
        return;
    }

    // Crear un elemento raíz XML
    var xmlDoc = document.implementation.createDocument(null, 'datosGuardados');

    // Iterar sobre los datos y crear elementos XML
    datosGuardados.forEach(function (dato) {
        var datoElement = xmlDoc.createElement('dato');

        // Añadir elementos hijos para cada propiedad
        Object.keys(dato).forEach(function (propiedad) {
            var propiedadElement = xmlDoc.createElement(propiedad);
            propiedadElement.textContent = dato[propiedad];
            datoElement.appendChild(propiedadElement);
        });

        xmlDoc.documentElement.appendChild(datoElement);
    });

    // Convertir el documento XML a una cadena
    var xmlString = new XMLSerializer().serializeToString(xmlDoc);

    // Crear un objeto Blob con los datos XML
    var blob = new Blob([xmlString], { type: 'application/xml' });

    // Crear un enlace de descarga
    var a = document.createElement('a');
    a.href = window.URL.createObjectURL(blob);
    a.download = 'ikasleak.xml';

    // Agregar el enlace al DOM y simular un clic
    document.body.appendChild(a);
    a.click();

    // Eliminar el enlace del DOM
    document.body.removeChild(a);
}

function actualizarTabla() {
    var table = document.getElementById('datosTable');
    // Limpiar la tabla antes de actualizar
    while (table.rows.length > 1) {
        table.deleteRow(1);
    }

    datosGuardados.forEach(function (dato) {
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);
        var cell5 = row.insertCell(4);
        var cell6 = row.insertCell(5);

        cell1.textContent = dato.nan;
        cell2.textContent = dato.izena;
        cell3.textContent = dato.jaiotze;
        cell4.textContent = dato.helbidea;
        cell5.textContent = dato.herria;
        cell6.textContent = dato.emaila;
    });
}
 </script>


<?php
$con = mysqli_connect('localhost', 'root', '', 'erronka4');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Recoger datos del formulario
$nan = mysqli_real_escape_string($con, $_POST['NAN']);
$izena = mysqli_real_escape_string($con, $_POST['izena']);
$jaiotze = mysqli_real_escape_string($con, $_POST['jaiotze']);
$helbidea = mysqli_real_escape_string($con, $_POST['helbidea']);
$herria = mysqli_real_escape_string($con, $_POST['herria']);
$emaila = mysqli_real_escape_string($con, $_POST['emaila']);


// Insertar datos en la base de datos
$sql = "INSERT INTO ikasleak (NAN, izena, jaiotze, helbidea, herria, emaila) VALUES ('$nan', '$izena', '$jaiotze', '$helbidea', '$herria', '$emaila')";

if (mysqli_query($con, $sql)) {
    echo '<div class="success-message">Ikasleak ongi gorde dira.</div>';
} else {
    echo '<div class="error-message">Errorea ikasleak gordetzean: ' . mysqli_error($con) . '</div>';
}

}
mysqli_close($con);
?>

</body>

</html>


