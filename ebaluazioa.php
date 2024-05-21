<!DOCTYPE html>

<!-- Titulo de pagina web en google -->
<html>
<head>
  <meta charset="UTF-8">
<title>Mantentze Elektronikoa</title>

<!-- Titulo grande con logo que si clicas vas a donbosco -->
<header>
   	<center><h1> MANTENTZE ELEKTRONIKOA</h1></center>
</header>

<!-- para dar el formato que he hecho con CSS. Recuerda que si hay formato aqui en notepad y en Visual Studio puede haber confusion-->
<link rel="stylesheet" href="itxurita.css">

<!-- formato del titulo -->
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

<!-- Menú con sus links -->
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

<?php
$con = mysqli_connect('localhost', 'root', '', 'erronka4');

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}


// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST["form_action2"]) && ($_POST["form_action2"] === "update" OR $_POST["form_action2"] === "delete")){
            // Assuming you have form fields with names: current_ikasleID, column_name, new_value
            $current_NAN = mysqli_real_escape_string($con, $_POST["current_NAN"]);
            $current_MODULUZENBAKIA = isset($_POST["current_MODULUZENBAKIA"]) ? mysqli_real_escape_string($con, $_POST["current_MODULUZENBAKIA"]) : '';
            $column_name = mysqli_real_escape_string($con, $_POST["column_name"]);
            $new_value = mysqli_real_escape_string($con, $_POST["new_value"]);

           
            // Check if the form_action field is set to "update"
            if ($_POST["form_action2"] === "update"){    
                // Update the database
                // Update the database
            $updateSql = "UPDATE ebaluazioak SET $column_name = ? WHERE NAN = ? AND MODULUZENBAKIA = ?";
            $stmt = $con->prepare($updateSql);
			

            if ($stmt) {
                $stmt->bind_param("sss", $new_value, $current_NAN, $current_MODULUZENBAKIA);
                $stmt->execute();

                if ($stmt->affected_rows > 0) {
                    echo "Datuak aldatu egin dira. ";
                } else {
                    echo "Datuak ez dira aldatu. ";
                }

                $stmt->close();
            } else {
                echo "Update statement preparation failed: " . $con->error;
            }
            }

            // Check if the delete_ebaluazioa field is set to "true"
            if ($_POST["form_action2"] === "delete") {

                $deleteSql = "DELETE FROM ebaluazioak WHERE NAN = ? AND MODULUZENBAKIA = ?";
                $deleteStmt = $con->prepare($deleteSql);

                if ($deleteStmt) {
                    $deleteStmt->bind_param("ss", $current_NAN, $current_MODULUZENBAKIA);
                    $deleteStmt->execute();

                    if ($deleteStmt->affected_rows > 0) {
                        echo "ebaluazioa ezabatu egin da.";
                    } else {
                        echo "Ezin izan da ebaluazioa ezabatu.";
                    }

                    $deleteStmt->close();
                } else {
                    echo "Delete statement preparation failed: " . $con->error;
                }
            } else {
                // Continue with the update logic (existing code)
            }
    }
}

?>

    <script>
    function fillFormData(NAN, MODULUZENBAKIA, columnName) {
        document.getElementById("current_NAN").value = NAN;
        document.getElementById("current_MODULUZENBAKIA").value = MODULUZENBAKIA;
        // Dynamically set the selected option in the dropdown
        var dropdown = document.getElementById("column_name");
        for (var i = 0; i < dropdown.options.length; i++) {
            if (dropdown.options[i].value === columnName) {
                dropdown.options[i].selected = true;
                break;
            }
        }

        // Populate the new_value input with the current cell value
        var table = document.getElementById("studentTable");
        for (var i = 1, row; row = table.rows[i]; i++) {
            for (var j = 1, col; col = row.cells[j]; j++) {
                if (col.onclick && col.onclick.name === "fillFormData" && col.innerHTML === NAN) {
                    document.getElementById("new_value").value = row.cells[j].innerHTML;
                }
            }
        }
    }

    function deleteEbaluazioak() {
        var confirmDelete = confirm("Ziur zaude datu hauek ezabatu nahi dituzula?");
        if (confirmDelete) {
            document.getElementById("form_action2").value = "delete";
            document.forms["frmSecundario"].submit();
        }
    }
       
    function updateEbaluazioak() {
            document.getElementById("form_action2").value = "update";
            document.forms["frmSecundario"].submit();
       
    }
    </script>

</head>
<body>
    <h2>Ebaluazioa</h2>
    <form method="post" action="" class="update-form">
        <label for="Data1">Ikaslearen Izena:</label>
        <select id="Data1" name="Data1">
        <?php
            // Fetch Ikasle data from the database
            $sql = "SELECT NAN, izena FROM ikasleak"; // Adjust based on your database schema
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['NAN']}'>{$row['izena']}</option>";
                }
            } else {
                echo "<option>No results</option>";
            }
            ?>
        </select>

       <label for="Data2">Moduluaren Izena:</label>
        <select id="Data2" name="Data2">
        <?php
            // Fetch Modulo data from the database
            $sql = "SELECT MODULUZENBAKIA, Moduluarenizena FROM moduluak"; // Adjust based on your database schema
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['MODULUZENBAKIA']}'>{$row['Moduluarenizena']} - {$row['MODULUZENBAKIA']}</option>";
                }
            } else {
                echo "<option>No results</option>";
            }

            ?>
        </select>

        <h3>Idatzi Nota eta Faltak</h3>
        <label for="notaInput">Nota:</label>
        <input type="number" id="notaInput" name="notaInput" min="0" max="10">
        <label for="faltakInput">Falta/k:</label>
        <input type="number" id="faltakInput" name="faltakInput" min="0" max="200">
        <br>

        <div class="form-buttons">
        <button type="submit" value="Gorde Ebaluazioa" name="form_action" class="submit-button">Gorde Ebaluazioa</button>    
        </div>
    </form>
