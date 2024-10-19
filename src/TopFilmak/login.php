<?php
require './db.php';
session_start();

if (isset($_POST['Submit'])) {


    $Username = $_POST['Username'] ?? '';
    $Password = $_POST['Password'] ?? '';
    // username: oihan 
    // password: oihan
    $user = new User($database);

    if ($user->login($Username, $Password)) {
        header("location:form.php");
        exit;
    } else {
        $msg = "<span style='color:red'>Kontraseña okerra.</span>";
    }

    $database->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
</head>

<body>
    <form action="" method="post" name="Login_Form">
        <?php if (isset($msg)) { ?>
            <p><?php echo $msg; ?></p>
        <?php } ?>

        <h3>Login</h3>
        <p>Username</p>
        <p><input name="Username" type="text"></p>
        <p>Password</p>
        <p><input name="Password" type="password"></p>
        <p><input name="Submit" type="submit" value="Login"></p>
    </form>
    <a href="/Login/signIn.php">Sign in</a>
</body>

</html>