<?php
session_start();

// Setează valorile inițiale ale variabilelor de sesiune
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Afisare'])) {
        $_SESSION['showFurnizori'] = true;
        $_SESSION['showInterogare'] = false;
        $_SESSION['showNou'] = false;
        $_SESSION['showNou2'] = false; //  variabilă pentru al patrulea query
        $_SESSION['showBistrita'] = false;
        $_SESSION['showProiecte'] = false;
        $_SESSION['showMinMax'] = false;
    } elseif (isset($_POST['interogare'])) {
        $_SESSION['showFurnizori'] = false;
        $_SESSION['showInterogare'] = true;
        $_SESSION['showNou'] = false;
        $_SESSION['showNou2'] = false;
        $_SESSION['showBistrita'] = false;
        $_SESSION['showProiecte'] = false;
        $_SESSION['showMinMax'] = false;
    } elseif (isset($_POST['nou'])) {
        $_SESSION['showFurnizori'] = false;
        $_SESSION['showInterogare'] = false;
        $_SESSION['showNou'] = true;
        $_SESSION['showNou2'] = false;
        $_SESSION['showBistrita'] = false;
        $_SESSION['showProiecte'] = false;
        $_SESSION['showMinMax'] = false;
    } elseif (isset($_POST['nou2'])) { // Butonul pentru al patrulea query
        $_SESSION['showFurnizori'] = false;
        $_SESSION['showInterogare'] = false;
        $_SESSION['showNou'] = false;
        $_SESSION['showNou2'] = true;
        $_SESSION['showBistrita'] = false;
        $_SESSION['showProiecte'] = false;
        $_SESSION['showMinMax'] = false;
    }  elseif (isset($_POST['queryBistrita'])) { // Butonul pentru al 5-lea query
    $_SESSION['showFurnizori'] = false;
    $_SESSION['showInterogare'] = false;
    $_SESSION['showNou'] = false;
    $_SESSION['showNou2'] = false;
    $_SESSION['showBistrita'] = true;
    $_SESSION['showProiecte'] = false;
    $_SESSION['showMinMax'] = false;
}elseif (isset($_POST['queryProiecte'])) { // Butonul pentru al 6-lea query
    $_SESSION['showFurnizori'] = false;
    $_SESSION['showInterogare'] = false;
    $_SESSION['showNou'] = false;
    $_SESSION['showNou2'] = false;
    $_SESSION['showBistrita'] = false;
    $_SESSION['showProiecte'] = true;
    $_SESSION['showMinMax'] = false;
} elseif(isset($_POST['redirect'])){
    header("Location : interogari_multiple.php");
    exit();
}elseif (isset($_POST['queryMinMax'])) { // Butonul pentru al 8-lea query
    $_SESSION['showFurnizori'] = false;
    $_SESSION['showInterogare'] = false;
    $_SESSION['showNou'] = false;
    $_SESSION['showNou2'] = false;
    $_SESSION['showBistrita'] = false;
    $_SESSION['showProiecte'] = false;
    $_SESSION['showMinMax'] = true;
}
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Colocviu partial 2</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        .button-container {
            text-align: center;
            margin-bottom: 20px;
        }

        button {
            padding: 10px 20px;
            margin: 0 10px;
            font-size: 16px;
            cursor: pointer;
        }

        .table-container {
            display: flex;
            justify-content: center;
            margin-bottom: 20px;
        }

        table {
            border-collapse: collapse;
            width: 70%;
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>
<body>
    <h1>Baza date Magazin</h1>

    <div class="button-container">
        <!-- Buton pentru afișarea furnizorilor -->
        <form method="post">
            <button type="submit" name="Afisare">10.3a Afiseaza furnizorii ordonati dupa stare si nume </button>
        </form>

        <!-- Buton pentru afisare componente -->
        <form method="post">
            <button type="submit" name="interogare">10.3b Afiseaza componentele cu masa intre 100 si 500 din Cluj-Napoca</button>
        </form>

        <!-- Buton pentru 10.4 a -->
        <form method="post">
            <button type="submit" name="nou">10.4a Numele proiectelor, componentelor, orasul a.i. componenta e furnizata proiectului si se afla in acelasi oras</button>
        </form>
        <!-- Buton pentru 10.4 b -->
        <form method="post">
            <button type="submit" name="nou2">10.4b Perechile de coduri de proiecte, cu conditia ca ambelor proiecte sa le fie livrata aceeasi piesa de acelasi furnizor</button>
        </form>
        <!-- Buton pentru 10.5 a -->
        <form method="post">
             <button type="submit" name="queryBistrita">10.5a Afiseaza numele componentei livrată în cantitatea cea mai mică pentru proiecte situate în orașul ’Bistrita’</button>
        </form>
        <!-- Buton pentru 10.5 b -->
        <form method="post">
        <button type="submit" name="queryProiecte">10.5b Afiseaza denumirea proiectelor situate în același oraș cu orașul furnizorului ce are idf ’F001’</button>
        </form>
        <!-- Buton pentru 10.6 a -->
        <form action="interogari_multiple.php" method="post">
        <button type="submit" name="redirect">10.6a Interogari numar proiecte, componente, furnizori in functie de oras</button>
        </form>
        <!-- Buton pentru 10.6 b -->
        <form method="post">
        <button type="submit" name="queryMinMax">10.6b Afiseaza pentru componenta cu codul ’C12’ cantitatea minimă și cantitatea maximă livrată</button>
        </form>

    </div>

    <div id="furnizori" class="table-container" <?php if (!$_SESSION['showFurnizori']) echo 'style="display: none;"'; ?>>
    <?php
// Verificăm dacă s-a apăsat butonul pentru afișarea furnizorilor
if ($_SESSION['showFurnizori']) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bazaDate";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Conexiune eșuată: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM FURNIZORI ORDER BY STARE ASC, NUMEF ASC";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>idf</th><th>numef</th><th>stare</th><th>oras</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["idf"] . "</td>";
            echo "<td>" . $row["numef"] . "</td>";
            echo "<td>" . $row["stare"] . "</td>";
            echo "<td>" . $row["oras"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nu există rezultate sau a apărut o eroare.";
    }

    mysqli_close($conn);
}
?>

    </div>

    <div id="interogare" class="table-container" <?php if (!$_SESSION['showInterogare']) echo 'style="display: none;"'; ?>>
    <?php
