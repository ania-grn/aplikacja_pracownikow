<!DOCTYPE html>
<html lang="pl-PL">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="aplikacja.css" />
    <title>Aplikacja</title>
</head>
<body>
<header>
<h2 align="center">Aplikacja do obsługi pracowników firmy</h2>
</header>
    <div class="opcja">
        <h2>Wybrałeś opcję edytowania pracownika</h2>
        <a href="glowna.php">
            <h3>Powrót na stronę główną</h3>
        </a>
    </div>
    <div class="formularz">
        <?php
        include('funkcje.php');
        if (polacz()) {
            if(isset($_POST['zapisz'])){
                $ukryte = $_POST['ukryte'];
                $imie = $_POST['imie'];
                $nazwisko = $_POST['nazwisko'];
                $wiek = $_POST['wiek'];
                $staz = $_POST['staz'];
                $stanowisko = $_POST['stanowisko'];
                $wydzial = $_POST['wydzial'];
                $pensja = $_POST['pensja'];

                $zapyt2 = "UPDATE pracownicy SET Imie='$imie', Nazwisko='$nazwisko', Wiek=$wiek, Staz=$staz, Stanowisko='$stanowisko', Wydzial='$wydzial', Pensja=$pensja WHERE ID=$ukryte;";
                $wynik2 = mysqli_query($polaczenie, $zapyt2);

                if ($wynik2) {
                    echo "<h2>Pomyślnie zmieniono dane</h2>";
                    echo "<h1>Pracownicy po zmianie</h1>";
                    $zapyt = "SELECT * FROM pracownicy;";
                    $wynik = mysqli_query($polaczenie, $zapyt);

                    echo "<table>
                        <tr><th>Numer</th><th>Imię</th><th>Nazwisko</th><th>Wiek</th><th>Staż</th><th>Stanowisko</th><th>Wydział</th><th>Pensja</th><th>Data dodania</th></tr>";
                    while ($wiersz = mysqli_fetch_array($wynik)) {
                        echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td><td>$wiersz[2]</td><td>$wiersz[3]</td><td>$wiersz[4]</td><td>$wiersz[5]</td><td>$wiersz[6]</td><td>$wiersz[7]</td><td>$wiersz[8]</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "<h2>Nie udało się zmienić danych</h2>";
                }
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
