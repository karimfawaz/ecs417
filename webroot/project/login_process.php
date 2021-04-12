<?php
$email = $_POST["email"];
$password = $_POST["password"];

$dbhost = getenv("MYSQL_SERVICE_HOST");
$dbport = getenv("MYSQL_SERVICE_PORT");
$dbuser = getenv("DATABASE_USER");
$dbpwd = getenv("DATABASE_PASSWORD");
$dbname = "ecs417";
// Create connection
$conn = new mysqli($dbhost, $dbuser, $dbpwd, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = "SELECT * FROM users WHERE EMAIL = '$email' AND PASSWORD = '$password'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) == 1) {
        $row = $result->fetch_assoc();
        session_start();
        $_SESSION['loggedin'] = true;
        header("Location:post.php");
    } else {
        header("Location: login.php?login=error");
    }
    $conn->close();
}



?>