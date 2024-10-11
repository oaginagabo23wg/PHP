<?php
session_start();

if (isset($_POST['Submit'])) {
    $database = new Database("db", "root", "root", "mydatabase");
    $user = new User($database);

    $Username = $_POST['Username'] ?? '';
    $Password = $_POST['Password'] ?? '';

    if ($user->login($Username, $Password)) {
        $_SESSION['UserData']['Username'] = $Username;
        header("location:index.php");
        exit;
    } else {
        $msg = "<span style='color:red'>Kontraseña okerra.</span>";
    }

    $database->close();
}

// session_start();

// if (isset($_POST['Submit'])) {

//     $servername = "db";
//     $username = "root";
//     $password = "root";
//     $dbName = "mydatabase";

//     $conn = new mysqli($servername, $username, $password, $dbName);
//     if ($conn->connect_error) {
//         die("Errorea datubasearekin konektatzen: " . $conn->connect_error);
//     }
//     $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
//     $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
//     $stmt = $conn->prepare('select password from user where username = ?;');
//     $stmt->bind_param('s', $Username);
//     $stmt->execute();
//     $result = $stmt->get_result();

//     if ($result->num_rows > 0) {
//         $row = $result->fetch_assoc();
//         $hashed_password = $row['password'];
//         if (password_verify($Password, $hashed_password)) {
//             $_SESSION['UserData']['Username'] = $Username;
//             header("location:index.php");
//             exit;
//         } else {
//             $msg = "<span style='color:red'>Kontraseña okerra.</span>";
//         }
//     } else {
//         header("location:signIn.php");
//         exit;
//     }
//     $stmt->close();
//     $conn->close();
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