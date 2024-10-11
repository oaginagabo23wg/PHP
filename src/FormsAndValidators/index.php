<!DOCTYPE html>
<html>

<head>
    <title>Forms and Validations</title>
</head>
<?php
$izenaErr = $taldeaErr = $kantaErr = $emailErr = $pasahitzaErr = "";

$izena = $taldea = $kanta = $email = $pasahitza = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["izena"])) {
        $izenaErr = "Izena beharrezkoa da";
    } else {
        $izena = htmlspecialchars($_POST["izena"]);
        if (!preg_match("/^[a-zA-Z-' ]*$/", $izena)) {
            $izenaErr = "Bakarrik letrak eta espazioak onartzen dira";
        }
    }

    if (empty($_POST["taldea"])) {
        $taldeaErr = "Taldea aukeratu behar duzu";
    } else {
        $taldea = htmlspecialchars($_POST["taldea"]);
    }

    if (empty($_POST["kanta"])) {
        $kantaErr = "Gutxienez kanta bat aukeratu behar duzu";
    } else {
        $kanta = implode(", ", $_POST["kanta"]);
    }

    if (empty($_POST["email"])) {
        $emailErr = "Email-a beharrezkoa da";
    } else {
        $email = htmlspecialchars($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Email formatua baliogabea da";
        }
    }

    if (empty($_POST["pasahitza"])) {
        $pasahitzaErr = "Pasahitza beharrezkoa da";
    } else {
        $pasahitza = htmlspecialchars($_POST["pasahitza"]);
        if (strlen($pasahitza) < 6) {
            $pasahitzaErr = "Pasahitzak gutxienez 6 karaktere izan behar ditu";
        }
    }
}
?>

<body>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="izena">Izena:</label>
        <input type="text" id="izena" name="izena"><br>
        <span style="color: red;"><?php echo $izenaErr; ?></span><br>

        <a>Talde gustukoena:</a>
        <label for="extremoduro">Extremoduro</label>
        <input type="radio" id="extremoduro" name="taldea" value="Extremoduro">
        <label for="pinkFloyd">Pink Floyd</label>
        <input type="radio" id="pinkFloyd" name="taldea" value="Pink Floyd">
        <label for="greenDay">Green Day</label>
        <input type="radio" id="greenDay" name="taldea" value="Green Day"><br>
        <span style="color: red;"><?php echo $taldeaErr; ?></span><br>

        <a>Kanta gustukoena:</a>
        <label for="siTeVas">Si te vas</label>
        <input type="checkbox" id="siTeVas" name="kanta[]" value="Si te vas">
        <label for="polesApart">Poles Apart</label>
        <input type="checkbox" id="polesApart" name="kanta[]" value="Poles Apart">
        <label for="americanIdiot">American Idiot</label>
        <input type="checkbox" id="americanIdiot" name="kanta[]" value="American Idiot">
        <label for="itsasoa">Itsasoa</label>
        <input type="checkbox" id="itsasoa" name="kanta[]" value="Itsasoa"><br>
        <span style="color: red;"><?php echo $kantaErr; ?></span><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email"><br>
        <span style="color: red;"><?php echo $emailErr; ?></span><br>


        <label for="pasahitza">Pasahitza:</label>
        <input type="password" id="pasahitza" name="pasahitza"><br>
        <span style="color: red;"><?php echo $pasahitzaErr; ?></span><br>


        <input type="submit" value="Bidali">
    </form>


    <div id="erantzuna">
        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") : ?>
            <h3>Emaitzak:</h3>
            <p><strong>Izena:</strong> <?php echo $izena; ?></p>
            <p><strong>Talde gustukoena:</strong> <?php echo $taldea; ?></p>
            <p><strong>Kanta gustukoena(k):</strong> <?php echo $kanta; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Pasahitza:</strong> <?php echo $pasahitza; ?></p>
        <?php endif; ?>
    </div>

</body>

</html>