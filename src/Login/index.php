<?php
session_start();

if (!isset($_SESSION['UserData']['Username'])) {
    header("location:login.php");
    exit;
}
echo $_SESSION['UserData']['Username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Protected Page</title>
</head>
<body>
    <h1>Congratulations! You have logged into a password-protected page.</h1>
    <a href="logout.php">Click here</a> to Logout.<br>

    <?php
    $servername = "db";
    $username = "root";
    $password = "root";
    $dbName = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Error connecting to the database: " . $conn->connect_error);
    }

    $Username = $_SESSION['UserData']['Username'];

    $stmt = $conn->prepare('SELECT image_path FROM user WHERE username = ?;');
    $stmt->bind_param('s', $Username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($row = $result->fetch_assoc()) {
        echo '<img src="' . htmlspecialchars($row['image_path'], ENT_QUOTES) . '">';
    } else {
        echo "No image found for this user.";
    }
    $stmt->close();
    $conn->close();
    ?>
</body>
</html>
