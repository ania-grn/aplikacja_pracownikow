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
    @$usun3 = $_POST['usun3'];
    $zapyt2 = "SELECT Imie, Nazwisko FROM pracownicy;";
    $wynik2 = mysqli_query($polaczenie, $zapyt2);
    while ($wiersz2 = mysqli_fetch_array($wynik2)) {
        $imie = $wiersz2[0];
        $nazwisko = $wiersz2[1];
    }
    $zapytanie3 = "DELETE FROM pracownicy WHERE ID='$usun3';";
    $wynik3 = mysqli_query($polaczenie, $zapytanie3);
    if ($wynik3) {
        echo "<p style='padding: 2%; font-size: 150%;'>Pracownik <b>$imie $nazwisko</b> został usunięty.</p>";
    } else {
        echo "<h2>Wystąpił błąd podczas usuwania pracownika</h2>";
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