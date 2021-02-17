<head>
<link rel="icon" href="../favicon.ico"></link>
</head>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // collect value of input field
    $email = $_POST['email'];
    $username = $_POST['username'];

    $password = $_POST['password'];
        echo $email;
    echo $password;
}

$servername = "localhost";
$dbuser= "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=2due", $dbuser, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "INSERT INTO users (username, email, password)
VALUES ('$username', '$email',  '$password')";
    $conn->exec($sql);
    echo "New record created successfully";
} catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>