<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="aplikacja.css" />
    <title>Aplikacja do obsługi pracowników firmy</title>
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
    </div>
    <div class="formularz">
        <div class="ilos">
            <h2>Ilość osób w zależności od działu</h2>
            <table style='width: 40%; margin: 4% auto 3%'>
                <tr>
                    <th>Wydział</th>
                    <th>Ilość osób</th>
                </tr>
                <?php
                include('funkcje.php');
                if (polacz()) {
                    $zapytanie = "SELECT DISTINCT Wydzial, COUNT(ID) FROM pracownicy GROUP BY Wydzial;";
                    $wynik = mysqli_query($polaczenie, $zapytanie);
                    while ($wiersz = mysqli_fetch_array($wynik)) {
                        echo "<tr><td>$wiersz[0]</td><td>$wiersz[1]</td></tr>";
                    }
                ?>
            </table>
        </div>

        <div class="ilos">
            <h2>Średnia pensja w zależności od działu</h2>
            <table style='width: 40%; margin: 4% auto 3%'>
                <tr>
                    <th>Wydział</th>
                    <th>Średnia pensja</th>
                </tr>
                <?php
                    $zapytanie2 = "SELECT DISTINCT Wydzial, ROUND(AVG(Pensja),2) FROM pracownicy GROUP BY Wydzial;";
                    $wynik2 = mysqli_query($polaczenie, $zapytanie2);
                    while ($wiersz2 = mysqli_fetch_array($wynik2)) {
                        echo "<tr><td>$wiersz2[0]</td><td>$wiersz2[1] PLN</td></tr>";
                    }
                ?>
            </table>
        </div>

        <div class="ilos">
            <h2>Ilość osób w zależności od wieku</h2>
            <table style='width: 40%; margin: 4% auto 3%'>
                <tr>
                    <th>Wiek</th>
                    <th>Ilość osób</th>
                </tr>
                <?php
                    $zapytanie3 = "SELECT DISTINCT Wiek, COUNT(ID) FROM pracownicy GROUP BY Wiek;";
                    $wynik3 = mysqli_query($polaczenie, $zapytanie3);
                    while ($wiersz3 = mysqli_fetch_array($wynik3)) {
                        echo "<tr><td>$wiersz3[0]</td><td>$wiersz3[1]</td></tr>";
                    }
                ?>
            </table>
        </div>

        <div class="ilos">
            <h2>Średnia pensja w zależności od wieku</h2>
            <table style='width: 40%; margin: 4% auto 3%'>
                <tr>
                    <th>Wiek</th>
                    <th>Średnia pensja</th>
                </tr>
                <?php
                    $zapytanie4 = "SELECT DISTINCT Wiek, ROUND(AVG(Pensja),2) FROM pracownicy GROUP BY Wiek;";
                    $wynik4 = mysqli_query($polaczenie, $zapytanie4);
                    while ($wiersz4 = mysqli_fetch_array($wynik4)) {
                        echo "<tr><td>$wiersz4[0]</td><td>$wiersz4[1] PLN</td></tr>";
                    }
                ?>
            </table>
        </div>

        <div class="ilos">
            <h2>Ilość osób w zależności od stażu</h2>
            <table style='width: 40%; margin: 4% auto 3%'>
                <tr>
                    <th>Staż</th>
                    <th>Ilość osób</th>
                </tr>
                <?php
                    $zapytanie5 = "SELECT DISTINCT Staz, COUNT(ID) FROM pracownicy GROUP BY Staz;";
                    $wynik5 = mysqli_query($polaczenie, $zapytanie5);
                    while ($wiersz5 = mysqli_fetch_array($wynik5)) {
                        echo "<tr><td>$wiersz5[0]</td><td>$wiersz5[1]</td></tr>";
                    }
                ?>
            </table>
        </div>

        <div class="ilos">
            <h2>Średnia pensja w zależności od stażu</h2>
            <table style='width: 40%; margin: 4% auto 3%'>
                <tr>
                    <th>Staż</th>
                    <th>Średnia pensja</th>
                </tr>
                <?php
                    $zapytanie6 = "SELECT DISTINCT Staz, ROUND(AVG(Pensja),2) FROM pracownicy GROUP BY Staz;";
                    $wynik6 = mysqli_query($polaczenie, $zapytanie6);
                    while ($wiersz6 = mysqli_fetch_array($wynik6)) {
                        echo "<tr><td>$wiersz6[0]</td><td>$wiersz6[1] PLN</td></tr>";
                    }
                ?>
            </table>
        </div>


        <div class="ilos">
            <h2>Ilość pracowników zatrudnionych w kolejnych miesiącach</h2>
            <table style='width: 40%; margin: 4% auto 3%'>
                <tr>
                    <th>Miesiąc</th>
                    <th>Ilość osób</th>
                </tr>
            <?php
                    $zapytanie7 = "SELECT MONTHNAME(Data) AS Miesiac, COUNT(*) AS Liczba_pracownikow FROM pracownicy GROUP BY Miesiac ORDER BY Miesiac DESC;";
                    $wynik7 = mysqli_query($polaczenie, $zapytanie7);

                    while ($wiersz7 = mysqli_fetch_array($wynik7)) {
                        switch ($wiersz7[0]) {
                            case 'January':
                                $miesiac = "Styczeń";
                                break;
                            case 'February':
                                $miesiac = "Luty";
                                break;
                            case 'March':
                                $miesiac = "Marzec";
                                break;
                            case 'April':
                                $miesiac = "Kwiecień";
                                break;
                            case 'May':
                                $miesiac = "Maj";
                                break;
                            case 'June':
                                $miesiac = "Czerwiec";
                                break;
                            case 'July':
                                $miesiac = "Lipiec";
                                break;
                            case 'August':
                                $miesiac = "Sierpień";
                                break;
                            case 'September':
                                $miesiac = "Wrzesień";
                                break;
                            case 'October':
                                $miesiac = "Październik";
                                break;
                            case 'November':
                                $miesiac = "Listopad";
                                break;
                            case 'December':
                                $miesiac = "Grudzień";
                                break;
                        }
                        echo "<tr><td>$miesiac</td><td>$wiersz7[1]</td></tr>";
                    }
                }
            ?>
            </table>
            </div>

            <div class="ilos">
                <h2>Najwyższa pensja na poszczególnych stanowiskach</h2>
                <table style='width: 40%; margin: 4% auto 3%'>
                <tr>
                    <th>Wydział</th>
                    <th>Najwyższa pensja</th>
                </tr>
            <?php
                $zapytanie8="SELECT Stanowisko, ROUND(MAX(Pensja),2) FROM pracownicy GROUP BY Stanowisko;";
                $wynik8=mysqli_query($polaczenie, $zapytanie8);
                while($wiersz8=mysqli_fetch_array($wynik8)){
                    echo "<tr><td>$wiersz8[0]</td><td>$wiersz8[1] PLN</td></tr>";
                }
            ?>
            </table>
        </div>

        <div class="ilos">
                <h2>Procentowy udział pracowników na poszczególnych </br>wydziałach</h2>
                <table style='width: 40%; margin: 4% auto 3%'>
                <tr>
                    <th>Wydział</th>
                    <th>Procentowy udział pracowników</th>
                </tr>
            <?php
                $zapytanie9="SELECT Wydzial, ROUND(((COUNT(*) / (SELECT COUNT(*) FROM pracownicy)) * 100),2) FROM pracownicy GROUP BY Wydzial;";
                $wynik9=mysqli_query($polaczenie, $zapytanie9);
                while($wiersz9=mysqli_fetch_array($wynik9)){
                    echo "<tr><td>$wiersz9[0]</td><td>$wiersz9[1]%</td></tr>";
                }
            ?>
            </table>
        </div>

        <div class="ilos">
                <h2>Największy staż pracy na poszczególnych </br>wydziałach</h2>
                <table style='width: 40%; margin: 4% auto 3%'>
                <tr>
                    <th>Wydział</th>
                    <th>Największy staż (w latach)</th>
                </tr>
            <?php
                $zapytanie10="SELECT Wydzial, MAX(Staz) AS NajwiekszyStaz FROM pracownicy GROUP BY Wydzial;";
                $wynik10=mysqli_query($polaczenie, $zapytanie10);
                while($wiersz10=mysqli_fetch_array($wynik10)){
                    echo "<tr><td>$wiersz10[0]</td><td>$wiersz10[1]</td></tr>";
                }
            ?>
            </table>
        </div>
    </div>
</body>

</html>