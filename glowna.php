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
        <form action="" method="POST">
            <h4>Wybierz opcję</h4>
            <select name="select">
                <option value="dodaj">Dodaj pracownika</option>
                <option value="wyswietl">Wyświetl pracowników</option>
                <option value="edytuj">Edytuj pracownika</option>
                <option value="usun">Usuń pracownika</option>
                <option value="statystyki">Statystyki pracowników</option>
                <option value="ocena">Ocena pracowników</option>
            </select><br />
            <input type="submit" name="submit" class="przycisk2" value="Wykonaj" />
        </form>
        <?php
        include('funkcje.php');
        if (polacz()) {
            if (isset($_POST['submit'])) {
                $wybor = $_POST['select'];
                if ($wybor == "dodaj") {
                    header("Location:dodaj.php");
                    exit();
                }
                if ($wybor == "wyswietl") {
                    header("Location:wyswietl.php");
                    exit();
                }
                if ($wybor == "edytuj") {
                    header("Location:edytuj.php");
                    exit();
                }
                if ($wybor == "usun") {
                    header("Location:usun1.php");
                    exit();
                }
                if ($wybor == "statystyki") {
                    header("Location:statystyki.php");
                    exit();
                }
                if($wybor=="ocena"){
                    header("Location:ocena.php");
                    exit();
                }
            }
        }
        ?>
    </div>
    <div class="drugi">

    </div>
</body>

</html>