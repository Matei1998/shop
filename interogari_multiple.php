<!DOCTYPE html>
<html>
<head>
    <title>Interogări multiple</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        form {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
        }
        button {
            padding: 10px;
            background-color: #3498db;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        button:hover {
            background-color: #2980b9;
        }
        .result {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<h1>Interogări multiple</h1>

<form method="post" action="">
    <button type="submit" name="cluj_napoca_projects">Număr proiecte Cluj-Napoca</button>
    <button type="submit" name="oradea_projects">Număr proiecte ORADEA</button>
    <button type="submit" name="brasov_projects">Număr proiecte Brasov</button>
    <button type="submit" name="galati_projects">Număr proiecte Galati</button>
    <button type="submit" name="satu-mare_projects">Număr proiecte Satu-Mare</button>
    <button type="submit" name="constanta_projects">Număr proiecte Constanta</button> 
    <button type="submit" name="bistrita_projects">Număr proiecte Bistrita</button>   
    <button type="submit" name="sebes_projects">Număr proiecte Sebes</button>

    <button type="submit" name="cluj_napoca_componente">Număr componente Cluj-Napoca</button>
    <button type="submit" name="oradea_componente">Număr componente ORADEA</button>
    <button type="submit" name="brasov_componente">Număr componente Brasov</button>
    <button type="submit" name="galati_componente">Număr componente Galati</button>
    <button type="submit" name="satu-mare_componente">Număr componente Satu-Mare</button>
    <button type="submit" name="constanta_componente">Număr componente Constanta</button> 
    <button type="submit" name="bistrita_componente">Număr componente Bistrita</button>   
    <button type="submit" name="sebes_componente">Număr componente Sebes</button>


    <button type="submit" name="cluj_napoca_furnizori">Număr furnizori Cluj-Napoca</button>
    <button type="submit" name="oradea_furnizori">Număr furnizori ORADEA</button>
    <button type="submit" name="brasov_furnizori">Număr furnizori Brasov</button>
    <button type="submit" name="galati_furnizori">Număr furnizori Galati</button>
    <button type="submit" name="satu-mare_furnizori">Număr furnizori Satu-Mare</button>
    <button type="submit" name="constanta_furnizori">Număr furnizori Constanta</button> 
    <button type="submit" name="bistrita_furnizori">Număr furnizori Bistrita</button>   
    <button type="submit" name="sebes_furnizori">Număr furnizori Sebes</button>
</form>

<?php
// Conectare la baza de date
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "colocviu";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Conexiune eșuată: " . mysqli_connect_error());
}

