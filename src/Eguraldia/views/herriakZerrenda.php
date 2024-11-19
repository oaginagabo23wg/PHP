<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="../public/herriaEzabatu.php">
        <select name="herria_id">
            <?php
            foreach ($herriak as $herria) {
                echo '<option value="'. $herria['id'] .'">' . $herria['izena'] . '</option>';
            }
            ?>
        </select>
        <button type="submit">Ezabatu</button>
    </form>

    <form method="GET" action="../views/herriakAldatu.php">
        <button type="submit">Aldatu</button>
    </form>

    <form method="GET" action="../views/herriaGehitu.php">
        <button type="submit">Gehitu</button>
    </form>
</body>

</html>
