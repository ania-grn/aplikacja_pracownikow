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
        <h2>Wybrałeś opcję ocenienia pracownika</h2>
        <a href="glowna.php">
            <h3>Powrót na stronę główną</h3>
        </a>
    </div>
    <div class="formularz">
        <?php
            include('funkcje.php');
            if(polacz()){
                if(isset($_POST['zatwierdz'])){
                    $id=$_POST['id'];
                    $wydajnosc=$_POST['wydajnosc'];
                    $zaangazowanie=$_POST['zaangazowanie'];
                    $kompetencje=$_POST['kompetencje'];
                    $kreatywnosc=$_POST['kreatywnosc'];
                    $komunikatywnosc=$_POST['komunikatywnosc'];
                    $umiej_tech=$_POST['umiej_tech'];
                    $data=$_POST['data'];

                    $zapytanie="INSERT INTO ocena_pracownikow VALUES($id, '$data', $wydajnosc, $zaangazowanie, $kompetencje, $kreatywnosc, $komunikatywnosc, $umiej_tech);";
                    $wynik=mysqli_query($polaczenie, $zapytanie);

                    $zapytanie2="SELECT ID, Imie, Nazwisko ID_pracownika FROM pracownicy JOIN ocena_pracownikow ON ID_pracownika=pracownicy.ID WHERE ID=$id;";
                    $wynik2=mysqli_query($polaczenie, $zapytanie2);
                    while($wiersz2=mysqli_fetch_array($wynik2)){
                        $imie=$wiersz2[1];
                        $nazwisko=$wiersz2[2];
                    }

                    if($wynik){
                        echo "<h2>Pomyślnie dodano ocenę dla pracownika $imie $nazwisko.</h2>";
                        echo "<h3>Szczegóły oceny:</h3>";
                            echo "<p>Wydajność: $wydajnosc</p>";
                            echo "<p>Zaangażowanie: $zaangazowanie</p>";
                            echo "<p>Kompetencje: $kompetencje</p>";
                            echo "<p>Kreatywność: $kreatywnosc</p>";
                            echo "<p>Komunikatywność: $komunikatywnosc</p>";
                            echo "<p>Umiejętności techniczne: $umiej_tech</p>";
                        }
                    }
                    else {
                        echo "<h2 style='color: red;'>Błąd w dodaniu oceny. Spróbuj ponownie.</h2>";
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
