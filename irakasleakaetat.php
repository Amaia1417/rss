<!DOCTYPE html>
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
<body style="background-color:white;">

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

<!-- Bidali beharreko formularioaren formatua -->
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>


body {
  font-family: Arial, Helvetica, sans-serif;
  background: linear-gradient(to bottom, white, #FFA500); /* Degradado blanco a naranja */
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
</style>
</head>
<body>

<h2>Gure zentruan irakaslea izan nahi duzu? Formularioa bete!</h2>
<p>Inprimakia bete ondoren, lehenbailehen jarriko gara zurekin harremanetan.</p>


</head>
<body>
 <form id="irakasletabla" action="" method="post">
    <label for="DNI">DNI</label>
    <input type="text" id="DNI" name="DNI" required>

    <label for="izena">Izena</label>
    <input type="text" id="izena" name="izena" required>

    <label for="abizena">Abizena</label>
    <input type="text" id="abizena" name="abizena" required>

    <label for="sexua">Sexua</label>
    <select id="sexua" name="sexua" required>
        <option value="hombre">Gizona</option>
        <option value="mujer">Emakumea</option>
        <option value="noBinario">Ez bitarra</option>
    </select>

    <input type="submit" value="Gorde" onclick="guardarDatos()">
  </form>
<br

<center>
  <table id="datosTable">
    <tr>
      <th>NAN</th>
      <th>Izena</th>
      <th>Abizena</th>
      <th>Sexua</th>
    </tr>
  </table>
 </center> 
  
  
  <!-- Orri-oin -->
<footer>
    <center><p>&copy; 2023 Amaia Beneitez. Todos los derechos reservados.</p></center>
	   <a href="https://elektronikaetatelekomunikazioak.donbosco.eus/">
	   <center><img class="logo" src="Argazkiak/logo.png" alt="Instagram logo"></center>
	   </a>
</footer>


<script>
    var datosGuardados = [];

      var nanInput = document.getElementById('nan');
       var nanValue = nanInput.value.trim();

        // Validar el formato del DNI
        var dniRegex = /^[0-9]{8}[a-zA-Z]$/;
        if (!dniRegex.test(nanValue)) {
            alert('Formato de DNI incorrecto. Debe tener 8 números y una letra.');
            return;
        }


    function guardarDatos() {
      var dni = document.getElementById('dni').value;
      var izena = document.getElementById('izena').value;
      var abizena = document.getElementById('abizena').value;
      var sexua = document.getElementById('sexua').value;

      if (nan && izena && abizena && sexua) {
        var nuevoDato = {
          dni: dni,
          izena: izena,
          abizena: abizena,
          sexua: sexua
        };

      document.getElementById('irakasletabla').submit();
        datosGuardados.push(nuevoDato);

        // Eremuak garbitzen ditu gordetzeari eman ondoren
        document.getElementById('dni').value = '';
        document.getElementById('izena').value = '';
        document.getElementById('abizena').value = '';
        document.getElementById('sexua').value = 'hombre'; // lehenetsitako aukerari berriro ekin

        alert('Datuak ondo gordeta');

        // Taula aktualizatu
        actualizarTabla();
      } else {
        alert('Completa todos los campos antes de guardar.');
      }
    }

    function actualizarTabla() {
      var table = document.getElementById('datosTable');
      
      // Ezabatzen du taulan dagoena
      table.innerHTML = '<tr><th>DNI</th><th>Izena</th><th>Abizena</th><th>Sexua</th></tr>';

      // Gehitu errenkadak gordetako datuekin
      datosGuardados.forEach(function(dato) {
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);
        var cell4 = row.insertCell(3);

        cell1.textContent = dato.dni;
        cell2.textContent = dato.izena;
        cell3.textContent = dato.abizena;
        cell4.textContent = dato.sexua;
      });
    }

    function descargarDatos() {
      if (datosGuardados.length > 0) {
        var xmlContent = '<?xml version="1.0" encoding="UTF-8"?>\n<datos>\n';

        datosGuardados.forEach(function(dato) {
          xmlContent += '  <persona>\n';
          xmlContent += '    <dni>' + dato.nan + '</dni>\n';
          xmlContent += '    <izena>' + dato.izena + '</izena>\n';
          xmlContent += '    <abizena>' + dato.abizena + '</abizena>\n';
          xmlContent += '    <sexua>' + dato.sexua + '</sexua>\n';
          xmlContent += '  </persona>\n';
        });

        xmlContent += '</datos>';

        var blob = new Blob([xmlContent], { type: 'application/xml' });
        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'irakasleak.xml';
        link.click();
      } else {
        alert('No hay datos para descargar.');
      }
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
$dni = mysqli_real_escape_string($con, $_POST['DNI']);
$izena = mysqli_real_escape_string($con, $_POST['izena']);
$abizena = mysqli_real_escape_string($con, $_POST['abizena']);
$sexua = mysqli_real_escape_string($con, $_POST['sexua']);


// Insertar datos en la base de datos
$sql = "INSERT INTO irakasleak (DNI, izena, abizena, sexua) VALUES ('$dni', '$izena', '$abizena', '$sexua')";

if (mysqli_query($con, $sql)) {
    echo '<div class="success-message">Irakasleak ongi gorde dira.</div>';
} else {
    echo '<div class="error-message">Errorea irakasleak gordetzean: ' . mysqli_error($con) . '</div>';
}

}
mysqli_close($con);
?>
  
  
  </body>
</html>