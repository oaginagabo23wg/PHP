<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Herri bateko iragarpen egunak</title>
</head>
<body>
    <h2><?php echo $herria ?> iragarpen egunak kudeatu:</h2>
    <hr>
    <?php foreach ($egunak as $egun): ?>
        <form method="GET">
            <b>Iragarpen eguna: <?php echo $egun['eguna']; ?></b><br>
            iragarpen_testua: <?php echo htmlspecialchars($egun['iragarpen_testua']); ?><br>
            eguraldia: <?php echo $egun['eguraldia']; ?><br>
            tenperatura_minimoa: <?php echo $egun['tenperatura_minimoa']; ?><br>
            tenperatura_maximoa: <?php echo $egun['tenperatura_maximoa']; ?><br>
            <input type="hidden" name="id" value="<?php echo $egun['id'] ?>">
            <button type="submit" formaction="iragarpena-ezabatu.php">Ezabatu</button><br>
            <button type="submit" formaction="iragarpena-aldatu.php">Aldatu</button><br>
            <hr>
        </form>
    <?php endforeach; ?>
    <b>Iragarpen berria:</b><br><br>
    <form action="iragarpena-gehitu.php" method="GET">
        <input type="hidden" name="herria_id" value="<?php echo $herria_id ?>">
        eguna (UUUUHHEE): <input type="text" name="eguna"/><br>
        iragarpen_testua <input type="text" name="iragarpen_testua"/><br>
        eguraldia (1|2|3|4|5) <input type="text" name="eguraldia"/><br>
        tenperatura_minimoa <input type="text" name="tenperatura_minimoa"/><br>
        tenperatura_maximoa <input type="text" name="tenperatura_maximoa"/><br><br>
        <button type="submit">Iragarpen berria gehitu</button>
    </form>
</body>
</html>
