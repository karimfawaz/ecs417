<?php

$title = $_POST["title"];
$body = $_POST["body"];

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
    $sql = "INSERT INTO blog (TITLE,BODY) VALUES('$title','$body')";

    $result = mysqli_query($conn, $sql);
    if ($result == true) {
        header("Location: blog.php");
    } else {
        echo "error";
    }
    $conn->close();
}
