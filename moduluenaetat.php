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
  background: linear-gradient(to bottom, white, #FFA500); /* Degradado blanco a naranja */
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


  <form id="modulutabla" action="" method="post">

    <label for="moduluzenbakia"> Modulu zenbakia </label>
    <input type="text" id="moduluzenbakia" name="moduluzenbakia" required>
	
	<label for="moduluarenizena">Moduluaren izena</label>
    <select id="moduluarenizena" name="moduluarenizena" required>
        <option value="Zirkuitu elektroniko analogikoak">Zirkuitu elektroniko analogikoak</option>
        <option value="Tresneria mikroprogramagarria">Tresneria mikroprogramagarria</option>
        <option value="Elektronika industrialeko tresneriaren mantentzelanak ">Elektronika industrialeko tresneriaren mantentzelanak </option>
		<option value="Laneko prestakuntza eta orientabidea">Laneko prestakuntza eta orientabidea</option>
		<option value="Tresneria elektronikoa muntatzeko eta mantentzeko teknikak eta prozesuak">Tresneria elektronikoa muntatzeko eta mantentzeko teknikak eta prozesuak</option>
		<option value="Irrati-komunikazioko tresneriaren mantentzelanak">Irrati-komunikazioko tresneriaren mantentzelanak</option>
		<option value="Audio-tresneriaren mantentze-lanak">Audio-tresneriaren mantentze-lanak</option>
		<option value="Bideo-tresneriaren mantentze-lanak">Bideo-tresneriaren mantentze-lanak</option>
		<option value="Mantentze-lan elektronikoen azpiegiturak eta garapena">Mantentze-lan elektronikoen azpiegiturak eta garapena</option>
		<option value="Enpresa eta ekimen sortzailea">Enpresa eta ekimen sortzailea</option>
		<option value="Ingeles teknikoa ">Ingeles teknikoa </option>
		<option value="Mantentze-lan elektronikoen proiektua">Mantentze-lan elektronikoen proiektua</option>
		<option value="Lantokiko prestakuntza">Lantokiko prestakuntza</option>
	</select>

  	<label for="orduak">Orduak</label>
    <select id="orduak" name="orduak" required>
        <option value="231h">231h</option>
        <option value="264h">264h</option>
        <option value="198h">198h</option>
		<option value="99h">99h</option>
		<option value="200h">200h</option>
		<option value="120h">120h</option>
		<option value="60h">60h</option>
		<option value="40h">40h</option>
		<option value="50h">50h</option>
		<option value="360h">360h</option>
	</select>

    <input type="submit" value="+" onclick="guardarDatos()">
  </form>

  <script>
  var datosGuardados = [];

  function guardarDatos() {
    var moduluzenbakia = document.getElementById('moduluzenbakia').value;
    var moduluarenizena = document.getElementById('moduluarenizena').value;
    var orduak = document.getElementById('orduak').value;

    if (moduluzenbakia && moduluarenizena && orduak) {
      var nuevoDato = {
        moduluzenbakia: moduluzenbakia,
        moduluarenizena: moduluarenizena,
        orduak: orduak
      };
	  
	  document.getElementById('modulutabla').submit();
	  
      datosGuardados.push(nuevoDato);

      // Limpiar los campos después de guardar
      document.getElementById('moduluzenbakia').value = '';
      document.getElementById('moduluarenizena').value = '';
      document.getElementById('orduak').value = '';

      alert('Datuak ondo gordeta');

      // Actualizar la tabla
      actualizarTabla();
    } else {
      alert('Completa todos los campos antes de guardar.');
    }
  }

  function actualizarTabla() {
    var table = document.getElementById('datosTable');

    // Limpiar el contenido existente de la tabla
    table.innerHTML = '<tr><th>Modulu Zenbakia</th><th>Moduluaren Izena</th><th>Orduak</th></tr>';

    // Agregar filas con datos guardados
    datosGuardados.forEach(function(dato) {
      var row = table.insertRow(-1);
      var cell1 = row.insertCell(0);
      var cell2 = row.insertCell(1);
      var cell3 = row.insertCell(2);

      cell1.textContent = dato.moduluzenbakia;
      cell2.textContent = dato.moduluarenizena;
      cell3.textContent = dato.orduak;
    });
  }

  function descargarDatos() {
    if (datosGuardados.length > 0) {
        // Crear un nuevo documento XML
        var xmlDoc = document.implementation.createDocument(null, 'datos');

        datosGuardados.forEach(function (dato) {
            var moduluakElement = xmlDoc.createElement('moduluak');

            var moduluzenbakiaElement = xmlDoc.createElement('moduluzenbakia');
            moduluzenbakiaElement.textContent = dato.moduluzenbakia;
            moduluakElement.appendChild(moduluzenbakiaElement);

            var moduluarenizenaElement = xmlDoc.createElement('moduluarenizena');
            moduluarenizenaElement.textContent = dato.moduluarenizena;
            moduluakElement.appendChild(moduluarenizenaElement);

            var orduakElement = xmlDoc.createElement('orduak');
            orduakElement.textContent = dato.orduak;
            moduluakElement.appendChild(orduakElement);

            xmlDoc.documentElement.appendChild(moduluakElement);
        });

        // Convertir el documento XML a una cadena
        var xmlString = new XMLSerializer().serializeToString(xmlDoc);

        // Especificar el tipo MIME como application/xml
        var blob = new Blob([xmlString], { type: 'application/xml' });

        var link = document.createElement('a');
        link.href = window.URL.createObjectURL(blob);
        link.download = 'moduluak.xml';
        link.click();
    } else {
        alert('No hay datos para descargar.');
    }

    return false; // Evita que el formulario realice su acción predeterminada
}


	
</script>

<body>
 <center> 
  <table id="datosTable">
    <tr>
      <th>Modulu zenbakia</th>
      <th>Moduluaren izena</th>
      <th>Orduak</th>
    </tr>
  </table>
 </center>

  <script>
    var datosGuardados = [];

    function guardarDatos() {
      var moduluzenbakia = document.getElementById('moduluzenbakia').value;
      var moduluarenizena = document.getElementById('moduluarenizena').value;
      var orduak = document.getElementById('orduak').value;

      if (moduluzenbakia && moduluarenizena && orduak) {
        var nuevoDato = {
          moduluzenbakia: moduluzenbakia,
          moduluarenizena: moduluarenizena,
          orduak: orduak
        };
		
	    document.getElementById('modulutabla').submit();

        datosGuardados.push(nuevoDato);

        // Limpiar los campos después de guardar
        document.getElementById('moduluzenbakia').value = '';
        document.getElementById('moduluarenizena').value = '';
        document.getElementById('orduak').value = '';

        alert('Dato guardado correctamente.');

        // Actualizar la tabla
        actualizarTabla();
      } else {
        alert('Completa todos los campos antes de guardar.');
      }
    }

    function actualizarTabla() {
      var table = document.getElementById('datosTable');
      // Limpiar la tabla antes de actualizar
      while (table.rows.length > 1) {
        table.deleteRow(1);
      }

      datosGuardados.forEach(function(dato) {
        var row = table.insertRow(-1);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        var cell3 = row.insertCell(2);

        cell1.textContent = dato.moduluzenbakia;
        cell2.textContent = dato.moduluarenizena;
        cell3.textContent = dato.orduak;
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
$moduluzenbakia = mysqli_real_escape_string($con, $_POST['moduluzenbakia']);
$moduluarenizena = mysqli_real_escape_string($con, $_POST['moduluarenizena']);
$orduak = mysqli_real_escape_string($con, $_POST['orduak']);

// Insertar datos en la base de datos
$sql = "INSERT INTO moduluak (MODULUZENBAKIA, moduluarenizena, orduak) VALUES ('$moduluzenbakia', '$moduluarenizena', '$orduak')";

if (mysqli_query($con, $sql)) {
    echo '<div class="success-message">Moduluak ongi gorde dira.</div>';
} else {
    echo '<div class="error-message">Errorea moduluak gordetzean: ' . mysqli_error($con) . '</div>';
}

}
mysqli_close($con);
?>



	<!-- Orri-oin -->
<footer>
    <center><p>&copy; 2023 Amaia Beneitez. Todos los derechos reservados.</p></center>
	   <a href="https://elektronikaetatelekomunikazioak.donbosco.eus/">
	   <center><img class="logo" src="Argazkiak/logo.png" alt="Instagram logo"></center>
	   </a>
</footer>

</body>
</html>