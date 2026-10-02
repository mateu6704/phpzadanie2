<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Dziennik ocen</title>
</head>
<body>
    <h1>Dziennik ocen</h1>

    <form method="post" action="index.php">
        Imię i nazwisko ucznia:<br>
        <input type="text" name="uczen"><br><br>

        Ocena:<br>
        <select name="ocena">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
        </select><br><br>

        Przedmiot:<br>
        <input type="text" name="przedmiot"><br><br>

        <input type="submit" name="zapisz" value="Zapisz ocenę">
    </form>

    <?php
    if (isset($_POST["zapisz"])) {
        $uczen = $_POST["uczen"];
        $ocena = $_POST["ocena"];
        $przedmiot = $_POST["przedmiot"];

        $plik = fopen("oceny.txt", "a");
        fwrite($plik, $uczen . " | " . $przedmiot . " | ocena: " . $ocena . "\n");
        fclose($plik);
        header("Location:index.php");
    }
    ?>

    <h2>Zapisane oceny</h2>

    <?php
    if (file_exists("oceny.txt")) {
        $plik = fopen("oceny.txt", "r");
        while (!feof($plik)) {
            echo fgets($plik) . "<br>";
        }
        fclose($plik);
    }
    ?>
</body>
</html>
