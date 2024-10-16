<?php
require './db.php';

session_start();
$izena = '';
$izenErr = '';
$isan = '';
$isanErr = '';
$urtea = '';
$urteaErr = '';
$puntuazioa = '';
$films = $database->getAllFilms();
$filmakZerrenda = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $izena = trim($_POST['izena']);
    $isan = trim($_POST['isan']);
    $urtea = trim($_POST['urtea']);
    $puntuazioa = $_POST['puntu'];
    if (empty($izena)) {
        $izenErr = 'Mesedez, idatzi izena.';
    }
    if (empty($urtea)) {
        $urteaErr = 'Mesedez, idatzi urtea.';
    } elseif (!is_numeric($urtea) || $urtea < 1900 || $urtea > date("Y")) {
        $urteaErr = 'Urtea baliozko bat izan behar da.';
    }
    if (empty($izenErr) && empty($isanErr) && empty($urteaErr)) {
        $foundFilm = false;
        if (empty($isan)) {
            $filmakZerrenda .= '<br><h1>Filmak</h1><tr><th>Izena</th><th>Isan</th><th>Urtea</th></tr>';
            for ($i = 0; $i < count($films); $i++) {
                if ($izena == $films[$i]->izena) {
                    $foundFilm = true;
                    $filmakZerrenda .= '<tr><td>' . htmlspecialchars($films[$i]->izena) . '</td><td>' . htmlspecialchars($films[$i]->isan) . '</td><td>' . htmlspecialchars($films[$i]->urtea) . '</td></tr>';
                }
            }
            if (!$foundFilm) {
                $izenErr = 'Ez da izen hori duen filmik aurkitu.';
            }
        } else {
            $database->insertFilm($izena, $isan, $urtea);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top filmak</title>
</head>

<body>
    <form method="post" action="">
        <label>Izena</label>
        <input type="text" name="izena" value="<?php echo htmlspecialchars($izena); ?>">
        <div id="izenErr" style="color: red;"><?php echo $izenErr; ?></div>
        <br>
        <label>Isan</label>
        <input type="text" name="isan" value="<?php echo htmlspecialchars($isan); ?>">
        <div id="isanErr" style="color: red;"><?php echo $isanErr; ?></div>
        <br>
        <label>Urtea</label>
        <input type="text" name="urtea" value="<?php echo htmlspecialchars($urtea); ?>">
        <div id="urteaErr" style="color: red;"><?php echo $urteaErr; ?></div>
        <br>
        <label>Puntuazioa</label>
        <select name="puntu">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
        </select><br>
        <input type="submit" value="Bidali">
    </form>
    <table>
        <?php echo $filmakZerrenda; ?>
    </table>
</body>

</html>