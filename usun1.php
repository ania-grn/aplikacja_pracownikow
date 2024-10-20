<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="aplikacja.css" />
    <title>Aplikacja</title>
    <style>
        .formularz {
            width: 95%;
        }
    </style>
</head>

<body>
    <header>
    <h2 align="center">Aplikacja do obsługi pracowników firmy</h2>
    </header>
    <div class="opcja">
        <h2>Wybrałeś opcję usuwania pracownika</h2>
        <a href="glowna.php">
            <h3>Powrót na stronę główną</h3>
        </a>
    </div>
    <div class="formularz">
        <?php
        include('funkcje.php');
        if (polacz()) {
            echo "<table>";
            echo "<tr><th>Numer</th><th>Imię</th><th>Nazwisko</th><th>Wiek</th><th>Staż</th><th>Stanowisko</th><th>Wydział</th><th>Pensja</th><th>Data dodania</th></tr>";
            $zapytanie = "SELECT * FROM pracownicy;";
            $wynik = mysqli_query($polaczenie, $zapytanie);
            while ($wiersz = mysqli_fetch_array($wynik)) {
                echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td><td>$wiersz[3]</td><td>$wiersz[4]</td><td>$wiersz[5]</td><td>$wiersz[6]</td><td>$wiersz[7]</td><td>$wiersz[8]</td></tr>";
            }
            echo "</table>";
            echo "<div style='height: 70px;'></div>";

            if(isset($_POST['usun2'])){
                $usun=$_POST['usun'];
                header("Location: usun2.php?usun=$usun");
                exit();
            }
        ?>
        <h3>Wybierz pracownika do usunięcia</h3>
            <form action="" method="POST">
                <input type="number" name="usun" step="1" required /><br />
                <input type="submit" class="przycisk" name="usun2" value="Usuń pracownika" />
            </form>
        <?php
        mysqli_close($polaczenie);
        }
        else {
            echo "<h3 style='color: red;'>Błąd w połączeniu z bazą</h3>";
        }
        ?>
    </div>
</body>

</html>