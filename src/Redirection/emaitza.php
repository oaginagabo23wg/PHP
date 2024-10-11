<?php
// Iniciar la sesión
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Emaitza</title>
</head>
<body>
    <h3>Emaitzak:</h3>

    <p><strong>Izena:</strong> <?php echo isset($_SESSION['izena']) ? htmlspecialchars($_SESSION['izena']) : "Ez da izenik eman"; ?></p>

    <p><strong>Talde gustukoena:</strong> <?php echo isset($_SESSION['taldea']) ? htmlspecialchars($_SESSION['taldea']) : "Ez da talde gustukoenik aukeratu"; ?></p>

    <p><strong>Kanta gustukoena(k):</strong> <?php echo isset($_SESSION['kanta']) ? htmlspecialchars($_SESSION['kanta']) : "Ez da kantarik aukeratu"; ?></p>

    <p><strong>Email:</strong> <?php echo isset($_SESSION['email']) ? htmlspecialchars($_SESSION['email']) : "Ez da emailik eman"; ?></p>

    <p><strong>Pasahitza:</strong> <?php echo isset($_SESSION['pasahitza']) ? htmlspecialchars($_SESSION['pasahitza']) : "Ez da pasahitzarik eman"; ?></p>
</body>
</html>
