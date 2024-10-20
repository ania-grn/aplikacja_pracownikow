<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
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
                <h4>Podaj dane pracownika</h4>
                <p>Podaj imię pracownika</p>
                <input type="text" name="imie" size="20" />
                <p>Podaj nazwisko pracownika</p>
                <input type="text" name="nazwisko" size="30" />
                <p>Podaj wiek pracownika</p>
                <input type="number" name="wiek" step="1" min="16" />
                <p>Podaj staż pracownika</p>
                <input type="number" name="staz" step="1" min="1" />
                <p>Podaj stanowisko na którym pracuje</p>
                <input type="text" name="stanowisko" size="20" />
                <p>Podaj wydział przypisany do pracownika</p>
                <select name="wydzial">
                    <option value="Dyrekcja">Dyrekcja</option>
                    <option value="Dział IT">Dział IT</option>
                    <option value="Biuro">Biuro</option>
                    <option value="Produkcja">Produkcja</option>
                    <option value="Zaopatrzenie">Zaopatrzenie</option>
                    <option value="Finanse">Finanse</option>
                    <option value="Kadry">Kadry</option>
                    <option value="Inne">Inne</option>
                </select>
                <p>Podaj pensję pracownika</p>
                <input type="number" name="pensja" min="0" step="1" /></br>
                <input type="submit" name="dodaj" class="przycisk2" style="width: 50%; height: 55px; margin-top: 12%;" value="Dodaj" />
            </form>
        </div>
        <div class="formularz">
            <?php
            include('funkcje.php');
            if (isset($_POST['dodaj'])) {
                if (polacz()) {
                    $imie = $_POST['imie'];
                    $nazwisko = $_POST['nazwisko'];
                    $wiek = $_POST['wiek'];
                    $staz = $_POST['staz'];
                    $stanowisko = $_POST['stanowisko'];
                    $wydzial = $_POST['wydzial'];
                    $pensja = $_POST['pensja'];
                    $data = date("Y-m-d");

                    if($wiek-15-$staz<=0){
                        echo "<h3 style='color: red;'>Podano niewłaściwy wiek.</h3>";
                    }
                    elseif (empty($imie) || empty($nazwisko) || empty($wiek) || empty($staz) || empty($stanowisko) || empty($wydzial)) {
                        echo "<h3 style='color: red;'>Nie podałeś wszystkich danych</h3>";
                    } 
                    elseif ($wiek < 15 && $wiek > 80) {
                        echo "<h2>Podano nieprawidłowy wiek. Wiek musi być z zakresu 15->80</h2>";
                    } 
                    elseif ($wiek < $staz && ($wiek - $staz - 15) < 18) {
                        echo "<h2>Podano nieprawidłowy staż.</h2>";
                    } 
                    elseif (strlen($imie) < 2) {
                        echo "<h2>Podano nieprawidłową wartość. Imię musi mieć przynajmniej 2 znaki.</h2>";
                    } 
                    elseif (strlen($nazwisko) < 2) {
                        echo "<h2>Podano nieprawidłową wartość. Nazwisko musi mieć przynajmniej 2 znaki.</h2>";
                    } 
                    elseif ($pensja <= 0) {
                        echo "<h2>Podano nieprawidłową wartość. Pensja nie może być mniejsza lub równa 0</h2>";
                    } 
                    else {
                        echo "<h3>Udało się połączyć z bazą</h3>";
                        $zapyt = "INSERT INTO pracownicy VALUES(NULL, '$imie', '$nazwisko', $wiek, $staz, '$stanowisko', '$wydzial', $pensja, '$data');";
                        $wynik = mysqli_query($polaczenie, $zapyt);
                        if ($wynik) {
                            echo "<h3>Pracownik $imie $nazwisko został dodany na stanowisko $stanowisko w dziale $wydzial.<br/> Data dodania: $data</h3>";
                        } 
                        else {
                            echo "<h3 style='color: red;'>Błąd w dodawaniu pracownika</h3>";
                        }
                    }
                    mysqli_close($polaczenie);
                } 
                else {
                    echo "<h3 style='color: red;'>Błąd połączenia z bazą</h3>";
                }
            }
            ?>
        </div>
    </body>

    </html>