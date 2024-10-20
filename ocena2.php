<!DOCTYPE html>
<html lang="pl-PL">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="aplikacja.css" />
    <title>Aplikacja do obsługi pracowników firmy</title>
    <style>
        input[type="submit"]{
            margin: 5% 0 0;
            padding: 0;
        }

        form h2 {
            margin: 5% 0 0;
        }
        
        .formularz {
            width: 95%;
        }

        table {
            width: 100%;
        }

        th, td {
            width: 10%;
        }

        input[type="number"] {
            width: 60px;
            padding: 0;
            margin: 0;
            text-align: center;
            margin: 0 22%;
        }   
    </style>
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
        <h1>Oceny pracowników</h1>
        <form action="ocena3.php" method="POST">
            <table>
                <tr><th>ID Pracownika</th><th>Data</th><th>Wydajność</th><th>Zaangażowanie</th><th>Kompetencje</th><th>Kreatywność</th><th>Komunikatywność</th><th>Umiejętności techniczne</th></tr>
                <?php
                include('funkcje.php');
                if(polacz()){
                    $data = date('Y-m-d');
                    echo "<tr>";
                    echo "<td><input type='number' name='id'/></td>";
                    echo "<td>$data</td>";
                    echo "<td><input type='number' name='wydajnosc'/></td>";
                    echo "<td><input type='number'  style='margin: 0 27%;' name='zaangazowanie'/></td>";
                    echo "<td><input type='number'  style='margin: 0 22%;' name='kompetencje'/></td>";
                    echo "<td><input type='number'  style='margin: 0 22%;' name='kreatywnosc'/></td>";
                    echo "<td><input type='number'  style='margin: 0 30%;' name='komunikatywnosc'/></td>";
                    echo "<td><input type='number' name='umiej_tech'/></td>";
                    echo "</tr>";
                }
                ?>
            </table>
            <input type="submit" name="zatwierdz" class="przycisk" style="margin: 0 0 3%;" value="Zatwierdź ocenę"/>
            <input type="hidden" name="data" value="<?php echo date('Y-m-d'); ?>"/>
            <?php
                if(isset($_POST['zatwierdz'])){
                    $id=$_POST['id'];
                    $wydajnosc=$_POST['wydajnosc'];
                    $kompetencje=$_POST['kompetencje'];
                    $kreatywnosc=$_POST['kreatywnosc'];
                    $komunikatywnosc=$_POST['komunikatywnosc'];
                    $umiej_tech=$_POST['umiej_tech'];

                    if(!empty($id) && !empty($wydajnosc) && !empty($kompetencje) && !empty($kreatywnosc) && !empty($komunikatywnosc) && !empty($umiej_tech)){
                        header("Location: ocena3.php");
                        exit();
                    }
                    else {
                        echo "<h2 style='color: red; margin: 0 0 5%;'>Wszystkie pola muszą być wypełnione.</h2>";
                    }
                    mysqli_close($polaczenie);
                }            
                else {
                    echo "<h3 style='color: red;'>Błąd w połączeniu z bazą</h3>";
                }
            ?>
        </form>
    </div>
</body>
</html>
