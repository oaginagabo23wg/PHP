<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top filmak</title>
</head>
<body>
    <h1><?php echo $_SESSION['UserData']['Username']?></h1>
    <h3 id="filmIzena"></h3>
    <h3 id="filmPunt"></h3>
    <h3 id="filmInf"></h3>

</body>
</html>