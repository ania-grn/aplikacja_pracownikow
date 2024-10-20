<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="aplikacja.css" />
    <title>Aplikacja do obsługi pracowników firmy</title>
    <style>
        input[type="submit"]{
            margin: 5% 0 0;
            padding: 0;
        }

        form h2 {
            margin: 5% 0 0;
        }
        
        .formularz {
            width: 95%;
        }

        table {
            width: 100%;
        }

        th, td {
            width: 10%;
        }
    </style>
</head>

<body>
<header>
    <h2 align="center">Aplikacja do obsługi pracowników firmy</h2>
</header>
    <div class="opcja">
        <h2>Wybrałeś opcję dodania pracownika</h2>
        <a href="glowna.php">
            <h3>Powrót na stronę główną</h3>
        </a>
        <form action="" method="POST">
            <h2>Oceń pracownika</h2>
                <input type="submit" name="ocen" class="przycisk2" value="Oceń pracownika"/>
        </form>
    </div>
    <div class="formularz">
        <h1>Oceny pracowników</h1>
        <table>
            <tr><th>ID Pracownika</th><th>Data</th><th>Wydajność</th><th>Zaangażowanie</th><th>Kompetencje</th><th>Kreatywność</th><th>Komunikatywność</th><th>Umiejętności techniczne</th></tr>
            <?php
            include('funkcje.php');
            if(polacz()){
                $zapytanie="SELECT * FROM ocena_pracownikow;";
                $wynik=mysqli_query($polaczenie, $zapytanie);
                while($wiersz=mysqli_fetch_array($wynik)){
                    echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td><td>$wiersz[3]</td><td>$wiersz[4]</td><td>$wiersz[5]</td><td>$wiersz[6]</td><td>$wiersz[7]</td></tr>";
                }
            ?>
        </table>
        <?php
            if(isset($_POST['ocen'])){
                header("Location:ocena2.php");
            }
            mysqli_close($polaczenie);
            }
            else {
                echo "<h3 style='color: red;'>Błąd w połączeniu z bazą</h3>";
            }
        ?>
    </div>
</body>
</html>