// Verificarea butoanelor apăsate și efectuarea interogărilor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['cluj_napoca_projects'])) {
        $sql = "SELECT COUNT(idp) as Numar_proiecte FROM proiecte WHERE oras='Cluj-Napoca'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "Număr proiecte Cluj-Napoca: " . $row["Numar_proiecte"];
        } else {
            echo "Nu există rezultate sau a apărut o eroare.";
        }
    }
    if (isset($_POST['oradea_projects'])) {
        $sql = "SELECT COUNT(idp) as Numar_proiecte FROM proiecte WHERE oras='ORADEA'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "Număr proiecte Oradea: " . $row["Numar_proiecte"];
        } else {
            echo "Nu există rezultate sau a apărut o eroare.";
        }
    }
    if (isset($_POST['brasov_projects'])) {
        $sql = "SELECT COUNT(idp) as Numar_proiecte FROM proiecte WHERE oras='Brasov'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "Număr proiecte Brasov: " . $row["Numar_proiecte"];
        } else {
            echo "Nu există rezultate sau a apărut o eroare.";
        }
    }
    if (isset($_POST['galati_projects'])) {
        $sql = "SELECT COUNT(idp) as Numar_proiecte FROM proiecte WHERE oras='Galati'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "Număr proiecte Galati: " . $row["Numar_proiecte"];
        } else {
            echo "Nu există rezultate sau a apărut o eroare.";
        }
    }
    if (isset($_POST['satu-mare_projects'])) {
        $sql = "SELECT COUNT(idp) as Numar_proiecte FROM proiecte WHERE oras='Satu-Mare'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "Număr proiecte Satu-Mare: " . $row["Numar_proiecte"];
        } else {
            echo "Nu există rezultate sau a apărut o eroare.";
        }
    }
    if (isset($_POST['constanta_projects'])) {
        $sql = "SELECT COUNT(idp) as Numar_proiecte FROM proiecte WHERE oras='Constanta'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "Număr proiecte Constanta: " . $row["Numar_proiecte"];
        } else {
            echo "Nu există rezultate sau a apărut o eroare.";
        }
    }
    if (isset($_POST['bistrita_projects'])) {
        $sql = "SELECT COUNT(idp) as Numar_proiecte FROM proiecte WHERE oras='Bistrita'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "Număr proiecte Bistrita: " . $row["Numar_proiecte"];
        } else {
            echo "Nu există rezultate sau a apărut o eroare.";
        }
    }
    if (isset($_POST['sebes_projects'])) {
        $sql = "SELECT COUNT(idp) as Numar_proiecte FROM proiecte WHERE oras='Sebes'";
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            echo "Număr proiecte Sebes: " . $row["Numar_proiecte"];
        } else {
            echo "Nu există rezultate sau a apărut o eroare.";
        }
    }
        // Numar componente dupa orase 

        if (isset($_POST['cluj_napoca_componente'])) {
            $sql = "SELECT COUNT(idc) as Numar_componente
            FROM Componente
            Where oras = 'Cluj-Napoca'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr componente Cluj-Napoca: " . $row["Numar_componente"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['oradea_componente'])) {
            $sql = "SELECT COUNT(idc) as Numar_componente
            FROM Componente
            Where oras = 'ORADEA'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr componente Oradea: " . $row["Numar_componente"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['brasov_componente'])) {
            $sql = "SELECT COUNT(idc) as Numar_componente
            FROM Componente
            Where oras = 'Brasov'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr componente Brasov: " . $row["Numar_componente"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['galati_componente'])) {
            $sql = "SELECT COUNT(idc) as Numar_componente
            FROM Componente
            Where oras = 'Galati'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr componente Galati: " . $row["Numar_componente"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['satu-mare_componente'])) {
            $sql = "SELECT COUNT(idc) as Numar_componente
            FROM Componente
            Where oras = 'Satu-Mare'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr componente Satu-Mare: " . $row["Numar_componente"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['constanta_componente'])) {
            $sql = "SELECT COUNT(idc) as Numar_componente
            FROM Componente
            Where oras = 'Constanta'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr componente Constanta: " . $row["Numar_componente"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['bistrita_componente'])) {
            $sql = "SELECT COUNT(idc) as Numar_componente
            FROM Componente
            Where oras = 'Bistrita'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr componente Bistrita: " . $row["Numar_componente"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['sebes_componente'])) {
            $sql = "SELECT COUNT(idc) as Numar_componente
            FROM Componente
            Where oras = 'Sebes'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr componente Sebes: " . $row["Numar_componente"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        
        // Numar furnizori in functie de oras
       
        if (isset($_POST['cluj_napoca_furnizori'])) {
            $sql = "SELECT COUNT(idf) as Numar_furnizori
            FROM Furnizori
            WHERE oras='Cluj-Napoca'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr furnizori Cluj-Napoca: " . $row["Numar_furnizori"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['oradea_furnizori'])) {
            $sql = "SELECT COUNT(idf) as Numar_furnizori
            FROM Furnizori
            WHERE oras='ORADEA'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr furnizori Oradea: " . $row["Numar_furnizori"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['brasov_furnizori'])) {
            $sql = "SELECT COUNT(idf) as Numar_furnizori
            FROM Furnizori
            WHERE oras='Brasov'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr furnizori Brasov: " . $row["Numar_furnizori"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['galati_furnizori'])) {
            $sql = "SELECT COUNT(idf) as Numar_furnizori
            FROM Furnizori
            WHERE oras='Galati'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr furnizori Galati: " . $row["Numar_furnizori"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['satu-mare_furnizori'])) {
            $sql = "SELECT COUNT(idf) as Numar_furnizori
            FROM Furnizori
            WHERE oras='Satu-Mare'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr furnizori Satu-Mare: " . $row["Numar_furnizori"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['constanta_furnizori'])) {
            $sql = "SELECT COUNT(idf) as Numar_furnizori
            FROM Furnizori
            WHERE oras='Constanta'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr furnizori Constanta: " . $row["Numar_furnizori"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['bistrita_furnizori'])) {
            $sql = "SELECT COUNT(idf) as Numar_furnizori
            FROM Furnizori
            WHERE oras='Bistrita'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr furnizori Bistrita: " . $row["Numar_furnizori"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }
        if (isset($_POST['sebes_furnizori'])) {
            $sql = "SELECT COUNT(idf) as Numar_furnizori
            FROM Furnizori
            WHERE oras='Sebes'";
            $result = mysqli_query($conn, $sql);
    
            if ($result && mysqli_num_rows($result) > 0) {
                $row = mysqli_fetch_assoc($result);
                echo "Număr furnizori Sebes: " . $row["Numar_furnizori"];
            } else {
                echo "Nu există rezultate sau a apărut o eroare.";
            }
        }

    
}

mysqli_close($conn);
?>

</body>
</html>
