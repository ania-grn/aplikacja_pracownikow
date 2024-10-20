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
            if (isset($_GET["usun"])) {
                $usun = $_GET['usun'];
                $zapytanie = "SELECT * FROM pracownicy WHERE ID = $usun";
                $wynik = mysqli_query($polaczenie, $zapytanie);

                if (mysqli_num_rows($wynik) <= 0) {
                    echo "Nie znaleziono pracownika o podanym numerze.";
                    exit();
                }
            }
        ?>

            <h2>Czy chcesz usunąć pracownika?</h2>
            <table>
                <?php
                echo "<table style='width: 40%; margin: 0 auto 5%; padding: 0;'>";
                echo "<tr><th>Imię</th><th>Nazwisko</th></tr>";
                $zapyt2 = "SELECT Imie, Nazwisko FROM pracownicy WHERE ID='$usun';";
                $wynik2 = mysqli_query($polaczenie, $zapyt2);
                while ($wiersz2 = mysqli_fetch_array($wynik2)) {
                    echo "<tr><td>$wiersz2[0]</td><td>$wiersz2[1]</td></tr>";
                    $imie = $wiersz2[0];
                    $nazwisko = $wiersz2[1];
                }
                ?>
            </table>
            <form action="usun3.php" method="POST">
                <input type="hidden" name="usun" value="<?php echo $usun; ?>" />
                <input type="hidden" name="imie" value="<?php echo $imie; ?>" />
                <input type="hidden" name="nazwisko" value="<?php echo $nazwisko; ?>" />
            </form>
            <form action="" method="POST">
                <input type="submit" name="tak" class="przycisk" style="width: 20%; margin: 0 2% 5%;" value="Tak" />
                <input type="submit" name="nie" class="przycisk" style="width: 20%; margin: 0 2% 5%;" value="Nie" />
            </form>
        <?php
            if (isset($_POST['tak'])) {
                $usun=$_POST['usun'];
                $imie=$_POST['imie'];
                $nazwisko=$_POST['nazwisko'];
                header("Location: usun3.php?usun=$usun&imie=$imie&nazwisko=$nazwisko");
                exit();
            }
            if (isset($_POST['nie'])) {
                echo "<h2>Zrezygnowałeś z usunięcia pracownika $imie $nazwisko.</h2>";
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