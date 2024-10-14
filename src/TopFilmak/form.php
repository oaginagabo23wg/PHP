<?php
session_start();
$izena = '';
$izenErr = '';
$isan = '';
$isanErr = '';
$urtea = '';
$urteaErr = '';
$puntuazioa = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $izena = trim($_POST['izena']);

    if (empty($izena)) {
        $izenErr = 'Mesedez, idatzi izena.';
    } 
    elseif($izena === ){

    }
    else {
        // Aquí podrías continuar procesando el formulario (guardar en base de datos, etc.)
        // Por ejemplo, redirigir a otra página
        // header("Location: success.php");
        // exit();
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
</body>

</html>