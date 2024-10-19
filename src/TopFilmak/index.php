<?php
require './db.php';
session_start();


if (isset($_SESSION['UserData']['id'])) {
    $puntuazioak = $database->getPuntuakFilm($_SESSION['UserData']['id']);
} else {
    header("location:login.php");
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
    <a href="form.php">Formularioa</a>
    <h1><?php echo htmlspecialchars($_SESSION['UserData']['Username']); ?></h1>
    <h2>Puntuazioak:</h2>
    <table>
        <tr>
            <th>Filma</th>
            <th>Puntuazioa</th>
        </tr>
        <?php foreach ($puntuazioak as $puntu): ?>
            <tr>
                <td><?php echo htmlspecialchars($puntu['izena']); ?></td>
                <td><?php echo htmlspecialchars($puntu['puntuazioa']); ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
  