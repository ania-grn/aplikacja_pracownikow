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

        input[type="text"] {
            width: 500px;
            padding: 0%;
            margin: 0;
            text-align: center;
        }

        input[type="number"] {
            width: 60px;
            padding: 0;
            margin: 0;
            text-align: center;
        }

        table {
            width: 100%;
        }

        th, td {
            width: 12%;
            text-align: center;
        }
    </style>
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
        $nredycja = $_GET['nredycja'];

        echo "<h1>Numer pracownika do edycji: $nredycja</h1>";
        include('funkcje.php');

        if (polacz()) {
            $zapyt = "SELECT * FROM pracownicy WHERE ID='$nredycja';";
            $wynik = mysqli_query($polaczenie, $zapyt);

            echo "<form action='edytuj3.php' method='POST'>";
            echo "<table>

                <tr><th>Imię</th><th>Nazwisko</th><th>Wiek</th><th>Staż</th><th>Stanowisko</th><th>Wydział</th><th>Pensja</th><th>Data dodania</th></tr>";

            while ($wiersz = mysqli_fetch_array($wynik)) {
                $imie = $wiersz['Imie'];
                $nazwisko = $wiersz['Nazwisko'];
                $wiek = $wiersz['Wiek'];
                $staz = $wiersz['Staz'];
                $stanowisko = $wiersz['Stanowisko'];
                $wydzial = $wiersz['Wydzial'];
                $pensja = $wiersz['Pensja'];
                $data = $wiersz['Data'];

                echo "<tr>
                    <td><input type='text' name='imie' value='$imie' required/></td>
                    <td><input type='text' name='nazwisko' value='$nazwisko' required/></td>
                    <td><input type='number' name='wiek' value='$wiek'/></td>
                    <td><input type='number' name='staz' value='$staz'/></td>
                    <td><input type='text' name='stanowisko' value='$stanowisko'/></td>
                    <td><input type='text' name='wydzial' value='$wydzial'/></td>
                    <td><input type='number' name='pensja' value='$pensja'/></td>
                    <td>$data</td></tr>";
            }
            echo "</table>";
            echo "<input type='hidden' name='ukryte' value='$nredycja'/>";
            echo "<input type='submit' name='zapisz' class='przycisk' value='Zapisz zmiany'/>";

            if(isset($_POST['zapisz'])){
                if(empty($_POST['imie'])){
                    echo "<h2 style='color: red;'>Pole imię nie może być puste.</h2>";
                    exit();
                }
                elseif(empty($_POST['nazwisko'])){
                    echo "<h2 style='color: red;'>Pole nazwisko nie może być puste.</h2>";
                    exit();
                }
            } 
            echo "</form>";  

            mysqli_close($polaczenie);
        }
        else {
            echo "<h3 style='color: red;'>Błąd w połączeniu z bazą</h3>";
        }
        ?>
    </div>
</body>
</html>
