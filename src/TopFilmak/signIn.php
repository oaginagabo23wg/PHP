<?php
session_start();

if (isset($_POST['Submit'])) {

    $servername = "db";
    $username = "root";
    $password = "root";
    $dbName = "mydatabase";

    $conn = new mysqli($servername, $username, $password, $dbName);
    if ($conn->connect_error) {
        die("Errorea datubasearekin konektatzen: " . $conn->connect_error);
    }

    //Form-eko datuak jaso 
    $Username = isset($_POST['Username']) ? $_POST['Username'] : '';
    $Password = isset($_POST['Password']) ? $_POST['Password'] : '';
    $Image = isset($_FILES['Image']) ? $_FILES['Image'] : '';
    
    // Datu basean ea erabiltzailea badagoen ikusi
    $stmt = $conn->prepare('select * from user where username = ?;');
    $stmt->bind_param('s', $Username);
    $stmt->execute();
    $result = $stmt->get_result();
    
    // Irudia images karpetan gorde
    if (isset($_FILES['Image']) && $_FILES['Image']['error'] == 0) {
        $targetDir = "images/"; 
        $imagePath = $targetDir . basename($_FILES['Image']['name']);
        
        $imageFileType = strtolower(pathinfo($imagePath, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (in_array($imageFileType, $allowedTypes)) {
            if (move_uploaded_file($_FILES['Image']['tmp_name'], $imagePath)) {
            } else {
                echo "Error al cargar la imagen.";
            }
        } else {
            echo "Solo se permiten archivos JPG, JPEG, PNG y GIF.";
        }
    }

    //Datu basean txertaketa 
    if ($result->num_rows > 0) {
        $msg = "<span style='color:red'>Erabiltzailea erregistatua dago.</span>";
    } else {
        $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
        $insert = $conn->prepare("insert into user (username, password, image_path) values (?, ?, ?)");
        $insert->bind_param("sss", $Username, $hashedPassword, $imagePath);
        if ($insert->execute()){
            $_SESSION['UserData']['Username'] = $Username;
            header("location:index.php");
            exit;
        }
        else {
            echo "Errore bat egon da" . $stmt->error;
        }
    }

    
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Sign in</title>
</head>

<body>
    <form action="" method="post" name="SignIn_Form"  enctype="multipart/form-data">
        <?php if (isset($msg)) { ?>
            <p><?php echo $msg; ?></p>
        <?php } ?>

        <h3>Sign in</h3>
        <p>Username</p>
        <p><input name="Username" type="text"></p>
        <p>Password</p>
        <p><input name="Password" type="password"></p>
        <p>Image</p>
        <p><input name="Image" type="file"></p>
        <p><input name="Submit" type="submit" value="Sign in"></p>
    </form>

</body>

</html>