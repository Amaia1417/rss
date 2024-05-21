<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mantentze Elektronikoa</title>
    <link rel="stylesheet" href="itxurita.css">
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
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
    </style>
</head>
<body>

<div class="navbar">
    <a href="hasiera.html">Hasiera</a>
    <div class="dropdown">
        <button class="dropbtn">Ikasleak</button>
        <div class="dropdown-content">
            <a href="ikaslealta.php">Ikasle alta</a>
            <a href="ikaslezerrenda.php">Ikasle zerrenda</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Irakasleak</button>
        <div class="dropdown-content">
            <a href="irakasleakaetat.php">Irakasle alta eta tabla</a>
            <a href="irakaslezerrenda.php">Irakasle zerrenda</a>
        </div>
    </div>
    <div class="dropdown">
        <button class="dropbtn">Moduluak</button>
        <div class="dropdown-content">
            <a href="moduluenaetat.php">Moduluen alta eta tabla</a>
            <a href="moduluenlista.php">Moduluen zerrenda</a>
        </div>
    </div>
    <a href="kontaktua.html" class="split">Kontaktua</a>
    <a href="ebaluazioa.php" class="split">Ebaluazioa</a>
</div>

<center>
    <?php
    $con = mysqli_connect('localhost', 'root', '', 'erronka4');

    // Check connection
    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = "SELECT MODULUZENBAKIA, moduluarenizena, orduak FROM moduluak";
    $result = $con->query($sql);
    ?>


<?php
// Realizar la conexión a la base de datos (reemplaza los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "erronka4";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $current_MODULUZENBAKIA = $_POST["current_MODULUZENBAKIA"];
    $column_name = $_POST["column_name"];
    $new_value = $_POST["new_value"];

    // Update the database
    if (isset($_POST["update"])) {
        $updateSql = "UPDATE moduluak SET $column_name = ? WHERE MODULUZENBAKIA = ?";
        $stmt = $conn->prepare($updateSql);

        // Assuming you have different data types for different columns
        // Adjust the data type in bind_param accordingly
        if ($column_name == "fecha_nacimiento") {
            $stmt->bind_param("ss", $new_value, $current_MODULUZENBAKIA);
        } else {
            $stmt->bind_param("ss", $new_value, $current_MODULUZENBAKIA);
        }

        $stmt->execute();
        $stmt->close();

    } elseif (isset($_POST["delete"])) {
        // Delete the row from the database
        $deleteEbaluazioaSql = "DELETE FROM ebaluazioak WHERE MODULUZENBAKIA = ?";
        $stmtEbaluazioa = $conn->prepare($deleteEbaluazioaSql);
        $stmtEbaluazioa->bind_param("s", $current_MODULUZENBAKIA);
        $stmtEbaluazioa->execute();
        $stmtEbaluazioa->close();

        // Eliminar la fila en moduluak después de eliminar las relacionadas en ebaluazioa
        $deleteModuluakSql = "DELETE FROM moduluak WHERE MODULUZENBAKIA = ?";
        $stmtModuluak = $conn->prepare($deleteModuluakSql);
        $stmtModuluak->bind_param("s", $current_MODULUZENBAKIA);
        $stmtModuluak->execute();
        $stmtModuluak->close();
    }
}

// Retrieve data from the database
$sql = "SELECT MODULUZENBAKIA, moduluarenizena, orduak FROM moduluak";
$result = $conn->query($sql);

// Cerrar la conexión a la base de datos
$conn->close();
?>

<script>
    function fillUpdateFormData(currentValue) {
        document.getElementById("current_MODULUZENBAKIA").value = currentValue;
        document.getElementById("column_name").value = "MODULUZENBAKIA"; // Columna por defecto
        return false; // Evita que el formulario se envíe
    }

    function fillDeleteFormData(currentValue) {
        document.getElementById("current_MODULUZENBAKIA").value = currentValue;
        document.getElementById("column_name").value = "MODULUZENBAKIA"; // Columna por defecto
        return false; // Evita que el formulario se envíe
    }
	
	function confirmDelete() {
        var confirmDelete = confirm("Zihur zaude datu hauek ezabatu nahi dituzula?");
        return confirmDelete;
    }

    document.addEventListener("DOMContentLoaded", function () {
        var table = document.getElementById("studentTable");
        var rows = table.getElementsByTagName("tr");

        for (var i = 1; i < rows.length; i++) {
            rows[i].addEventListener("click", function () {
                var cells = this.getElementsByTagName("td");
                var currentValue = cells[0].innerText; // Obtener el valor de la primera celda (MODULUZENBAKIA)
                fillUpdateFormData(currentValue);
            });
        }
    });
</script>

<form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <label for="current_MODULUZENBAKIA">Modulua</label>
    <input type="text" name="current_MODULUZENBAKIA" id="current_MODULUZENBAKIA" required>

    <label for="column_name">Aldatzeko</label>
    <select name="column_name" id="column_name" required>
        <option value="MODULUZENBAKIA">Zenbakia</option>
        <option value="moduluarenizena">Izena</option>
        <option value="orduak">Orduak</option>
    </select>

    <label for="new_value">New Value:</label>
    <input type="text" name="new_value" required>

    <input type="submit" name="update" value="ALDATU" onclick="fillUpdateFormData(document.getElementById('current_MODULUZENBAKIA').value)">
    <input type="submit" name="delete" value="EZABATU" onclick="return confirmDelete();">
</form>

<!-- Tabla de datos -->
<table id="studentTable" border="1">
    <tr>
        <th>MODULUZENBAKIA</th>
        <th>moduluarenizena</th>
        <th>orduak</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr onclick='fillUpdateFormData(\"" . htmlspecialchars($row["MODULUZENBAKIA"]) . "\")'>";
            echo "<td>" . htmlspecialchars($row["MODULUZENBAKIA"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["moduluarenizena"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["orduak"]) . "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No data found</td></tr>";
    }
    ?>
</table>
</body>
</html>