<?php
// Check if the form is submitted
if (isset($_POST['form_action'])) {
    // Retrieve form data (primary keys)
    $data1_id = $_POST['Data1'];
    $data2_id = $_POST['Data2'];
    $nota = $_POST['notaInput'];
    $faltak = $_POST['faltakInput'];


    // Check if the foreign key values exist in the referenced tables
    $check_sql1 = "SELECT NAN FROM ikasleak WHERE NAN = '$data1_id'";
    $check_sql2 = "SELECT MODULUZENBAKIA FROM moduluak WHERE MODULUZENBAKIA = '$data2_id'";

    $result1 = mysqli_query($con, $check_sql1);
    $result2 = mysqli_query($con, $check_sql2);

    if (mysqli_num_rows($result1) === 0 || mysqli_num_rows($result2) === 0) {
        echo "Error: Foreign key values do not exist in the referenced tables.";
    } else {
        // Insert the selected primary keys into the ebaluazioa table
        $sql = "INSERT INTO ebaluazioak (NAN, MODULUZENBAKIA, nota, faltak) VALUES ('$data1_id', '$data2_id', '$nota', '$faltak')";

        if (mysqli_query($con, $sql)) {
            echo '<div class="success">Datu-basean ondo txertatu dira datuak.<span class="success-close" onclick="this.parentElement.style.display=\'none\';">&times;</span></div>';
        } else {
            echo '<div class="error">Error: ' . $sql . '<br>' . mysqli_error($con) . '<span class="error-close" onclick="this.parentElement.style.display=\'none\';">&times;</span></div>';
        }
    }

    // Close the connection after inserting data
    mysqli_close($con);
}

// Re-open the connection to fetch data for the table
$con = mysqli_connect('localhost', 'root', '', 'erronka4');

if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Fetch data for the table (adjust the query based on your database schema)
$sql = "SELECT e.NAN, i.izena, e.MODULUZENBAKIA, m.Moduluarenizena, e.nota, e.faltak FROM ebaluazioak e
        INNER JOIN ikasleak i ON e.NAN = i.NAN
        INNER JOIN moduluak m ON e.MODULUZENBAKIA = m.MODULUZENBAKIA";
$result = $con->query($sql);
?>
<!-- Add this section after the PHP code for inserting data -->
    <div class="BichoLover">
    <table id="studentTable" border="1">
        <tr>
            <th>IkasleID</th>
            <th>Ikasleizena</th>
            <th>ModuloID</th>
            <th>Moduloizena</th>
            <th>Nota</th>
            <th>Faltak</th>
        </tr>
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                // Display IkasleID and ModuloID as clickable cells
                echo "<td onclick=\"fillFormData('" . htmlspecialchars($row["NAN"]) . "', '" . htmlspecialchars($row["MODULUZENBAKIA"]) . "', 'NAN')\">" . htmlspecialchars($row["NAN"]) . "</td>";
                echo "<td onclick=\"fillFormData('" . htmlspecialchars($row["NAN"]) . "', '" . htmlspecialchars($row["MODULUZENBAKIA"]) . "', 'NAN')\">" . htmlspecialchars($row["MODULUZENBAKIA"]) . "</td>";

                // Display other columns as clickable cells
                foreach ($row as $column => $value) {
                    if ($column !== "NAN" && $column !== "MODULUZENBAKIA") {
                        echo "<td onclick=\"fillFormData('" . htmlspecialchars($row["NAN"]) . "', '" . htmlspecialchars($row["MODULUZENBAKIA"]) . "', '" . htmlspecialchars($column) . "')\">" . htmlspecialchars($value) . "</td>";
                    }
                }

                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'>No data found</td></tr>";
        }
        $con->close();
        ?>
    </table>
    </div>
<!-- Form for updating selected data -->
    <form method="post" id= "frmSecundario" action="<?php echo $_SERVER["PHP_SELF"]; ?>" class="update-form">
        <div class="form-group">
            <label for="current_NAN">Ikaslea</label>
            <input type="text" id="current_NAN" name="current_NAN" readonly>
        </div>
       
        <div class="form-group">
            <label for="current_MODULUZENBAKIA">Modulua</label>
            <input type="text" id="current_MODULUZENBAKIA" name="current_MODULUZENBAKIA" required>
        </div>        

        <div class="form-group">
            <label for="column_name">Aldatu nahi duzun datua</label>
            <select id="column_name" name="column_name" required>
                <option value="nota">Nota</option>
                <option value="faltak">Faltak</option>
                <!-- Add more options for other columns -->
            </select>
        </div>

        <div class="form-group">
            <label for="new_value">Datu berria</label>
            <input type="text" id="new_value" name="new_value">
        </div>

        <div class="form-buttons">
            <button type="submit" onclick="updateEbaluazioak()" class="submit-button">Aldatu Datua</button>
            <button type="button" onclick="deleteEbaluazioak()" class="delete-button">Ezabatu Ebaluazioa</button>
        </div>

        <!-- Hidden input for form_action -->
       
		<input type="hidden" id="form_action2" name="form_action2" value="">
    </form>
               
    </form>


</body>
</html>



<!-- Orri-oin -->
<footer>
    <center><p>&copy; 2023 Amaia Beneitez. Todos los derechos reservados.</p></center>
	   <a href="https://elektronikaetatelekomunikazioak.donbosco.eus/">
	   <center><img class="logo" src="Argazkiak/logo.png" alt="Instagram logo"></center>
	   </a>
</footer>


</body>
</html>