// Verificăm dacă s-a apăsat butonul pentru afișarea componentelor
if ($_SESSION['showInterogare']) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bazaDate";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Conexiune eșuată: " . mysqli_connect_error());
    }

    $sql = "SELECT * FROM COMPONENTE WHERE masa BETWEEN 100 AND 500 AND oras='Cluj-Napoca'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>idc</th><th>numec</th><th>culoare</th><th>masa</th><th>oras</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["idc"] . "</td>";
            echo "<td>" . $row["numec"] . "</td>";
            echo "<td>" . $row["culoare"] . "</td>";
            echo "<td>" . $row["masa"] . "</td>";
            echo "<td>" . $row["oras"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nu există rezultate sau a apărut o eroare.";
    }

    mysqli_close($conn);
}
?>
  </div>

  <div id="nou" class="table-container" <?php if (!$_SESSION['showNou']) echo 'style="display: none;"'; ?>>
    <?php
    if ($_SESSION['showNou']) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "bazaDate";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Conexiune eșuată: " . mysqli_connect_error());
        }

        $sql = "SELECT DISTINCT Proiecte.numep, Componente.numec, Proiecte.oras
                FROM Furnizori
                JOIN Livrari ON Furnizori.idf = Livrari.idf
                JOIN Componente ON Livrari.idc = Componente.idc
                JOIN Proiecte ON Livrari.idp = Proiecte.idp
                WHERE Furnizori.oras = Proiecte.oras";

        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>Nume Proiect</th><th>Nume Componenta</th><th>Oras</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["numep"] . "</td>";
                echo "<td>" . $row["numec"] . "</td>";
                echo "<td>" . $row["oras"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nu există rezultate sau a apărut o eroare.";
        }

        mysqli_close($conn);
    }
    ?>
    </div>


    <div id="nou2" class="table-container" <?php if (!$_SESSION['showNou2']) echo 'style="display: none;"'; ?>>
    <?php
    if ($_SESSION['showNou2']) {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "colocviu";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!$conn) {
            die("Conexiune eșuată: " . mysqli_connect_error());
        }

        $sql = "SELECT DISTINCT L1.idp AS idp1, L2.idp AS idp2
                FROM Livrari L1
                JOIN Livrari L2 ON L1.idf = L2.idf AND L1.idc = L2.idc
                WHERE L1.idp < L2.idp";

        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            echo "<table border='1'>";
            echo "<tr><th>ID Proiect 1</th><th>ID Proiect 2</th></tr>";

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["idp1"] . "</td>";
                echo "<td>" . $row["idp2"] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "Nu există rezultate sau a apărut o eroare.";
        }

        mysqli_close($conn);
    }
    ?>
    </div>


    <div id="queryBistrita" class="table-container" <?php if (!$_SESSION['showBistrita']) echo 'style="display: none;"'; ?>>
    <?php
