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
        <h2>Wybrałeś opcję dodania pracownika</h2>
        <a href="glowna.php">
            <h3>Powrót na stronę główną</h3>
        </a>
        <form action="" method="POST">
            <h4>Wybrałeś opcję wyświetlania pracowników</h4>
            <h4>Wyświetl według</h4>
            <select name="wyswietl">
                <option value="ID">Numer</option>
                <option value="Nazwisko">Alfabetycznie</option>
                <option value="Wiek">Wiek</option>
                <option value="Staz">Staż</option>
                <option value="Data">Data</option>
            </select>

            <h4>Podaj wydział:</h4>
            <label><input type="radio" name="wydz" value="Dowolny">Dowolny</label></br>
            <label><input type="radio" name="wydz" value="Dyrekcja">Dyrekcja</label></br>
            <label><input type="radio" name="wydz" value="Dział IT">Dział IT</label></br>
            <label><input type="radio" name="wydz" value="Biuro">Biuro</label></br>
            <label><input type="radio" name="wydz" value="Produkcja">Produkcja</label></br>
            <label><input type="radio" name="wydz" value="Zaopatrzenie">Zaopatrzenie</label></br>
            <label><input type="radio" name="wydz" value="Finanse">Finanse</label></br>
            <label><input type="radio" name="wydz" value="Kadry">Kadry</label></br>
            <label><input type="radio" name="wydz" value="Inne">Inne</label></br>

            <h4>Podaj pensję</h4>
                <input type="number" name="najpen" min="0"/></br>

            <label><input type="checkbox" name="pokpen" />Pokaż pensję</label></br>

            <input type="submit" name="filtruj" class="przycisk2" style="padding: 0; margin: 7% 0 0; height: 50px; width: 50%;" value=" Filtruj dane" /></br>
            <input type="submit" name="wszyscy" class="przycisk2" style="padding: 0; margin: 5% 0 0; height: 50px; width: 50%;" value="Wszyscy pracownicy" />
        </form>
    </div>
    <div class="formularz">
        <?php
        include('funkcje.php');
        if (polacz()) {
            if (isset($_POST['filtruj'])) {
                echo "<h3>Udało się połączyć z bazą</h3>";
                $sort = $_POST['wyswietl'];
                $wydzial = $_POST['wydz'];
                $najpen=$_POST['najpen'];
                $order = ($sort == 'Data') ? 'DESC' : 'ASC';
                if($wydzial=="Dowolny"){
                    $zapyt="SELECT * FROM pracownicy WHERE Pensja>$najpen ORDER BY $sort $order;";
                }
                elseif (empty($najpen)){
                    $zapyt = "SELECT * FROM pracownicy WHERE Wydzial LIKE '$wydzial' ORDER BY $sort $order;";
                }
                else {
                    $zapyt = "SELECT * FROM pracownicy WHERE Wydzial LIKE '$wydzial' AND Pensja>$najpen ORDER BY $sort $order;";
                }
                $wynik = mysqli_query($polaczenie, $zapyt);
                echo "<table>";
                echo "<tr><th>Numer</th><th>Imię</th><th>Nazwisko</th><th>Wiek</th><th>Staż</th><th>Stanowisko</th><th>Wydział</th><th>Pensja</th><th>Data dodania</th></tr>";
                while ($wiersz = mysqli_fetch_array($wynik)) {
                    if (isset($_POST['pokpen'])) {
                        $pensja = $wiersz[7];
                    } else {
                        $pensja = "********";
                    }
                    echo "<tr><td>$wiersz[0]</td>
                            <td>$wiersz[1]</td>
                            <td>$wiersz[2]</td>
                            <td>$wiersz[3]</td>
                            <td>$wiersz[4]</td>
                            <td>$wiersz[5]</td>
                            <td>$wiersz[6]</td>
                            <td>$pensja</td>
                            <td>$wiersz[8]</td></tr>";
                }
            }
            if (isset($_POST['wszyscy'])) {
                echo "<table>";
                echo "<tr><th>Numer</th><th>Imię</th><th>Nazwisko</th><th>Wiek</th><th>Staż</th><th>Stanowisko</th><th>Wydział</th><th>Pensja</th><th>Data dodania</th></tr>";
                $zapyt2 = "SELECT * FROM pracownicy;";
                $wynik2 = mysqli_query($polaczenie, $zapyt2);
                while ($wiersz2 = mysqli_fetch_array($wynik2)) {
                    echo "<tr><td>$wiersz2[0]</td><td>$wiersz2[1]</td><td>$wiersz2[2]</td><td>$wiersz2[3]</td><td>$wiersz2[4]</td><td>$wiersz2[5]</td><td>$wiersz2[6]</td><td>$wiersz2[7]</td><td>$wiersz2[8]</td></tr>";
                }
                echo "</table>";

                $zapyt3="SELECT ROUND(AVG(Pensja),2) FROM pracownicy;";
                $wynik3=mysqli_query($polaczenie, $zapyt3);
                $wiersz3=mysqli_fetch_array($wynik3);
                echo "<h2 style='margin: 5% 0;'>Średnia pensja: $wiersz3[0] PLN</h2>";

                $zapyt4="SELECT ROUND(AVG(Wiek),2) FROM pracownicy";
                $wynik4=mysqli_query($polaczenie, $zapyt4);
                $wiersz4=mysqli_fetch_array($wynik4);
                echo "<h2 style='margin: 5% 0;'>Średni wiek: $wiersz4[0] lat</h2>";

                $zapyt5="SELECT ROUND(AVG(Staz),2) FROM pracownicy";
                $wynik5=mysqli_query($polaczenie, $zapyt5);
                $wiersz5=mysqli_fetch_array($wynik5);
                echo "<h2 style='margin: 5% 0;'>Średni staż: $wiersz5[0] lat</h2>";

                $zapyt6="SELECT * FROM pracownicy ORDER BY pensja DESC LIMIT 1;";
                $wynik6=mysqli_query($polaczenie, $zapyt6);
                echo "<h2>Pracownik z największą pensją:</h2>";
                echo "<table>";
                echo "<tr><th>ID</th><th>Imię</th><th>Nazwisko</th><th>Wiek</th><th>Staż</th><th>Stanowisko</th><th>Wydział</th><th>Pensja</th></tr>";
                while($wiersz6=mysqli_fetch_array($wynik6)){
                    echo "<tr><td>$wiersz6[0]</td><td>$wiersz6[1]</td><td>$wiersz6[2]</td><td>$wiersz6[3]</td><td>$wiersz6[4]</td><td>$wiersz6[5]</td><td>$wiersz6[6]</td><td>$wiersz6[7]</td></tr>";
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