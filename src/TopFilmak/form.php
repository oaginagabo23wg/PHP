<?php
require './db.php';

session_start();

if (!isset($_SESSION['UserData'])) {
    header("Location: login.php"); 
    exit; 
}

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

    if (!empty($urtea) && (!is_numeric($urtea) || $urtea < 1900 || $urtea > date("Y"))) {
        $urteaErr = 'Urtea baliozko bat izan behar da.';
    }

    if (empty($urteaErr)) {
        if (empty($izena) && empty($isan)) {
            $izenErr = 'Mesedez, idatzi izena edo ISAN bat.';

        } elseif (empty($izena) && !empty($isan)) {
            foreach ($films as $film) {
                if ($isan == $film->isan) {
                        $database->deleteFilm($isan);
                    break;
                }
            }

        } elseif (!empty($izena) && empty($isan)) {
            $filmakZerrenda .= '<br><h1>Filmak</h1><tr><th>Izena</th><th>Isan</th><th>Urtea</th></tr>';
            $foundFilm = false;
            foreach ($films as $film) {
                if ($izena == $film->izena) {
                    $foundFilm = true;
                    $filmakZerrenda .= '<tr><td>' . htmlspecialchars($film->izena) . '</td><td>' . htmlspecialchars($film->isan) . '</td><td>' . htmlspecialchars($film->urtea) . '</td></tr>';
                }
            }
            if (!$foundFilm) {
                $database->insertFilm($izena, $isan, $urtea);
            }

        } else {
            $foundFilm = false;
            foreach ($films as $film) {
                if ($isan == $film->isan) {
                    if ($izena != $film->izena || $urtea != $film->urtea) {
                        $database->updateFilm($izena, $urtea, $isan);
                    }
                    $foundFilm = true;
                    break;
                }
            }
            if (!$foundFilm) {
                $database->insertFilm($izena, $isan, $urtea);
            } else {
                $database->puntuatuFilm($puntuazioa, $isan, $_SESSION['UserData']['id']);
                header('location:index.php');
            }
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