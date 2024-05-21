<!DOCTYPE html>
<html>

<head>
    <title>Mantentze Elektronikoa</title>

    <!-- Titulo grande con logo que si clicas vas a donbosco -->
    <header>
        <center>
            <h1> MANTENTZE ELEKTRONIKOA</h1>
        </center>
    </header>

    <link rel="stylesheet" href="itxurita.css">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to bottom, white, #FFA500);
            /* Degradado blanco a naranja */
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

        .navbar a:hover,
        .dropdown:hover .dropbtn {
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
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = "SELECT DNI, izena, abizena, sexua FROM irakasleak";
        $result = $con->query($sql);
        ?>

        <h2>IRAKASLEEN ZERRENDA</h2>
        <table id="studentTable" border="1">
            <tr>
                <th>Irakasle NAN</th>
                <th>Irakasle izena</th>
                <th>Irakasle abizenak</th>
                <th>Sexua</th>
            </tr>
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<tr onclick='mostrarDetalleIrakaslea(\"" . htmlspecialchars($row["DNI"]) . "\", \"" . htmlspecialchars($row["izena"]) . "\", \"" . htmlspecialchars($row["abizena"]) . "\", \"" . htmlspecialchars($row["sexua"]) . "\")'>";
                    echo "<td>" . htmlspecialchars($row["DNI"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["izena"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["abizena"]) . "</td>";
                    echo "<td>" . htmlspecialchars($row["sexua"]) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No data found</td></tr>";
            }
            $con->close();
            ?>
        </table>

        <form id="detalleIrakaslea">
            <h3>Irakasleen datu aldaketak</h3>
            <label for="dni">Irakasle NAN:</label>
            <input type="text" id="dni" name="dni" readonly>

            <label for="izena">Irakasle izena:</label>
            <input type="text" id="izena" name="izena">

            <label for="abizena">Irakasle abizenak:</label>
            <input type="text" id="abizena" name="abizena">

            <label for="sexua">Sexua:</label>
            <input type="text" id="sexua" name="sexua">

            <!-- Añade el botón de Aldatu al final del formulario -->
            <button type="button" onclick="aldatuIrakaslea()">Aldatu</button>
        </form>
    </center>

    <script>
        function mostrarDetalleIrakaslea(dni, izena, abizena, sexua) {
            var detalleIrakasleaForm = document.getElementById("detalleIrakaslea");
            detalleIrakasleaForm.style.display = "block";

            document.getElementById("dni").value = dni;
            document.getElementById("izena").value = izena;
            document.getElementById("abizena").value = abizena;
            document.getElementById("sexua").value = sexua;
        }

        function aldatuIrakaslea() {
            var dni = document.getElementById("dni").value;
            var izena = document.getElementById("izena").value;
            var abizena = document.getElementById("abizena").value;
            var sexua = document.getElementById("sexua").value;

            // Aquí puedes realizar la llamada AJAX para actualizar los datos en la base de datos
            // Puedes enviar estos datos a un archivo PHP que maneje la actualización
            // Por ejemplo, podrías crear un archivo llamado "aldatuIrakaslea.php" con el siguiente contenido:
            /*
            <?php
            $con = mysqli_connect('localhost', 'root', '', 'erronka4');
            if (!$con) {
                die("Connection failed: " . mysqli_connect_error());
            }

            $dni = mysqli_real_escape_string($con, $_POST['dni']);
            $izena = mysqli_real_escape_string($con, $_POST['izena']);
            $abizena = mysqli_real_escape_string($con, $_POST['abizena']);
            $sexua = mysqli_real_escape_string($con, $_POST['sexua']);

            $sql = "UPDATE irakasleak SET izena='$izena', abizena='$abizena', sexua='$sexua' WHERE DNI='$dni'";

            if (mysqli_query($con, $sql)) {
                echo "Datuak ongi eguneratuak.";
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }

            mysqli_close($con);
            ?>
            */
            // Después, en este script, podrías realizar una llamada AJAX para enviar los datos a ese archivo PHP
            // Aquí te dejo un ejemplo básico usando JavaScript y la función fetch:
            fetch('aldatuIrakaslea.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'dni=' + dni + '&izena=' + izena + '&abizena=' + abizena + '&sexua=' + sexua,
                })
                .then(response => response.text())
                .then(data => {
                    // Aquí puedes manejar la respuesta del servidor, por ejemplo, mostrar un mensaje al usuario
                    alert(data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        }
    </script>
</body>

</html>