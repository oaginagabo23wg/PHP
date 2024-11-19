<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="POST" action="../public/herriaGehitu.php">
        <select>
            <?php
            foreach ($herriak as $herria) {
                echo '<option value="' . $herria['id'] . '">' . $herria['izena'] . '</option>';
            }
            ?>
        </select>
        <input type="text" name="izena" placeholder="Sartu herria izena">
        <input type="submit" value="Gehitu">
    </form>
</body>

</html>