<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="aplikacja.css" />
    <title>Aplikacja</title>
</head>

<body>

    <body>
    <header>
        <h2 align="center">Aplikacja do obsługi pracowników firmy</h2>
    </header>
        <div class="opcja">
            <h2>Wybrałeś opcję edytowania pracownika</h2>
            <a href="glowna.php">
                <h3>Powrót na stronę główną</h3>
            </a>
            <form action="" method="POST">
                <h4>Podaj numer pracownika do zmiany</h4>
                <input type="number" name="nredycja" step="1" min="0" /></br>
                <input type="submit" name="edycja" class="przycisk2" value="Przejdź do edycji" />
            </form>
        </div>
        <div class="formularz">
            <?php
            include('funkcje.php');
            if (polacz()) {
                $zapyt3 = "SELECT MAX(ID) AS max_id FROM pracownicy;";
                $wynik3 = mysqli_query($polaczenie, $zapyt3);
                $wiersz3 = mysqli_fetch_array($wynik3);
                $max_id = $wiersz3['max_id'];

                if (isset($_POST['edycja'])) {
                    $nredycja = $_POST['nredycja'];
                    if ($nredycja > $max_id) {
                        echo "<h2 style='color: red;'>Podano nieprawidłowy numer.</h2>";
                    } 
                    else {
                        header("Location: edytuj2.php?nredycja=$nredycja");
                        exit();
                    }
                }
                echo "<table>";
                echo "<tr><th>Numer</th><th>Imię</th><th>Nazwisko</th><th>Wiek</th><th>Staż</th><th>Stanowisko</th><th>Wydział</th><th>Pensja</th><th>Data dodania</th></tr>";
                $zapyt2 = "SELECT * FROM pracownicy;";
                $wynik2 = mysqli_query($polaczenie, $zapyt2);
                while ($wiersz2 = mysqli_fetch_array($wynik2)) {
                    echo "<tr><td>$wiersz2[0]</td><td>$wiersz2[1]</td><td>$wiersz2[2]</td><td>$wiersz2[3]</td><td>$wiersz2[4]</td><td>$wiersz2[5]</td><td>$wiersz2[6]</td><td>******</td><td>$wiersz2[8]</td></tr>";
                }
                echo "</table>";
                mysqli_close($polaczenie);
            }
            else {
                echo "<h3 style='color: red;'>Błąd w połączeniu z bazą</h3>";
            }
            ?>
        </div>
    </body>

</html>