// Verificăm dacă s-a apăsat butonul pentru afișarea numelor componentelor
if ($_SESSION['showBistrita']) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bazaDate";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Conexiune eșuată: " . mysqli_connect_error());
    }

    $sql = "SELECT numec
    FROM Componente
    WHERE idc IN (
        SELECT idc
        FROM (
            SELECT idc
            FROM Livrari
            JOIN Proiecte ON Livrari.idp = Proiecte.idp
            WHERE Proiecte.oras = 'Bistrita'
            ORDER BY cantitate ASC
        ) AS subquery
    ) 
    LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>numec</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["numec"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nu există rezultate sau a apărut o eroare.";
    }

    mysqli_close($conn);
}
?>
  </div>


  <div id="proiecte" class="table-container" <?php if (!$_SESSION['showProiecte']) echo 'style="display: none;"'; ?>>
    <?php
// Verificăm dacă s-a apăsat butonul pentru afișarea proiectelor
if ($_SESSION['showProiecte']) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bazaDate";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Conexiune eșuată: " . mysqli_connect_error());
    }

    $sql = "SELECT numep
    FROM proiecte
    Where oras=(SELECT oras from furnizori where idf IN('F001'));";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        echo "<table border='1'>";
        echo "<tr><th>numep</th></tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row["numep"] . "</td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Nu există rezultate sau a apărut o eroare.";
    }

    mysqli_close($conn);
}
?>
</div>

<div id="minmax" class="table-container" <?php if (!$_SESSION['showMinMax']) echo 'style="display: none;"'; ?>>
    <?php
// Verificăm dacă s-a apăsat butonul pentru afișarea cantitatii minime si maxime
if ($_SESSION['showMinMax']) {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bazaDate";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Conexiune eșuată: " . mysqli_connect_error());
    }
 // Definim variabilele pentru output
 $min_quantity = 0;
 $max_quantity = 0;

 // Creăm o declarație pentru a apela procedura stocată
 $sql = "CALL GetMinMaxQuantityForComponent('C12', @min_quantity, @max_quantity)";
 $result = mysqli_query($conn, $sql);

 // Selectăm valorile OUT folosind o altă interogare
 $sql_select = "SELECT @min_quantity as min_quantity, @max_quantity as max_quantity";
 $result_select = mysqli_query($conn, $sql_select);
 $row = mysqli_fetch_assoc($result_select);

 if ($row) {
     echo "<table border='1'>";
     echo "<tr><th>MinCantitate</th><th>MaxCantitate</th></tr>";
     echo "<tr>";
     echo "<td>" . $row["min_quantity"] . "</td>";
     echo "<td>" . $row["max_quantity"] . "</td>";
     echo "</tr>";
     echo "</table>";
 } else {
     echo "Nu există rezultate sau a apărut o eroare.";
 }

 mysqli_close($conn);
}
?>
</div>

<script>
    function showFurnizori() {
    // Ascunde toate div-urile
    hideAllDivs();
    // Afișează doar div-ul pentru furnizori
    document.getElementById('furnizori').style.display = 'block';
}

function showInterogare() {
    // Ascunde toate div-urile
    hideAllDivs();
    // Afișează doar div-ul pentru interogare
    document.getElementById('interogare').style.display = 'block';
}

function showNou() {
    // Ascunde toate div-urile
    hideAllDivs();
    // Afișează doar div-ul pentru nou
    document.getElementById('nou').style.display = 'block';
}

function showNou2() {
    // Ascunde toate div-urile
    hideAllDivs();
    // Afișează doar div-ul pentru nou2
    document.getElementById('nou2').style.display = 'block';
}
function showBistrita() {
    // Ascunde toate div-urile
    hideAllDivs();
    // Afișează doar div-ul pentru queryBistrita
    document.getElementById('queryBistrita').style.display = 'block';
}

function showProiecte() {
    // Ascunde toate div-urile
    hideAllDivs();
    // Afișează doar div-ul pentru queryProiecte
    document.getElementById('queryProiecte').style.display = 'block';
}
function showMinMax() {
    // Ascunde toate div-urile
    hideAllDivs();
    // Afișează doar div-ul pentru queryMinMax
    document.getElementById('queryMinMax').style.display = 'block';
}


function hideAllDivs() {
    // Ascunde toate div-urile
    var divs = document.querySelectorAll('.table-container');
    divs.forEach(function(div) {
        div.style.display = 'none';
    });
}
</script>
   
</body>
</html>
